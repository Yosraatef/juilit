@extends('admin.index')

@section('content')
        <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         تعديل الخبر
      </h1>
      
    </section>
    <section class="content">
            <div class="box box-primary">

               @include('includes.messages')
              <form role="form"
               action="{{route('new.update',$new->id)}}" method="post"
              enctype="multipart/form-data">
             {{ csrf_field()}}
             {{ method_field('PUT')}}
              <div class="box-body">
                <div class="col-lg-offset-3 col-md-6">
                <div class="form-group">
                  <label for="title">عنوان الخبر</label>
                  <input type="text" class="form-control" name="title" 
                  id="title" value="{{$new->title}}" placeholder="اضف عنوان الخبر ">
                </div>
                
              <div class="form-group image" >
                  <label for="img">الصورة</label>
                  <br>
                  <input type="file" name="img" id="img">

                </div>
                 <img style="height: 180px;" src="{{asset('public/pictures/new/'.$new->img) }}">
            <div class="form-group article" >
                <label for="new">الخبر</label>
                <textarea type="text" name="new" placeholder="ادخل الموضوع" class="form-control" rows="10">{{$new->new}}</textarea>
            </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">تعديل</button>
                <a type="button" class="btn btn-warning" href="{{ route('new.index') }}">الرجوع</a>
              </div>
                </div>
                
              
            
              </div> 
            </form>
    @endsection