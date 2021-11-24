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
      $categories = Category::all();
      $title_page = 'Categorie';
      $params = [
         'categories' => $categories,
         'title_page' => $title_page,
      ];
      return view('category.index', $params);
   }

   public function show($id)
   {
      $category = Category::find($id);
      $title_page = 'Programmazione - ' . $category->name;
      $params = [
         'category'   => $category,
         'open_menu'  => 'programmazione',
         'title_page' => $title_page,
      ];
      return view('category.show', $params);
   }

   public function create()
   {
      $params = [
         'form_name' => 'form_create_category'
      ];
      return view('category.create',$params);
   }

   public function store(Request $request)
   {
      $request->validate(['name' => 'required|string']);

      try
      {
         $cat = new Category();
         $cat->name = $request->get('name');
         $cat->save();

         return ['result' => 1, 'msg' => 'Elemento creato con successo','url'=> route('categories')];
      }
      catch(\Exception $e)
      {
         return ['result' => 0, 'msg' => $e->getMessage()];
      }
   }
}
