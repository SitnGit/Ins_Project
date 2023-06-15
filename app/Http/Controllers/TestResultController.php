<?php

namespace App\Http\Controllers;

use App\Models\Characteristic;
use Illuminate\Http\Request;
use App\Models\TestResult;
use App\Models\Question;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Type\Integer;

class TestResultController extends Controller
{
    public function show($id)
    {
//        $userId = auth()->id();
//        $testResult = TestResult::where('user_id', $userId)->latest()->first();
//
//        return view('partials.testresult', compact('testResult'));

        // Retrieve the test result from the database based on the ID
        $testResult = TestResult::where('id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if (!$testResult) {
            // Handle the case where the test result is not found
            abort(404);
        }

        // Pass the test result to the view for display
        return view('partials.testresult', ['testResult' => $testResult]);
    }

    public function calculateScore($sliderValue)
    {
        if ($sliderValue >= 1 && $sliderValue <= 20) {
            return 1;
        } elseif ($sliderValue > 20 && $sliderValue <= 40) {
            return 2;
        } elseif ($sliderValue > 40 && $sliderValue <= 60) {
            return 3;
        } elseif ($sliderValue > 60 && $sliderValue <= 80) {
            return 4;
        } else {
            return 5;
        }
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
        $characteristicScores = [];
        $characteristicOccurrences = [];
        $questionIds = $validatedData['questionIds'];
        $sliderValues = $validatedData['sliderValues'];
        foreach ($questionIds as $index => $questionId) {
            $question = Question::find($questionId);
            $chars = $question->characteristics;
            $characteristicIds = json_decode($chars, true);
            $sliderValue = intval($sliderValues[$questionId]);
            $score = $this->calculateScore($sliderValue);

            foreach ($characteristicIds as $characteristicId) {

                if (!isset($characteristicScores[$characteristicId])) {
                    $characteristicScores[$characteristicId] = 0;
                    $characteristicOccurrences[$characteristicId] = 0;
                }
                $characteristicScores[$characteristicId] += $score;
                $characteristicOccurrences[$characteristicId]++;
            }
        }

        foreach ($characteristicScores as $characteristicId => $score) {
            $maxPossibleScore = $characteristicOccurrences[$characteristicId] * 5;
            $percentage = ($score / $maxPossibleScore) * 100;
            $characteristicScores[$characteristicId] = intval($percentage);
        }
        arsort($characteristicScores);
        // Create and store the TestResult object in the database
        TestResult::create([
            'user_id' => $userId,
            'chars_values' => json_encode($characteristicScores),
        ]);
        $testResult = TestResult::where('user_id', $userId)->latest()->first();
        return redirect()->route('testResult.show', ['id' => $testResult->id]);
    }


    public function showProfileResults()
    {
        $userId = auth()->id();
        $testResults = TestResult::where('user_id', $userId)->latest()->get();
        return view('partials.profileresults', compact('testResults'));
    }

}
