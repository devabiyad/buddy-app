<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent_id', '=', null)->get();
        $allCategories = Category::pluck('title','id')->all();

        return view('admin.home', compact('categories', 'allCategories'));
    }
}
