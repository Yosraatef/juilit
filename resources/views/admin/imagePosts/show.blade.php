@extends('admin.index')



@section('content')
    <h2>عرض كل الصور</h2>

    
    <div class="col-sm-6">


        <table class="table">
            <thead>
            <tr>
                <th>الرقم</th>
                <th>القسم</th>
                <th>اسم الموضوع </th>
                
                <th>الصورة</th>
                <th>التعديل</th>
                <th>الحدث</th>
            </tr>
            </thead>
           
            @if(count($images) > 0)
                @foreach($images as $img)
                <?php  
                   $section = DB::table('sections')->where('id',$img->section_id)->value('name');
                    $post = DB::table('posts')->where('id',$img->post_id)->value('title');
                ?>
                    <tbody>
                    <tr>
                        <td>{{$loop->index +1 }}</td>
                        <td>{{$section}}</td>
                        <td>{{$post}}</td>
                      
                        <td>
                           
                               <img style="width: 150px;height: 150px;" 
                            src="{{asset('public/pictures/images/'.$img->image) }}">
                            
                        </td>
                        
                        <td>
                            <a href="{{route('image.edit', $img->id)}}">
        
                                    <button class="btn btn-outline-warning" >
                                        تعديل 
                                    </button>
                                    </a>
                        </td>
                        <td>

                            <form action="{{route('image.destroy',$img->id)}}" method="POST">
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

        {{ $images->links() }}

    </div>

@endsection