<?php

namespace App\Controllers;

use App\Models\SurveyModel;
use App\Models\QuestionModel;
use App\Models\ResponseModel;

class Admin extends BaseController
{
    public function dashboard()
    {
        if(!session()->get('admin')){
            return redirect()->to('/login');
        }

        $surveyModel = new SurveyModel();

        $data['surveys'] = $surveyModel->findAll();

        return view('admin/dashboard',$data);
    }

    public function upload()
    {
        $surveyModel = new SurveyModel();
        $questionModel = new QuestionModel();

        $surveyName = $this->request->getPost('survey_name');
        $file = $this->request->getFile('csv');

        $uniqueUrl = uniqid();

        $surveyModel->save([
            'topic_name'=>$surveyName,
            'unique_url'=>$uniqueUrl,
            'status'=>'on'
        ]);

        $surveyId = $surveyModel->getInsertID();

        $handle = fopen($file->getTempName(),"r");

        $rowNumber = 0;

        while(($row = fgetcsv($handle,1000,",")) !== FALSE){

            $rowNumber++;

            if($rowNumber == 1) continue;

            $question = $row[0] ?? '';
            $correct = $row[1] ?? '';

            $wrong = [];

            for($i=2;$i<count($row);$i++){
                $wrong[] = trim($row[$i]);
            }

            $questionModel->save([
                'survey_id'=>$surveyId,
                'question'=>$question,
                'correct_answer'=>$correct,
                'wrong_options'=>json_encode($wrong)
            ]);
        }

        fclose($handle);

        return redirect()->to('/admin/dashboard');
    }

   public function toggle($id)
{
    $surveyModel = new SurveyModel();

    $survey = $surveyModel->find($id);

    $status = ($survey['status'] == 'on') ? 'off' : 'on';

    $surveyModel->update($id, ['status' => $status]);

    return redirect()->back();
}

    public function download($surveyId)
    {
        $responseModel = new ResponseModel();

        $responses = $responseModel->where('survey_id',$surveyId)->findAll();

        header('Content-Type:text/csv');
        header('Content-Disposition:attachment; filename=results.csv');

        $output = fopen("php://output","w");

        foreach($responses as $row){
            fputcsv($output,$row);
        }

        fclose($output);
    }
}