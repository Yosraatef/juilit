
@extends('admin.index')

@section('content')
        <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        اضافة موضوع  جديد
      </h1>
      
    </section>
    <section class="content">
            <div class="box box-primary">
              
               @include('includes.messages')
              <form role="form" action="{{route('banner.store')}}" method="post"
              enctype="multipart/form-data">
             {{ csrf_field()}}
              <div class="box-body">
                <div class="col-lg-offset-3 col-md-6">
               
              <div class="form-group image" >
                  <label for="img">الصورة</label>
                  <br>
                  <input type="file" name="img" id="img">
                </div>
            
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">اضافة</button>
                <a type="button" class="btn btn-warning" href="{{ route('banner.index') }}">الرجوع</a>
              </div>
                </div>
                
              
            
              </div> 
            </form>
    @endsection