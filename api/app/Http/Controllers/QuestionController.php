<?php

namespace App\Http\Controllers;

use App\Models\Question;

class QuestionController extends Controller
{
    /*
     * Display all users responses of a question based on question's ID
     */
    public function getResponses($id)
    {
        return Question::where("id",$id)->with('type', 'choices','responses.choices','responses')->firstOrFail();
    }
}
