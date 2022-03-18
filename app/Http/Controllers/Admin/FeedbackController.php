<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackStoreRequest;

class FeedbackController extends Controller
{
    public function store(FeedbackStoreRequest $request)
    {
        $feedback = Feedback::create($request->all());

        return response()->json(['feedback' => $feedback]);
    }

    public function update(FeedbackStoreRequest $request, Feedback $feedback)
    {
        $feedback->update($request->all());
        
        return response()->json(['feedback' => $feedback]);
    }

    public function delete(Feedback $feedback)
    {
        $feedback->delete();
        
        return back();
    }
}
