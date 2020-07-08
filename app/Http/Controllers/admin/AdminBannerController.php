<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Banner;
use Illuminate\Support\Facades\Session;
class AdminBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $banners = Banner::paginate(15);
        
         return view('admin.banner.show',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
       return view('admin.banner.create');
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
            
            'img' => 'required',
            
        ];

        $this->validate($request , $rules);

        $banner = new Banner;
        if ($request->hasFile('img')) {
            $filename = time() . '-' . $request->img->getClientOriginalName();
            $request->img->move(public_path('pictures/banner'), $filename);
            $banner->img = $filename;
        }
        $banner->save();
        Session::flash('message','تم انشاء  تفاصيل المزضةع');
        return redirect()->route('banner.index');
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
        $banner = Banner::where('id',$id)->first();
        return view('admin.banner.edit',compact('banner'));
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
         $banner = Banner::findOrFail($id);
        
        if ($request->hasFile('img')) {
            $filename = time() . '-' . $request->img->getClientOriginalName();
            $request->img->move(public_path('pictures/banner'), $filename);
            $banner->img = $filename;
        }
        $banner->save();
        Session::flash('message','تم  تعديل البانر   ');
        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $banner = Banner::findOrFail($id);

        $banner->delete();

        Session::flash('message','تم  المسح بنجاح');

        return redirect()->back();
    }
}
