@extends('admin.index')


@section('content')
   
    
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

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif



        <form action="{{route('settings.store')}}" method="POST" >

            @csrf

            <div>
                <input type="hidden"  name="id">
            </div>

           
            <div class="form-group">
                <label for="name">الوصف</label>
                <textarea name="aboutApp"
                          id=""
                          cols="30"
                          rows="10"
                          class="form-control">
            </textarea>
            </div>


            <div class="form-group">
                <input type="submit"  value="Add" class="form-control">
            </div>


        </form>


    </div>
@stop