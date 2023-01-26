@extends('admin.layout.master')
@section('content')


<div style="display:block; margin-top: 30px">
    <h1>الفيديوهات التابعة لهذا المنتج</h1>
    <a href="{{route('createProductVideo', $id)}}" class="btn btn-primary mt-5">اضافة فيديو للمنتج</a>
</div>


<table style="background: #FFF" class="table text-center table-bordered table-hover mt-3">
    @if (Session::has('success'))
        <div class="alert alert-success col-12">{{Session::get('success')}}</div>
    @endif
        <tr>
            {{-- <td>م</td> --}}
            <td>الفيديو</td>
            <td>الاسم</td>
            <td>الوصف</td>
            <td>تعديل</td>
        </tr>
        @foreach ($videos as $item)
            <tr>
                {{-- <td>{{$item->id}}</td> --}}
                <td>
                    <video controls width="300">
                        <source src="/uploads/videos/{{$item->name}}" type="video/{{$item->extension}}">
                    </video>
                </td>
                <td>{{$item->title_ar}} - {{$item->title_en}}</td>
                <td>{{$item->description_ar}} - {{$item->description_en}}</td>
                <td>
                    <a href="{{route('videos.edit', $item->id)}}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{route('videos.destroy', $item->id)}}" class="d-inline-block"  method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="border: none; background: #FFF" class="fa fa-trash text-danger ml-3"></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
