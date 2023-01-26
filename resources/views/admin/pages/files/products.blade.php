@extends('admin.layout.master')
@section('content')


<div style="display:block; margin-top: 30px">
    <h1>الملفات التابعة للمنتج</h1>
    <a href="{{route('createProductFile', $id)}}" class="btn btn-primary mt-5">اضافة ملف للمنتج</a>

</div>


<table style="background: #FFF" class="table text-center table-bordered table-hover mt-3">
    @if (Session::has('success'))
        <div class="alert alert-success col-12">{{Session::get('success')}}</div>
    @endif
        <tr>
            <td>الملف</td>
            <td>نوع الملف</td>
            <td>الوصف</td>
            <td>تنزيل</td>
            <td>تعديل</td>
        </tr>
        @foreach ($files as $item)
            <tr>
                {{-- <td>{{$item->id}}</td> --}}
                <td>{{$item->title_ar}} - {{$item->title_en}}</td>
                <td>
                    {{$item->extension}}
                </td>
                <td>{{$item->description_ar}} - {{$item->description_en}}</td>
                <td>
                    <a href="{{url('/admin/file', $item->id)}}">
                        <i class="fa fa-download"></i>
                    </a>
                </td>
                <td>
                    <a href="{{route('files.edit', $item->id)}}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{route('files.destroy', $item->id)}}" class="d-inline-block"  method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="border: none; background: #FFF" class="fa fa-trash text-danger ml-3"></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
