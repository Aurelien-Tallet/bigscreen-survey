<?php

namespace App\Http\Controllers;

use App\Models\Submission;

class SubmissionController extends Controller
{
    /*
     * Display a submission based on it's uuid
     */
    public function show($uuid)
    {
        return Submission::where('uuid', $uuid)->with('form', 'responses', 'responses.question', 'responses.choices', 'responses.question.choices')->firstOrFail();
    }
}
