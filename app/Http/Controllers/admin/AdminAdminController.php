<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Admin;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAdminController extends Controller
{
     public function index(){
        return view('admin.login');
    }

    public function store(Request $request){

       //validate

        $rules = [

            'email'     => 'required|email',
            'password'  => 'required|min:6'

            ];

        $this->validate($request , $rules);


        $credentials = $request->only('email','password');

        if(! Auth::guard('admin')->attempt($credentials)){

            return back()->withErrors([
                'message' => 'Wrong credentials please try Again '
            ]);

        }

        //Session
        Session::flash('message' , 'تم تسجيل الدخول بشكل ناجح');


        //redirect
        return redirect()->route('admin.users');

    }

    public function show_users(){

        $users = Admin::paginate();

        return view('admin.users.index' , compact('users'));


    }

    public function store_users(Request $request){

        $rules = [
            'name'      => 'required|string',
            'email'     => 'required|email',
            'password'  => 'required|min:6'

        ];

        $this->validate($request , $rules);



        Admin::create([
             'name'     => $request->input('name'),
             'email'    => $request->input('email'),
             'password' => bcrypt($request->input('password'))

        ]);

        //Session
        Session::flash('message' , 'تم تسجيل الشخص في لوحة التحكم');


        //redirect
        return redirect()->route('admin.users');

    }
    public function edit_users($id){
        $user = Admin::findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }


    public function update_users(Request $request , $id){

        $user = Admin::findOrFail($id);
        $rules = [
            'name'     => 'string',
            'email'    => 'email|unique:admin_users,email,'.$user->id
        ];
        $this->validate($request ,$rules );

        $input = $request->all();

        if($request->has('password') && $user->password != $request->password){
            $input['password'] = bcrypt($request->password);
        }
        $user->update($input);

        Session::put('message','تم التعديل بشكل ناجح ');
        //redirect
        return redirect()->route('admin.users');

    }

    public function delete_users($id){

        $user = Admin::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        Session::flash('message','You have been Logged Out ');
        return redirect()->route('admin.login');
    }
    
}
