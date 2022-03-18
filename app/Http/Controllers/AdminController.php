<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::latest()->paginate();
        
        return view('admin.index', compact('feedbacks'));
    }
}
