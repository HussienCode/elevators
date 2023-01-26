@extends('admin.layout.master')

@section('content')

<div style="display:block; margin-top: 30px">
    <h1>المعلومات الاساسية للموقع</h1>
</div>

<table style="background: #FFF" class="table text-center table-bordered table-hover mt-5">
    <thead>
            <tr>
                <th>اسم الموقع</th>
                <th>الايميل</th>
                <th>العنوان</th>
                <th>رقم الواتساب</th>
                <th>الفيسبوك</th>
                <th>الانستجرام</th>
                <th>التويتر</th>
                <th>التعديل</th>
            </tr>
        </thead>
        <tbody>
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $setting->name_ar }} - {{ $setting->name_en }}</td>
                    <td>{{ $setting->email }}</td>
                    <td>{{ $setting->address }}</td>
                    <td>{{ $setting->whatsapp }}</td>
                    <td>{{ $setting->facebook }}</td>
                    <td>{{ $setting->instegram }}</td>
                    <td>{{ $setting->twitter }}</td>
                    <td>
                        <a href="{{route('setting.edit', $setting->id)}}">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                </tr>
        </tbody>
    </table>

    <a href="{{route('phones.index')}}" class="btn btn-primary">ارقام التليفونات</a>

@endsection
