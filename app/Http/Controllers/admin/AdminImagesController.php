<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Image;
use App\Section;
use Illuminate\Support\Facades\Session;
class AdminImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::paginate(15);
        
         return view('admin.imagePosts.show',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $posts = Post::all();
        $sections = Section::all();
        return view('admin.imagePosts.create',compact('posts','sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'image' => 'required',  
        ];

        $this->validate($request , $rules);

        $image = new Image;
        if ($request->hasFile('image')) {
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/images'), $filename);
            $image->image = $filename;
        }
       $image->post_id = $request->post_id;
       $image->section_id = $request->section_id;
        $image->save();
        Session::flash('message','تم انشاء  صورة جديد ');
        return redirect()->route('image.index');
    
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
        $image = Image::where('id',$id)->first();
       $post = Post::all();
       $sections = Section::all();

         return view('admin.imagePosts.edit',compact('post','image','sections'));
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
        
        $image = Image::findOrFail($id);
        if ($request->hasFile('image')) {
            $filename = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('pictures/images'), $filename);
            $image->image = $filename;
        }
       $image->post_id = $request->post_id;
       $image->section_id = $request->section_id;
        $image->save();
       

        Session::flash('message','تم تعديل الصورة');
        return redirect()->route('image.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        $image->delete();

        Session::flash('message','تم  المسح بنجاح');

        return redirect()->back();
    }
}