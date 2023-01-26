@extends('admin.layout.master')

@section('content')

<div style="display:block; ">
    <h1 class="mt-3">التعديل على الفيديو التابع للمنتج</h1>
</div>

    <div class="card card-info col-12 mt-5">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('videos.update', $productVideo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الفيديو</label>
                    <div class="col-sm-10">
                        <input type="file" name="productVideos" value="{{$productVideo->name}}" placeholder="الاسم باللغة العربية" class="form-control"
                            id="inputEmail3">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الاسم باللغة العربية</label>
                    <div class="col-sm-10">
                        <input type="text" required placeholder="الاسم باللغة العربية" value="{{$productVideo->title_ar}}"  name="title_ar" class="form-control"
                            id="inputEmail3">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الاسم باللغة الانجليزية</label>
                    <div class="col-sm-10">
                        <input type="text" required placeholder="الاسم باللغة الانجليزية" value="{{$productVideo->title_en}}"  name="title_en" class="form-control"
                            id="inputEmail3">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">وصف الفيديو العربي</label>
                    <div class="col-sm-10">
                        <textarea required name="description_ar" class="form-control">{{$productVideo->description_ar}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">وصف الفيديو الانجليزي</label>
                    <div class="col-sm-10">
                        <textarea required name="description_en" class="form-control">{{$productVideo->description_en}}</textarea>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{URL::previous()}}" class="btn btn-danger">الغاء</a>
                <button type="submit" class="btn btn-info">حفظ</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
@endsection
