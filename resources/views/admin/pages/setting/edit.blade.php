@extends('admin.layout.master')

@section('content')
    <div style="display:block; ">
        <h1 class="mt-3">التعديل على البيانات الاساسية للموقع</h1>
    </div>

    <div class="card card-info col-12 mt-5">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">اسم الموقع العربي</label>
                    <div class="col-sm-10">
                        <input type="text" required name="name_ar" value="{{$setting->name_ar}}" class="form-control" placeholder="اسم الموقع العربي">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">اسم الموقع الانجليزي</label>
                    <div class="col-sm-10">
                        <input type="text" required name="name_en" value="{{$setting->name_en}}" class="form-control"
                            placeholder="اسم الموقع الانجليزي">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ايميل الموقع ورقم الواتساب</label>
                    <div class="col-sm-10">
                        <input type="email" required name="email" value="{{ $setting->email }}"
                            placeholder="الإيميل الخاص بالموقع" class="form-control mb-2" id="inputEmail3">
                        @error('email')
                            <div class="alert alert-danger">ادخل الإيميل الرسمي للموقع</div>
                        @enderror
                        <input type="whatsapp" required name="whatsapp" value="{{ $setting->whatsapp }}"
                            placeholder="رقم الواتساب" class="form-control" id="inputEmail3">
                        @error('whatsapp')
                            <div class="alert alert-danger">ادخل رقم الواتساب</div>
                        @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">العنوان</label>
                    <div class="col-sm-10">
                        <input type="text" required placeholder="العنوان" value="{{ $setting->address }}"
                            name="address" class="form-control" id="inputEmail3">
                        @error('address')
                            <div class="alert alert-danger">ادخل العنوان</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">مواقع التواصل الاجتماعي الخاصة بالموقع</label>
                    <div class="col-sm-10">
                        <input type="text" name="instegram" placeholder="Instegram Link"
                            value="{{ $setting->instegram }}" class="form-control">
                        <input type="text" name="facebook" placeholder="Facebook Link" value="{{ $setting->facebook }}"
                            class="form-control">
                        <input type="text" name="twitter" placeholder="Twitter Link" value="{{ $setting->twitter }}"
                            class="form-control">
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">حفظ التعديلات</button>
            </div>
        </form>

        {{-- <hr class="mt-5">
        <h2>التعديل على الارقام</h2>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">تليفونات الموقع</label>
            <div class="col-sm-10">
                @foreach ($tel as $item)
                    <form action="{{ route('updateTel', $ids) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" placeholder="رقم التليفون" value="{{ $item->phone }}" name="phone[]"
                            class="form-control" id="inputEmail3">
                @endforeach
                <div class="d-grid">
                    <button class="btn btn-primary" type="submit">حفظ التعديلات</button>
                </div>
                </form>
            </div>
        </div> --}}


        {{-- <hr class="mt-5">
        <h2>اضافة ارقام اخرى</h2>
        <form action="{{ route('telStore') }}" method="POST">

            @if (Session::has('insertTel'))
                <div class="alert alert-success">{{ Session::get('insertTel') }}</div>
            @endif

            @csrf
            <div class="telSection">
                <input type="text" id="phoneID" name="phone[]" placeholder="رقم الموبايل" class="form-control">
            </div>
            <div id="addTel" class="btn btn-danger col-sm-2">اضافة تليفون اخر</div>
            <div class="d-grid gap-1">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </form> --}}
    </div>
    <!-- /.card-footer -->
    </div>
@endsection
