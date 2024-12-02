<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index()
    {
        $questions = Question::with('answers')->get();
        return view('forum', compact('questions'));
    }

    public function storeQuestion(Request $request)
    {
        $request->validate([
            'question' => 'required',
        ]);

        Question::create([
            'AccountID' => Auth::user()->AccountID,
            'question' => $request->question,
        ]);

        return redirect()->route('forum');
    }

    public function storeAnswer(Request $request, $id)
    {
        $request->validate([
            'answer' => 'required',
        ]);

        Answer::create([
            'QuestionID' => $id,
            'AccountID' => Auth::user()->AccountID,
            'answer' => $request->answer,
        ]);

        return redirect()->route('forum');
    }
}
