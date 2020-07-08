
@extends('admin.index')



@section('content')
    <h2>Users</h2>

    <div class="col-sm-6">

        <form action="{{route('admin.users.update',$user->id)}}" method="POST" >


            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">الاسم</label>
                <input type="text" name="name"
                       value="{{$user->name}}"
                       placeholder="ادخل اسم الشخص"
                       class="form-control">
            </div>
            <div class="form-group">
                <label for="name">الرقم السري</label>
                <input type="password" name="password"
                       value="{{$user->password}}"
                       placeholder="ادخل الرقم السري"
                       class="form-control">
            </div>

            <div class="form-group">
                <label for="name">الايميل</label>
                <input type="email" name="email"
                       value="{{$user->email}}"
                       placeholder="ادخل البريد الالكتروني"
                       class="form-control">
            </div>

            <div class="form-group">
                <input type="submit"  value="تعديل" class="form-control">
            </div>


        </form>


    </div>


@endsection