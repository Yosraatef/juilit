
@extends('admin.index')

@section('content')
        <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        اضافة  صور الموضوع
      </h1>
      
    </section>
    <section class="content">
            <div class="box box-primary">
              
               @include('includes.messages')
              <form role="form" action="{{route('image.store')}}" method="post"
              enctype="multipart/form-data">
             {{ csrf_field()}}
              <div class="box-body">
                <div class="col-lg-offset-3 col-md-6">
                
                <div class="form-group">
                <label for="category">اسم  القسم </label>
                <select id="category" class="form-control select2 " style="width: 100%;" tabindex="-1" aria-hidden="true" name="section_id">
                     <option>اختر القسم المناسب</option>
                  @foreach($sections as $section)
                    <option value="{{$section->id}}">
                      {{ $section->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="posts">المواضيع</label>
                <select id="posts" class="form-control select2" style="width: 100%;" tabindex="-1" aria-hidden="true" name="post_id">
                  <option>اختر القسم المناسب</option>
                  <option value=""></option>
                </select>
              </div>
              <div class="form-group image" >
                  <label for="image">الصورة</label>
                  <br>
                  <input type="file" name="image" id="image">
                </div>
               
           
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">اضافة</button>
                <a type="button" class="btn btn-warning" href="{{ route('image.index') }}">الرجوع</a>
              </div>
                </div>
                
              
            
              </div> 
            </form>
    @endsection
@section('scripts')

 <script>
 $(document).ready(function () { 
            $('#category').on('change',function(e){
            console.log(e);
            var section_id = e.target.value;
            console.log(section_id);
            //ajax
            $.get('../../ajax-subcat/'+ section_id,function(data){
                //success data
              console.log(data);
                var subcat =  $('#posts').empty();
                $.each(data,function(create,subcatObj){
                    $('#posts').append('<option value ="'+subcatObj.id+'">'+subcatObj.title+'</option>');
            });
        });
    });
});
</script>
@endsection