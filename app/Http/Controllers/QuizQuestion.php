<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuizQuestion extends Controller
{
    public function load()
    {
        return view('partials.questions');
    }

    public function showQuestions()
    {
        $questions = Question::all();

        return view('partials.questions', compact('questions'));
    }
}
