<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use App\User;
use App\Category;
use App\Tag;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    // call category 

    public function category(Request $request, $slug){
        $cat_name = Category::where('slug', $slug)->get();
        foreach($cat_name as $c){
            $id = $c->id;
        }
        $parent_cat = Category::where('parent_id', $id)->get();
        return view('front-end.categories', compact('cat_name', 'parent_cat'));
    }
    // get tag 
    public function tag($tag){

        $tag_article = Tag::orderBy('created_at', 'desc')->where('slug', $tag)->paginate(7);
        return view('front-end.article_tag', compact('tag_article'));
    }
    public function beat($cat){
        return view('front-end.beat_cat');
    }
    public function viewAricle($cat, $slug){
        $link = '/post/'.$cat.'/'.$slug;
        if(!Session::has($link)){
            Article::where('slug', $slug)->increment('views');
            Session::put($link,1);
        }
        $article = Article::firstOrFail()->where('slug', $slug)->get();
        foreach($article as $a){
            $id_cat = $a->cat_id;
        }
        
        $related = Article::firstOrFail()->where('slug','<>', $slug)->where('cat_id',$id_cat)->inRandomOrder()->take(3)->get();
    
        return view('front-end.detail-post', compact('article', 'related'));
    }
    public function addComment(Request $request){
        $validatedData = $request->validate([
            'content' => 'required|max:255',
            
        ], [
            'content.required'=>"Nhập nội dung Comment",
        ]);
        $comment = new Comment;
        $comment->content = $request->input('content');
        $comment->article_id = $request->input('article_id');
        $comment->user_id = $request->input('user_id');
        $comment->save();
        return redirect()->back();
    }
    public function showArticleInCategory($cha, $con){

        $parent = Category::where('slug', $cha)->get();
        $cat_par = Category::where('slug', $con)->get();
        foreach($cat_par as $c){
            $id =  $c->id;
        }
        $arti = Article::where('cat_id', $id)->simplePaginate(10);
        return view('front-end.list-article', compact('cat_par','parent', 'arti'));
    }
    public function search(Request $request){
        $query = $request->get('key');
        $slug = str_slug($query);
        $data =Article::where('slug', 'LIKE', '%'.$slug.'%')->simplePaginate(15);
        return view('front-end.search', compact('data', 'query'));
    }
}
