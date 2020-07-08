@extends('admin.index')



@section('content')
    <h2>عرض الأقسام</h2>

    
    <div class="col-sm-12 table-responsive" >


        <table class="table" >
            <thead>
            <tr>
                <th>الرقم</th>
                <th>العنوان</th>
                <th>الموضوع</th>
                <th> القسم</th>
                <th> الصورة</th>
                <th>تفاصيل  الموضوع</th>
                <th>كلمات ذات صلة</th>
                <th>تعديل</th>
                <th>الحدث</th>
            </tr>
            </thead>
           
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <tbody>
                    <tr>
                        <td>{{$loop->index +1 }}</td>
                        <td>{{$post->title}}</td>
                       <td width="40%">{{$post->body}}</td>
                        <td>
                              {{$post->section->name}}
                        </td>
                        <td>
                               <img style="width: 50px;height: 50px;" 
                            src="{{asset('public/pictures/post/'.$post->img) }}">
                            
                        </td>
                        <td>{{ $post->text }}</td>
                        
                         <td field-key='tag'>
                            @foreach ($post->tag as $singleTag)
                                <span class="label label-info label-many">{{ $singleTag->name }}</span>
                            @endforeach
                        </td>

                        <td>
                            <a href="{{route('post.edit', $post->id)}}">
        
                                    <button class="btn btn-outline-warning" >
                                        تعديل 
                                    </button>
                                    </a>
                        </td>
                        <td>

                            <form action="{{route('post.destroy',$post->id)}}" method="POST">
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

        {{ $posts->links() }}

    </div>

@endsection