@extends('admin.layout.master')

@section('content')

<div style="display:block; ">
    <h1 class="mt-3">التعديل على صفحة (عن الموقع)</h1>
</div>

    <div class="card card-info col-12 mt-5">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">صورة</label>
                    <div class="col-sm-10">
                        <input type="file" name="about" class="form-control" id="inputEmail3">
                            @error('about')
                                <div class="alert alert-danger">صورة</div>
                            @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الاسم باللغة العربية</label>
                    <div class="col-sm-10">
                        <input type="text" required name="name_ar" value="{{$about->name_ar}}" placeholder="الاسم باللغة العربية" class="form-control"
                            id="inputEmail3">
                            @error('name_ar')
                                <div class="alert alert-danger">ادخل الاسم العربي</div>
                            @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الاسم باللغة الانجليزية</label>
                    <div class="col-sm-10">
                        <input type="text" required placeholder="الاسم باللغة الانجليزية" value="{{$about->name_en}}"  name="name_en" class="form-control"
                            id="inputEmail3">
                            @error('name_en')
                                <div class="alert alert-danger">ادخل الاسم الانجليزي</div>
                            @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الوصف باللغة العربية</label>
                    <div class="col-sm-10">
                        <textarea type="text" required placeholder="الوصف باللغة العربية" name="description_ar" class="form-control"
                            id="inputEmail3">{{$about->description_ar}}</textarea>
                            @error('description_ar')
                                <div class="alert alert-danger">ادخل الوصف العربي</div>
                            @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الوصف باللغة الانجليزية</label>
                    <div class="col-sm-10">
                        <textarea type="text" required placeholder="الوصف باللغة الانجليزية"  name="description_en" class="form-control"
                            id="inputEmail3">{{$about->description_en}}</textarea>
                            @error('description_en')
                                <div class="alert alert-danger">ادخل الوصف الانجليزي</div>
                            @enderror
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">حفظ</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
@endsection
