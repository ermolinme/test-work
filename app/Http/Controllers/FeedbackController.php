<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Requests\FeedbackStoreRequest;

class FeedbackController extends Controller
{
    public function store(FeedbackStoreRequest $request)
    {
        Feedback::create($request->all());

        return back();
    }
}
