<?php

namespace App\Http\Controllers\front_end;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Support\Facades\Auth;

     
class ArticleController extends Controller
{
    
    public function index(){
        
       $ar = Article::select('title','slug','image','description', 'user_id', 'cat_id', 'views')->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('front-end.home', compact('ar'));
    }
}
