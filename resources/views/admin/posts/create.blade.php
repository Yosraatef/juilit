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
              <form role="form" action="{{route('post.store')}}" method="post"
              enctype="multipart/form-data">
             {{ csrf_field()}}
              <div class="box-body">
               
                <div class="col-lg-offset-3 col-md-6">
                <div class="form-group">
                  <label for="title">اسم الموضوع</label>
                  <input type="text" class="form-control" name="title" 
                  id="title" placeholder="اضافة اسم الموضوع">
                </div>
                <div class="form-group">
                <label for="category">اسم  القسم </label>
                <select id="category" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="section_id">
                     <option>اختر القسم المناسب</option>
                  @foreach($sections as $section)
                    <option value="{{$section->id}}">
                {{
                    $section->name}}</option>
                  @endforeach
                </select>
              </div>
              
              <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('tag', 'كلمات ذات صلة', ['class' => 'control-label']) !!}
                    <button type="button" class="btn btn-primary btn-xs" id="selectbtn-tag">
                        Select all
                    </button>
                    <button type="button" class="btn btn-primary btn-xs" id="deselectbtn-tag">
                        Deselect all
                    </button>
                    {!! Form::select('tag[]', $tags, old('tag'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-tag' ]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tag'))
                        <p class="help-block">
                            {{ $errors->first('tag') }}
                        </p>
                    @endif
                </div>
            </div>
              <div class="form-group image" >
                  <label for="img">الصورة</label>
                  <br>
                  <input type="file" name="img" id="img">
                </div>
            <div class="form-group article" >
                <label for="body">الموضوع</label>
                <textarea type="body" name="body" placeholder="ادخل الموضوع" class="form-control" rows="10"></textarea>
            </div>
           <div class="form-group article" >
                <label for="text">تفاصيل النوضوع</label>
                <textarea type="text" name="text" placeholder="ادخل الموضوع" class="form-control" rows="10"></textarea>
            </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">اضافة</button>
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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
 <script>
        $("#selectbtn-tag").click(function(){
            $("#selectall-tag > option").prop("selected","selected");
            $("#selectall-tag").trigger("change");
        });
        $("#deselectbtn-tag").click(function(){
            $("#selectall-tag > option").prop("selected","");
            $("#selectall-tag").trigger("change");
        });

        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endsection