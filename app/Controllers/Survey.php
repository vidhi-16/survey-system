<?php

namespace App\Controllers;

use App\Models\SurveyModel;
use App\Models\QuestionModel;
use App\Models\ResponseModel;

class Survey extends BaseController
{
    
    public function show($id)
{
    $surveyModel = new SurveyModel();
    $questionModel = new QuestionModel();

    $survey = $surveyModel->find($id);

    if (!$survey || $survey['status'] == 'off') {
        return "Survey unavailable";
    }

    $data['survey'] = $survey;
    $data['questions'] = $questionModel->where('survey_id', $survey['id'])->findAll();

    return view('survey/form', $data);
}

    public function submit()
    {
        $responseModel = new ResponseModel();

        $surveyId = $this->request->getPost('survey_id');
        $answers = $this->request->getPost('answer');

        foreach($answers as $questionId=>$answer){

            $responseModel->save([
                'survey_id'=>$surveyId,
                'question_id'=>$questionId,
                'selected_answer'=>$answer
            ]);
        }

        return "Survey Submitted";
    }
}