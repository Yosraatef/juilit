<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LastNew;
use Illuminate\Support\Facades\Session;

class AdminNewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = LastNew::paginate(15);
        
         return view('admin.news.show',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
       return view('admin.news.create');
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
            'new' => 'required',
            
        ];

        $this->validate($request , $rules);

        $new = new LastNew;
    
        $new->title  = $request->title;
        $new->new   = $request->new ;
        if ($request->hasFile('img')) {
            $filename = time() . '-' . $request->img->getClientOriginalName();
            $request->img->move(public_path('pictures/new'), $filename);
            $new->img = $filename;
        }
        $new->save();
    

        Session::flash('message','تم انشاء موضوع جديد ');
        return redirect()->route('new.index');
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
       $new = LastNew::where('id',$id)->first();
       
         return view('admin.news.edit',compact('new'));
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
            'new' => 'required',
            
        ];

        $this->validate($request , $rules);

        $new = LastNew::findOrFail($id);
    
        $new->title  = $request->title;
        $new->new   = $request->new ;
        if ($request->hasFile('img')) {
             @unlink('pictures/new/' . $new->img);
            $filename = time() . '-' . $request->img->getClientOriginalName();
            $request->img->move(public_path('pictures/new'), $filename);
            $new->img = $filename;
        }
    
        $new->save();

        Session::flash('message','تم تعديل الموضوع');
        return redirect()->route('new.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $new = LastNew::findOrFail($id);

        $new->delete();

        Session::flash('message','تم  المسح بنجاح');

        return redirect()->back();
    }
}
