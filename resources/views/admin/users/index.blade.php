
@extends('admin.index')



@section('content')
    <h2>المستخدمين</h2>

    <div class="col-sm-6">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('admin.users.store')}}" method="POST">

            @csrf

            <div class="form-group">
                <label for="name">الاسم</label>
                <input type="text" name="name"
                       placeholder="ادخل اسم الشخص"
                       class="form-control">
            </div>
            <div class="form-group">
                <label for="password">الرقم السري</label>
                <input type="password" name="password"
                       placeholder="ادخل الرقم السري"
                       class="form-control">
            </div>

            <div class="form-group">
                <label for="name">الايميل</label>
                <input type="email" name="email"
                       placeholder="ادخل البريد الاكتروني "
                       class="form-control">
            </div>


            <div class="form-group">
                <input type="submit"  value="اضافة" class="form-control">
            </div>


        </form>


    </div>
    <div class="col-sm-6">


        <table class="table">
            <thead>
            <tr>
                <th>الرقم</th>
                <th>الاسم</th>
                <th>البريد الالكتروني</th>
                <th>تاريخ الانشاء</th>
                <th>تاريخ التحديث</th>

                <th>الحدث</th>
            </tr>
            </thead>
            @if(count($users) > 0)
                @foreach($users as $user)
                    <tbody>
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <a href="{{route('admin.users.edit',$user->id)}}">
                              {{$user->name}}
                            </a>
                        </td>
                        <td>{{$user->email}}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>{{ $user->updated_at->diffForHumans() }}</td>

                        <td>

                            <form action="{{route('admin.users.delete',$user->id)}}" method="POST">
                                @method('DELETE')
                                @csrf

                                <button class="btn btn-outline-danger">احذف</button>

                            </form>

                        </td>

                    </tr>
                    </tbody>
                @endforeach
            @endif
        </table>

        {{$users->render()}}

    </div>

@endsection