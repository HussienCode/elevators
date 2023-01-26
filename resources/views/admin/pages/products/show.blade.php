@extends('admin.layout.master')

@section('content')

<div style="display:block; margin-top: 30px">
    <h1>عرض كافة تفاصيل المنتج</h1>
</div>

<table style="background: #FFF" class="table text-center table-bordered table-hover mt-5">
    @if (Session::has('success'))
        <div class="alert alert-success col-12">{{Session::get('success')}}</div>
    @endif



    <thead>
            <tr>
                <th>الصورة الرئيسية</th>
                <th>
                    <img src="/uploads/images/{{$product->mainPhoto}}" width="500" alt="" srcset="">
                </th>
            </tr>
            <tr>
                <th>اسم الصورة الرئيسية</th>
                <th>{{$product->mPhT_ar}} - {{$product->mPhT_en}}</th>
            </tr>
            <tr>
                <th>وصف الصورة الرئيسية</th>
                <th>{{$product->mPhD_ar}} - {{$product->mPhD_en}}</th>
            </tr>
            <tr>
                <th>الاسم</th>
                <th>{{$product->name_ar}} - {{$product->name_en}}</th>
            </tr>
                <th>الوصف</th>
                <th>{{$product->description_ar}} - {{$product->description_en}}</th>
            <tr>
                <th>الكود</th>
                <th>{{$product->code}}</th>
            </tr>
            <tr>
                <th>سنة التصنيع</th>
                <th>{{$product->productionYear}}</th>
            </tr>
            <tr>
                <th>السعر</th>
                <th>$ {{$product->forignPrice}} - Egp {{$product->localPrice}}</th>
            </tr>
            <tr>
                <th>القسم</th>
                <th>{{$catValue->name_ar}} - {{$catValue->name_en}}</th>
            </tr>
            <tr>
                <th>التصميم</th>
                <th>{{$designValue->name_ar}} - {{$designValue->name_en}}</th>
            </tr>
            <tr>
                <th>المنشأ</th>
                <th>{{$countryValue->name_ar}} - {{$countryValue->name_en}}</th>
            </tr>
            <tr>
                <th>النوع</th>
                <th>{{$typeValue->name_ar}} - {{$typeValue->name_en}}</th>
            </tr>
            <tr>
                <th>المقاس</th>
                <th>{{$sizeValue->sizeNum}} - {{$sizeValue->unit}}</th>
            </tr>
            <tr>
                <th>الموديل</th>
                <th>{{$modelValue->name_ar}} - {{$modelValue->name_en}}</th>
            </tr>
            <tr>
                <th>الشركة المصنعة</th>
                <th>{{$companyValue->name_ar}} - {{$companyValue->name_en}}</th>
            </tr>
        </thead>
        {{--
        <tbody>
            @foreach ($product as $item)
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
                        <form action="{{route('products.destroy', $item->id)}}" class="d-inline-block"  method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border: none; background: #FFF" class="fa fa-trash text-danger ml-3"></button>
                        </form>
                    </td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
@endsection
