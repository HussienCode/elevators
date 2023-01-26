@extends('admin.layout.master')
@section('content')

    <div style="display:block; margin-top: 30px">
        <h1>الصور التابعة للمنتج</h1>
        <a href="{{ route('createProductPhoto', $id) }}" class="btn btn-primary">اضافة صورة للمنتج</a>
    </div>

    <table style="background: #FFF" class="table text-center table-bordered table-hover mt-5">
        @if (Session::has('success'))
            <div class="alert alert-success col-12">{{ Session::get('success') }}</div>
        @endif
        <tr>
            {{-- <td>م</td> --}}
            <td>الصورة</td>
            <td>الاسم</td>
            <td>الوصف</td>
            <td>تعديل</td>
        </tr>

        @foreach ($photos as $item)
            <tr>
                {{-- <td>{{$item->id}}</td> --}}
                <td>
                    <img src="/uploads/images/{{ $item->name }}" alt="" width="300">
                </td>
                <td>{{ $item->title_ar }} - {{ $item->title_en }}</td>
                <td>{{ $item->description_ar }} - {{ $item->description_en }}</td>
                <td>
                    <a href="{{ route('photos.edit', $item->id) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{ route('photos.destroy', $item->id) }}" class="d-inline-block" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="border: none; background: #FFF"
                            class="fa fa-trash text-danger ml-3"></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
