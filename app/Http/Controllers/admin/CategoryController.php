<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
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
        $cat = Category::paginate(10);
        return view('admin.category.list', compact('cat'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::select('id','name', 'parent_id')->get()->toArray();
        return view('admin.category.add', compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $cat = new Category;
        $cat->name = $request->input('cat_name');
        $cat->slug = str_slug($cat->name);
        $cat->description = $request->input('des_cat');
        $cat->parent_id = $request->input('parent_id');
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
        } else {
             $fileNameToStore = 'no-image.png';
        }
        $cat->image = $fileNameToStore;
        $cat->save();
        return $request->all();
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
        $parent = Category::select('id', 'name', 'parent_id')->where('slug', '<>', $id)->get()->toArray();
        $cat   = Category::where('slug', $id)->get()->toArray();
        return view('admin.category.edit', compact('parent', 'cat'));
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
        $cat= Category::where('slug',$slug)->first();
        $cat->name = $request->input('cat_name');
        $cat->slug = str_slug($cat->name);
        $cat->description = $request->input('des_cat');
        $cat->parent_id = $request->input('parent_id');
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
            $cat->image = $fileNameToStore;
        }
        
        $cat->save();
        return redirect('/admin/category')->with('success', 'Thành công !');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);
        $image_name = $cat->image;
        Storage::delete('/images/'.$image_name);
        $cat->delete();
        return redirect('/admin/category')->with('success', 'Xoá thành công !');
    }
}
