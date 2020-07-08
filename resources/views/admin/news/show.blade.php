@extends('admin.index')



@section('content')
    <h2>عرض  الخبر </h2>

    
    <div class="col-sm-6">


        <table class="table">
            <thead>
            <tr>
                <th>الرقم</th>
                <th>العنوان</th>
                <th >الخبر</th>
                
                <th> الصورة</th>
                <th>تعديل</th>
                <th>الحدث</th>
            </tr>
            </thead>
           
            @if(count($news) > 0)
                @foreach($news as $new)
                    <tbody>
                    <tr>
                        <td>{{$loop->index +1 }}</td>
                        <td>{{$new->title}}</td>
                       <td>{{$new->new}}</td>
                       
                        <td>
                           
                               <img style="width: 50px;height: 50px;" 
                            src="{{asset('public/pictures/new/'.$new->img) }}">
                            
                        </td>
                        <td>
                            <a href="{{route('new.edit', $new->id)}}">
        
                                    <button class="btn btn-outline-warning" >
                                        تعديل 
                                    </button>
                                    </a>
                        </td>
                        <td>

                            <form action="{{route('new.destroy',$new->id)}}" method="POST">
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

        {{ $news->links() }}

    </div>

@endsection