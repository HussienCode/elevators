@extends('admin.layout.master')

@section('content')

<div style="display:block; margin-top: 30px">
    <h1>عن الموقع</h1>
</div>

<table style="background: #FFF" class="table text-center table-bordered table-hover mt-5">
    @if (Session::has('success'))
        <div class="alert alert-success col-12">{{Session::get('success')}}</div>
    @endif

    <thead>
            <tr>
                <th>الصورة</th>
                <th>الاسم</th>
                <th>الوصف</th>
                <th>التعديل</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($about as $item)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>
                        <img src="/uploads/about/{{ $item->image }}" width="200">
                    </td>
                    <td>{{ $item->name_ar }} - {{ $item->name_en }}</td>
                    <td>{{ $item->description_ar }} - {{ $item->description_en }}</td>
                    <td>
                        <a href="{{route('about.edit', $item->id)}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        {{-- <form action="{{route('about.destroy', $item->id)}}" class="d-inline-block"  method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border: none; background: #FFF" class="fa fa-trash text-danger ml-3"></button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
