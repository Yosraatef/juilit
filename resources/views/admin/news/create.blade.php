
@extends('admin.index')

@section('content')
        <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        اضافة  خبر  جديد
      </h1>
      
    </section>
    <section class="content">
            <div class="box box-primary">
              
               @include('includes.messages')
              <form role="form" action="{{route('new.store')}}" method="post"
              enctype="multipart/form-data">
             {{ csrf_field()}}
              <div class="box-body">
                <div class="col-lg-offset-3 col-md-6">
                <div class="form-group">
                  <label for="title">عنوان الخبر </label>
                  <input type="text" class="form-control" name="title" 
                  id="title" placeholder="اضف عنوان الخبر ">
                </div>
                
              <div class="form-group image" >
                  <label for="img">صورة  الخبر </label>
                  <br>
                  <input type="file" name="img" id="img">
                </div>
            <div class="form-group article" >
                <label for="body">الخبر</label>
                <textarea type="body" name="new" placeholder="ادخل الخبر" class="form-control" rows="10"></textarea>
            </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">اضافة</button>
                <a type="button" class="btn btn-warning" 
                href="{{ route('post.index') }}">الرجوع</a>
              </div>
                </div>
                
              
            
              </div> 
            </form>
    @endsection