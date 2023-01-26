@extends('admin.layout.master')

@section('content')

<div style="display:block; ">
    <h1 class="mt-3">اضافة محافظة</h1>
</div>
    <div class="card card-info col-12 mt-5">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('states.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الاسم باللغة العربية</label>
                    <div class="col-sm-10">
                        <input type="text" name="name_ar" placeholder="الاسم باللغة العربية" class="form-control"
                            id="inputEmail3">
                            @error('name_ar')
                                <div class="alert alert-danger">ادخل الاسم العربي</div>
                            @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الاسم باللغة الانجليزية</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="الاسم باللغة الانجليزية" name="name_en" class="form-control"
                            id="inputEmail3">
                            @error('name_en')
                                <div class="alert alert-danger">ادخل الاسم الانجليزي</div>
                            @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الدولة</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="countries" id="">
                            <option value="">اختر...</option>
                            @foreach ($countries as $item)
                                <option value="{{$item->id}}">{{$item->name_ar}} - {{$item->name_en}}</option>
                            @endforeach
                        </select>
                        @error('countries')
                                <div class="alert alert-danger">اختر الدولة</div>
                            @enderror
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">اضافة</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
@endsection
