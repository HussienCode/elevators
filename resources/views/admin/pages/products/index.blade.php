@extends('admin.layout.master')

@section('content')

<div style="display:block; margin-top: 30px">
    <h1>المنتجات</h1>
    <a href="{{route('products.create')}}" class="btn btn-primary mt-5">
        <i class="ion ion-plus"></i> اضافة منتج
    </a>
</div>

<table style="background: #FFF" class="table text-center table-bordered table-hover mt-5">
    @if (Session::has('success'))
        <div class="alert alert-success col-12">{{Session::get('success')}}</div>
    @endif

    <thead>
            <tr>
                <th>الصورة الرئيسية</th>
                <th>الاسم</th>
                <th>الوصف</th>
                <th>الكود</th>
                <th>سنة التصنيع</th>
                <th>السعر المحلى</th>
                <th>السعر العالمي</th>
                <th>القسم</th>
                <th>التصميم</th>
                <th>المنشأ</th>
                <th>النوع</th>
                <th>المقاس</th>
                <th>الموديل</th>
                <th>الشركة المصنعة</th>
                <th>الصور</th>
                <th>الفيديوهات</th>
                <th>الملفات</th>
                <th>التعديل</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>
                        <img src="/uploads/images/{{ $item->mainPhoto }}" width="150" alt="">
                    </td>
                    <td>{{ $item->name_ar }} - {{ $item->name_en }}</td>
                    <td>{{ Str::limit($item->description_ar, 10, '...') }} - {{ Str::limit($item->description_en, 10, '...') }}</td>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->productionYear }}</td>
                    <td>{{ $item->localPrice }}EGP</td>
                    <td>{{ $item->forignPrice }}$</td>
                    <td>{{ $item->categoryAr }} - {{ $item->categoryEng }}</td>
                    <td>{{ $item->designAr }} - {{ $item->designEng }}</td>
                    <td>{{ $item->countryAr }} - {{ $item->countryEng }}</td>
                    <td>{{ $item->typeAr }} - {{ $item->typeEng }}</td>
                    <td>{{ $item->sizeNum }}{{ $item->unit }}</td>
                    <td>{{ $item->modelAr }} - {{ $item->modelEng }}</td>
                    <td>{{ $item->companyAr }} - {{ $item->companyEng }}</td>
                    <td>
                        <a href="{{route('photos.show', $item->id)}}">
                            <i class="fa fa-eye fa-lg"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{route('videos.show', $item->id)}}">
                            <i class="fa fa-eye fa-lg"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{route('files.show', $item->id)}}">
                            <i class="fa fa-eye fa-lg"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{route('products.edit', $item->id)}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{route('products.show', $item->id)}}">
                            <i class="fa fa-eye text-success"></i>
                        </a>
                        <form action="{{route('products.destroy', $item->id)}}" class="d-inline-block"  method="post">
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
