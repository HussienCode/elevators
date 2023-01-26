@extends('admin.layout.master')
@section('content')


<table style="background: #FFF" class="table text-center table-bordered table-hover mt-5">
    @if (Session::has('success'))
        <div class="alert alert-success col-12">{{Session::get('success')}}</div>
    @endif
    <thead>
            <tr>
                <th>م</th>
                <th>الاسم</th>
                <th>الايميل</th>
                <th>رقم التليفون</th>
                <th>الرساله</th>
                <th>حالة الرد</th>
                <th>التفاصيل والرد</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $item)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ Str::limit($item->message, 25, '.....') }}</td>
                    @if ($item->status == 0)
                        <td class="alert alert-warning">
                            لم يتم الرد
                        </td>
                        @else
                        <td class="alert alert-success">
                            تم الرد
                        </td>
                        @endif
                    <td>
                        <a href="{{route('contact.edit', $item->id)}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{route('contact.destroy', $item->id)}}" class="d-inline-block"  method="post">
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
