
@extends('admin.index')



@section('content')
    <h2>عرض  الخبر </h2>

    
    <div class="col-sm-6">


        <table class="table">
            <thead>
            <tr>
                <th>الرقم</th>
                <th>كلمات ذات صلة</th>
                <th>تعديل</th>
                <th>الحدث</th>
            </tr>
            </thead>
           
            @if(count($tags) > 0)
                @foreach($tags as $tag)
                    <tbody>
                    <tr>
                        <td>{{$loop->index +1 }}</td>
                        <td>{{$tag->name}}</td>
                        <td>
                         <a href="{{route('tag.edit', $tag->id)}}">
                             <button class="btn btn-outline-warning" >
                                        تعديل 
                                </button>
                                    </a>
                        </td>
                        <td>

                            <form action="{{route('tag.destroy',$tag->id)}}" method="POST">
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

        {{ $tags->links() }}

    </div>

@endsection