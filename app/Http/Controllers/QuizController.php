<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::with('options')->get();
        return response()->json($quizzes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'question' => 'required|string',
            'options' => 'required|array|min:2', 
            'options.*.text' => 'required|string',
            'options.*.isCorrect' => 'required|boolean',
        ]);

        $quiz = Quiz::create([
            'question' => $validatedData['question'],
        ]);

        foreach ($validatedData['options'] as $option) {
            $quiz->options()->create([
                'text' => $option['text'],
                'isCorrect' => $option['isCorrect'],
            ]);
        }

        return response()->json($quiz, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        return response()->json($quiz);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        $validatedData = $request->validate([
            'question' => 'required|string',
        ]);

        $quiz->update([
            'question' => $validatedData['question'],
        ]);

        return response()->json($quiz);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->options()->delete(); 
        $quiz->delete(); 

        return response()->json(null, 204);
    }
}
