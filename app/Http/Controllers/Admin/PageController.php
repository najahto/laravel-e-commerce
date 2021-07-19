<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard(){
        // $questions = Question::orderBy('id', 'DESC')->limit(10)->get();
        // $categories = Category::withCount('question')->orderBy('id', 'DESC')->limit(10)->get();
        // $total_question = count(Question::all());
        // $total_category = count(Category::all());

        //, compact('questions', 'categories', 'total_question', 'total_category')
        
    	return view('admin.dashboard');
    }

}
