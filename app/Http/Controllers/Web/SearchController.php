<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
   public function searchPost(Request $request)
   {
      $search = $request->get('search');
      $type = $request->get('type');
      if($type == 'name'){
         $posts = Post::where('name','like','%'.$search.'%')->get();
      }
      elseif($type == 'desc'){
         $posts = Post::where('name','like','%'.$search.'%')->orWhere('desc','like','%'.$search.'%')->get();
      }
      else{
         $posts = Post::where('tags','like','%'.$search.'%')->get();
      }

      $title_page = 'Ricerca Post Programmazione - per '.$search;
      $params = [
         'search' => $search,
         'posts' => $posts,
         'title_page' => $title_page,
      ];
      return view('search.search_post', $params);
   }
}
