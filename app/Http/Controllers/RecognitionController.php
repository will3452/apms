<?php

namespace App\Http\Controllers;

use App\Models\Recognition;

class RecognitionController extends Controller
{
    public function index()
    {
        $recognitions = Recognition::latest()->first();
        $years = $recognitions->awardees->groupBy('year');

        return view('recognitions', compact('years', 'recognitions'));
    }
}
