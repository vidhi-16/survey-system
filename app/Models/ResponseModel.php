<?php

namespace App\Models;
use CodeIgniter\Model;

class ResponseModel extends Model
{
    protected $table = 'responses';
    protected $allowedFields = ['survey_id','question_id','selected_answer'];
}