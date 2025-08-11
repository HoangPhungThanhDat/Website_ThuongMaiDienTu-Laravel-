<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // return view('fontend.home');

    $category_list = Category::where('status', 1)->get();
    return view('fontend.home', compact('category_list'));
    }
}
