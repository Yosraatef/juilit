
@extends('admin.index')

@section('content')
        <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         تعديل الموضوع
      </h1>
      
    </section>
    <section class="content">
            <div class="box box-primary">

               @include('includes.messages')
              <form role="form"
               action="{{route('post.update',$post->id)}}" method="post"
              enctype="multipart/form-data">
             {{ csrf_field()}}
             {{ method_field('PUT')}}
              <div class="box-body">
                <div class="col-lg-offset-3 col-md-6">
                <div class="form-group">
                  <label for="title">اسم الموضوع</label>
                  <input type="text" class="form-control" name="title" 
                  id="title" value="{{$post->title}}" placeholder="اضافة القسم">
                </div>
                <div class="form-group">
                <label for="category"> اسم القسم</label>
                <select id="category" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="section_id">
                     <option>اختر القسم المناسب</option>
                  @foreach($sections as $section)
                    <option value="{{$section->id}}"
                      @if($post->section_id  == $section->id)
                     selected
                  @endif
                      >
                {{
                    $section->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group image" >
                  <label for="img">الصورة</label>
                  <br>
                  <input type="file" name="img" id="img">

                </div>
                 <img style="height: 180px;" src="{{asset('pictures/post/'.$post->img) }}">
            <div class="form-group article" >
                <label for="body">نبذه عن الموضوع</label>
                <textarea type="body" name="body" placeholder="ادخل الموضوع" class="form-control" rows="10">{{$post->body}}</textarea>
            </div>
             <div class="form-group article" >
                <label for="text">تفاصيل النوضوع</label>
                <textarea type="text" name="text" placeholder="ادخل الموضوع" class="form-control" rows="10">{{$post->text}}</textarea>
            </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">تعديل</button>
                <a type="button" class="btn btn-warning" href="{{ route('post.index') }}">الرجوع</a>
              </div>
                </div>
                
              
            
              </div> 
            </form>
    @endsection
@section('scripts')
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

<script>
     CKEDITOR.replace( 'text' );     
 </script>
 
@endsection