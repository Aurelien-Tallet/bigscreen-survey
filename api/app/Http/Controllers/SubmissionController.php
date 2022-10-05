<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        return Submission::where('uuid', $uuid)->with('responses', 'responses.question', 'responses.question.choices')->first();
    }

}
