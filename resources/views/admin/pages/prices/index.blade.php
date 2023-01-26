@extends('admin.layout.master')
@section('content')
    <h1 class="mt-3">طلب الاسعار</h1>

    <table style="background: #FFF" class="table text-center table-bordered table-hover mt-5">
        @if (Session::has('success'))
            <div class="alert alert-success col-12">{{ Session::get('success') }}</div>
        @endif
        <thead>
            <tr>
                <th>الاسم</th>
                <th>العنوان</th>
                <th>رقم التليفون</th>
                <th>عدد الطوابق</th>
                <th>عدد الاشخاص</th>
                <th>عدد الابواب</th>
                <th>نوع الباب</th>
                <th>نوع المصعد</th>
                <th>ملاحظات</th>
                <th>حالة الرد</th>
                <th>التفاصيل والرد</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prices as $item)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->floorNum }}</td>
                    <td>{{ $item->peopleNum }}</td>
                    <td>{{ $item->doorsNum }}</td>
                    <td>{{ $item->doorAr }} - {{$item->doorEn}}</td>
                    <td>{{ $item->elevatorAr }} - {{$item->elevatorEn}}</td>
                    <td>{{ Str::limit($item->notes, 25, '.....') }}</td>
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
                        <a href="{{ route('prices.edit', $item->id) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('prices.destroy', $item->id) }}" class="d-inline-block" method="post">
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
@endsection
