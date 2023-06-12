<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestResult;
use App\Models\Question;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Type\Integer;

class TestResultController extends Controller
{
    public function showTestResult()
    {
        $userId = auth()->id();
        $testResult = TestResult::where('user_id', $userId)->latest()->first();

        return view('partials.testresult', compact('testResult'));
    }

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
        for ($i = 1; $i <= 10; $i++) {
            $questionSliderValues[strval($i)] = 0;
        }
        // Combine the question IDs and slider values into a dictionary
        $questionIds = $validatedData['questionIds'];
        $sliderValues = $validatedData['sliderValues'];
//        foreach ($questionIds as $index => $questionId) {
//
//            $sliderValue = $sliderValues[$questionId];
//            $questionSliderValues[$questionId] = $sliderValue;
//
//        }
        foreach ($questionIds as $index => $questionId) {
            $question = Question::find($questionId);
            $chars = $question->characteristics;
            $chars = json_decode($chars, true);
            $sliderValue = intval($sliderValues[$questionId]);
            $questionSliderValues[$chars["1"]] = $sliderValue;
            $questionSliderValues[$chars["2"]] = 100 - $sliderValue;
        }
        // Create and store the TestResult object in the database
        TestResult::create([
            'user_id' => $userId,
            'chars_values' => json_encode($questionSliderValues),
        ]);
        return redirect()->route('showTestResult');
    }


}
