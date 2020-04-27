<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tag::paginate(10);
        return view('admin.tag.list', compact('tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tag_name' => 'required|unique:tags,name|max:255',
        ],
        [
            'tag_name.required' =>"Tag không được để trống ",
            'tag_name.unique'   => "Tag đã tồn tại "
        ]);
        $tag = new Tag;
        $tag->name = $request->input('tag_name');
        $slug = str_slug($request->tag_name);
        $tag->slug = $slug;
        $tag->save();
        return redirect('/admin/tag')->with('success', 'Thêm thành công ');
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
    public function edit($slug)
    {
        $tag = Tag::select('id', 'name', 'slug')->where('slug', $slug)->get();
        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'tag_name' => 'required|max:255',
        ],
        [
            'tag_name.required' =>"Tag không được để trống ",
        ]);
        $tag = Tag::where('slug', $slug)->first();
        $tag->name = $request->input('tag_name');
        $tag->slug = $request->input('slug');
        $tag->save();
        return redirect('/admin/tag')->with('success', 'Sửa thành công ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect('/admin/tag')->with('success', 'Xóa thành công !');
    }
}
