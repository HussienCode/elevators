@extends('admin.layout.master')
@section('content')
    <h1 class="mt-3">كافة الطلبات</h1>

    <table style="background: #FFF" class="table text-center table-bordered table-hover mt-5">
        @if (Session::has('success'))
            <div class="alert alert-success col-12">{{ Session::get('success') }}</div>
        @endif
        <thead>
            <tr>
                <th>م</th>
                <th>المنتج</th>
                <th>اسم المشتري</th>
                <th>سعر المنتج</th>
                <th>عدد الوحدات</th>
                <th>اجمالي المنتج</th>
                <th>حالة الرد</th>
                <th>الحذف</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $item)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $item->id }}</td>
                    <td>
                        <img width="150" src="/uploads/images/{{ $item->mainPhoto }}" alt=""><br>{{ $item->name_ar }} - {{ $item->name_en }}
                    </td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->localPrice }} جنية - {{ $item->forignPrice }} $</td>
                    <td>{{ $item->mount }}</td>
                    <td>{{ $localArr[] = $item->mount * $item->localPrice }} جنية - {{ $forignArr[] =$item->mount * $item->forignPrice }} $</td>
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
                        <a href="{{ route('orders.edit', $item->id) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('orders.destroy', $item->id) }}" class="d-inline-block" method="post">
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

    <h3>الاجمالي المحلي: {{array_sum($localArr)}} جنية</h3>
    <hr>
    <h3>الاجمالي العالمي: {{array_sum($forignArr)}} $</h3>

@endsection
