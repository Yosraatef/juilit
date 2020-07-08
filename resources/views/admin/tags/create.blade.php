
@extends('admin.index')

@section('content')
        <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        اضف   كلمات ذات صلة
      </h1>
      
    </section>
    <section class="content">
            <div class="box box-primary">
              
               @include('includes.messages')
              <form role="form" action="{{route('tag.store')}}" method="post"
              enctype="multipart/form-data">
             {{ csrf_field()}}
              <div class="box-body">
                <div class="col-lg-offset-3 col-md-6">
                <div class="form-group">
                  <label for="name">ادخل  اسم  الكلمات ذات الصلة</label>
                  <input type="text" class="form-control" name="name" 
                  id="title" placeholder="اضف   كلمات ذات صلة">
                </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">اضافة</button>
                <a type="button" class="btn btn-warning" 
                href="{{ route('tag.index') }}">الرجوع</a>
              </div>
                </div>
                
              
            
              </div> 
            </form>
    @endsection