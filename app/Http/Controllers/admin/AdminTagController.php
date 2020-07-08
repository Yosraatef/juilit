<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Facades\Session;

class AdminTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(15);
        
         return view('admin.tags.show',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
       return view('admin.tags.create');
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
            'name' => 'required',
            
        ];

        $this->validate($request , $rules);

        $tag = new Tag;
        $tag->name   = $request->name ;
        $tag->save();
    

        Session::flash('message','تم انشاء   ');
        return redirect()->route('tag.index');
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
       $tag = Tag::where('id',$id)->first();
       
         return view('admin.tags.edit',compact('tag'));
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
            'name' => 'required',
            
        ];

        $this->validate($request , $rules);

        $tag = Tag::findOrFail($id);
    
        $tag->name  = $request->name;
        $tag->save();

        Session::flash('message','تم  التعديل ');
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $tag = Tag::findOrFail($id);

        $tag->delete();

        Session::flash('message','تم  المسح');

        return redirect()->back();
    }
}
