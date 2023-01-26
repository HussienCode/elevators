@extends('admin.layout.master')

@section('content')
    <div style="display:block; margin-top: 30px">
        <h1>التليفونات</h1>
    </div>

    @if (Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif

    <table style="background: #FFF" class="table text-center table-bordered table-hover mt-5">
        <thead>
            <tr>
                <th>الرقم</th>
                <th>التعديل والحذف</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($phones as $item)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $item->phone }}</td>
                    <td>
                        <a href="{{ route('phones.edit', $item->id) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('phones.destroy', $item->id) }}" class="d-inline-block" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border: none; background: #FFF"
                                class="fa fa-trash text-danger ml-3"></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <div style="display:block; margin-top: 30px">
        <h3>اضافة تليفون جديد</h3>
    </div>

    @if (Session::has('insertTel'))
        <div class="alert alert-success">{{Session::get('insertTel')}}</div>
    @endif

    <form action="{{ route('phones.store') }}" method="post">
        @csrf
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">رقم التليفون</label>
            <div class="col-sm-10">
                <input type="text" name="phone" placeholder="رقم التليفون" class="form-control">
            </div>
        </div>
        <button class="btn btn-primary" type="submit">حفظ التعديلات</button>
    </form>
@endsection
