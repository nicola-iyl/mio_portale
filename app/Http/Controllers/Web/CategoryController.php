<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
       $params = [];
       return view('category.index', $params);
    }

    public function show($id)
    {
       $category = Category::find($id);
       $title_page = 'Programmazione - '.$category->name;
       $params = [
          'category' => $category,
          'title_page' => $title_page,
       ];
       return view('category.show', $params);
    }

    public function create()
    {

    }

    public function store()
    {

    }
}
