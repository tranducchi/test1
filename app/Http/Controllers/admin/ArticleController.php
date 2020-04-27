<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Tag;
use App\Article;
use App\Article_Tag;
use Carbon\Carbon;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.article.list', compact('articles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $d = Tag::select('id', 'name')->get();
        $cat = Category::select('id','name', 'parent_id')->get()->toArray();
        return view('admin.article.add', compact('cat', 'd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:articles,title|max:255',
            'name' => 'required|unique:articles,name|max:255',
            'description' => 'required',
            'body' => 'required',
            'cat_id' => 'required'
        ], [
            'title.required'=>"Tiêu đề không được để trống",
            'title.unique'=>"Tiêu đề đã tồn tại",
            'title.max'=>"Tiêu đề quá dài",
            'name.required'=>"Nhập tên bài viết",
            'name.unique'=>"Tên đã tồn tại",
            'name.max'=>"Tên quá dài",
            'body.required'=>"Nội dung không được để trống",
            'cat_id.required'=>"Nhập chuyên mục "

        ]);
        // Upload
        if($request->hasFile('img')){
          
            // Get filename with the extension
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
             $path = $request->file('img')->storeAs('/public/images', $fileNameToStore);
        }else {
             $fileNameToStore = 'no-image.png';
        }
        // End upload
        //data 
        $article = new Article;
        $article->name = $request->name;
        $article->title = $request->title;
        $article->slug  = str_slug($article->name);
        $article->image = $fileNameToStore;
        $article->description = $request->description;
        $article->body = $request->body;
        $article->cat_id = $request->cat_id;
        $article->user_id = $request->user_id;
        $article->user_id = $request->user_id;
        $article->status = $request->visible;
        $article->save();
        // condition
        $tag = Tag::select('name', 'slug')->get()->toArray();
        $tags = explode(',',$request->tags);
        for($i=0;$i< count($tags);$i++){
            $data = array(
               
                'name' => $tags[$i],
                'slug' => str_slug($tags[$i])
            );
            $insertData[] = $data;
        }
        $tag_new = new Tag;
        $count_2 = count($insertData);
        $tags_id = [];
        foreach ($insertData as $v) {
           $t =  Tag::where('slug', $v['slug'])->get()->toArray();
           if(empty($t)){
                $tag_new->name = $v['name'];
                $tag_new->slug  = $v['slug'];
                $tag_new->save();
                $tags_id[] = $tag_new->id;
           }else{
               foreach ($t as $v) {
                  $tags_id[] = $v['id'];
               }
           }
        }
        $article->tags()->sync($tags_id);
        return redirect('/admin/article')->with('success', 'Thêm thành công ! ');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $d = Tag::select('id', 'name')->get();
        $cat = Category::select('id','name', 'parent_id')->get()->toArray();
        $articles = Article::find($id);
        return view('admin.article.edit', compact('articles', 'cat', 'd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'name' => 'required|max:255',
            'description' => 'required',
            'body' => 'required',
            'cat_id' => 'required'
        ], [
            'title.required'=>"Tiêu đề không được để trống",
         
            'title.max'=>"Tiêu đề quá dài",
            'name.required'=>"Nhập tên bài viết",
           
            'name.max'=>"Tên quá dài",
            'body.required'=>"Nội dung không được để trống",
            'cat_id.required'=>"Nhập chuyên mục "

        ]);
        if($request->hasFile('img')){
          
            // Get filename with the extension
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
             $path = $request->file('img')->storeAs('/public/images', $fileNameToStore);
             $article->image = $fileNameToStore;
        }
        $article->name = $request->name;
        $article->title = $request->title;
        $article->slug  = str_slug($article->name);
        $article->description = $request->description;
        $article->body = $request->body;
        $article->cat_id = $request->cat_id;
        $article->user_id = $request->user_id;
        $article->user_id = $request->user_id;
        $article->status = $request->visible;
        $article->save();
        $tag = Tag::select('name', 'slug')->get()->toArray();
        $tags = explode(',',$request->tags);
        for($i=0;$i< count($tags);$i++){
            $data = array(
               
                'name' => $tags[$i],
                'slug' => str_slug($tags[$i])
            );
            $insertData[] = $data;
        }
        $tag_new = new Tag;
        $count_2 = count($insertData);
        $tags_id = [];
        foreach ($insertData as $v) {
           $t =  Tag::where('slug', $v['slug'])->get()->toArray();
           if(empty($t)){
                $tag_new->name = $v['name'];
                $tag_new->slug  = $v['slug'];
                $tag_new->save();
                $tags_id[] = $tag_new->id;
           }else{
               foreach ($t as $v) {
                  $tags_id[] = $v['id'];
               }
           }
        }
        $article->tags()->sync($tags_id);
        return redirect('/admin/article')->with('success', 'Cập nhật thành công ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $image_name = $article->image;
        Storage::delete('/images/'.$image_name);
        $article->delete();
        return redirect('/admin/article')->with('success', 'Xoá thành công !');
    }
    public function search(Request $request){
        $key = $request->input('key');
        $articles = Article::where('name','LIKE','%'.$key.'%')->orWhere('title','LIKE','%'.$key.'%')->get();
        return view('admin.article.search', compact('articles','key'));
    }
}
