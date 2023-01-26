@extends('admin.layout.master')

@section('content')

<div style="display:block; ">
    <h1 class="mt-3">اضافة تصميم</h1>
</div>

    <div class="card card-info col-12 mt-5">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('designs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الاسم باللغة العربية</label>
                    <div class="col-sm-10">
                        <input type="text" name="name_ar" placeholder="الاسم باللغة العربية" class="form-control"
                            id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الاسم باللغة الانجليزية</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="الاسم باللغة الانجليزية" name="name_en" class="form-control"
                            id="inputEmail3">
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
