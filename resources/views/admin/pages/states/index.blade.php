@extends('admin.layout.master')

@section('content')

<div style="display:block; margin-top: 30px">
    <h1>المحافظات</h1>
    <a href="{{route('states.create')}}" class="btn btn-primary mt-5">
        <i class="ion ion-plus"></i> اضافة محافظة
    </a>
</div>

<table style="background: #FFF" class="table text-center table-bordered table-hover mt-5">
    @if (Session::has('success'))
        <div class="alert alert-success col-12">{{Session::get('success')}}</div>
    @endif



    <thead>
            <tr>
                <th>م</th>
                <th>الاسم العربي</th>
                <th>الاسم الاجنبي</th>
                <th>الدولة</th>
                <th>التعديل</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($states as $item)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->StateAr }}</td>
                    <td>{{ $item->StateEng }}</td>
                    <td>{{ $item->CountryAr }} - {{ $item->CountryEng }}</td>
                    <td>
                        <a href="{{route('states.edit', $item->id)}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{route('states.destroy', $item->id)}}" class="d-inline-block"  method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border: none; background: #FFF" class="fa fa-trash text-danger ml-3"></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
