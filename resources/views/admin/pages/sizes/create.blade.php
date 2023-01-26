@extends('admin.layout.master')

@section('content')

<div style="display:block; ">
    <h1 class="mt-3">اضافة مقاس</h1>
</div>

    <div class="card card-info col-12 mt-5">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('sizes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">المقاس</label>
                    <div class="col-sm-10">
                        <input type="text" name="sizeNum" placeholder="المقاس" class="form-control"
                            id="inputEmail3">
                            @error('sizeNum')
                                <div class="alert alert-danger">يرجى ادخل المقاس</div>
                            @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الوحدة</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="الوحدة" name="unit" class="form-control"
                            id="inputEmail3">
                            @error('unit')
                                <div class="alert alert-danger">يرجى ادخال الوحدة</div>
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
