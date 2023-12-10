<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index() {
        $questions = Question::all();

        return view('/faq', compact('questions'));
    }
}
