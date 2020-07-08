@extends('admin.index')
@section('content')
    <h2>عرض الأقسام</h2>

    
    <div class="col-sm-6">


        <table class="table">
            <thead>
            <tr>
                <th>الرقم</th>
                <th>الصورة</th>
                <th>تعديل</th>
                <th>الحدث</th>
            </tr>
            </thead>
           
            @if(count($banners) > 0)
                @foreach($banners as $banner)
                    <tbody>
                    <tr>
                        <td>{{$loop->index +1 }}</td>
                        
                        <td>
                           
                               <img style="width: 50px;height: 50px;" 
                            src="{{asset('public/pictures/banner/'.$banner->img) }}">
                            
                        </td>
                        <td>
                            <a href="{{route('banner.edit', $banner->id)}}">
        
                                    <button class="btn btn-outline-warning" >
                                        تعديل 
                                    </button>
                                    </a>
                        </td>
                        <td>
                        <form action="{{route('banner.destroy',$banner->id)}}" method="POST">
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

        {{ $banners->links() }}

    </div>

@endsection