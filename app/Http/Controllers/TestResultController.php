<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestResult;

class TestResultController extends Controller
{
    public function createTestResult(Request $request)
    {

        // Validate the form input
        $validatedData = $request->validate([
            'questionIds' => 'required|array',
            'questionIds.*' => 'numeric',
            'sliderValues' => 'required|array',
            'sliderValues.*' => 'numeric|min:0|max:100',
        ]);
        // Get the user ID
        $userId = auth()->user()->id;


        // Create an empty array to store the question IDs and slider values
        $questionSliderValues = [];

        // Combine the question IDs and slider values into a dictionary
        $questionIds = $validatedData['questionIds'];
        $sliderValues = $validatedData['sliderValues'];
        foreach ($questionIds as $index => $questionId) {

            $sliderValue = $sliderValues[$questionId];
            $questionSliderValues[$questionId] = $sliderValue;

        }
        // Create and store the TestResult object in the database
        TestResult::create([
            'user_id' => $userId,
            'chars_values' => json_encode($questionSliderValues),
        ]);

    }


}
