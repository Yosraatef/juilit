<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Section;
use DB;
use App\Tag;
use App\PostTag;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(15);
        
         return view('admin.posts.show',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::all();
        $tags = Tag::get()->pluck('name', 'id');
       return view('admin.posts.create',compact('sections','tags'));
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
            'title' => 'required',
            'img' => 'required',
            'body' => 'required',
            'section_id' => 'required',
            'text' => 'required',
            'tag.*' => 'exists:tags,id',
        ];

        $this->validate($request , $rules);
        $data=$request->except(['tag','img']);
        
        if ($request->hasFile('img')) {
            $filename = time() . '-' . $request->img->getClientOriginalName();
            $request->img->move(public_path('pictures/post'), $filename);
        $data['img'] = $filename;
        }
         $data['slug'] = Str::slug( $request->title , '-');
        $post=Post::create($data);
        
        foreach($request->input('tag') as $tag)
        
        $post->tag()->attach($tag);
        
       
        
     
        Session::flash('message','تم انشاء موضوع جديد ');
        return redirect()->route('post.index');
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
       $post = Post::where('id',$id)->first();
       $sections = Section::all();
         return view('admin.posts.edit',compact('post','sections'));
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
         

        $rules = [
            'title' => 'required',
            'body' => 'required',
            'section_id' => 'required',
             'text' => 'required',
        ];

        $this->validate($request , $rules);

        $post = Post::findOrFail($id);
    
        $post->title  = $request->title;
        $post->body   = $request->body ;
        $post->slug = Str::slug( $request->title , '-');
        if ($request->hasFile('img')) {
             @unlink('pictures/post/' . $post->img);
            $filename = time() . '-' . $request->img->getClientOriginalName();
            $request->img->move(public_path('pictures/post'), $filename);
            $post->img = $filename;
        }
        $post->section_id = $request->section_id;
        $post->text  = $request->text;
        $post->save();
        
        Session::flash('message','تم تعديل الموضوع');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        Session::flash('message','تم  المسح بنجاح');

        return redirect()->back();
    }
}