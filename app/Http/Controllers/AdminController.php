<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Article;
use App\User;
class AdminController extends Controller
{
   
    public function dashboard(){
        $articles = Article::all();
        $k = 0;
        $count_views = 0;
        foreach($articles as $a){
            $count_views += $a->views;
        }
        $article_count = $articles->count();
        $cmts = Comment::all(); 
        $cmt_count =  $cmts->count();
        $users = User::all();
        $user_count =  $users->count();
        return view('admin.layouts.index', compact('article_count', 'cmt_count', 'user_count', 'count_views'));
    }
}
