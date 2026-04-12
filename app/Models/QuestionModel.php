<?php

namespace App\Models;
use CodeIgniter\Model;

class QuestionModel extends Model
{
    protected $table = 'questions';
    protected $allowedFields = ['survey_id','question','correct_answer','wrong_options'];
}