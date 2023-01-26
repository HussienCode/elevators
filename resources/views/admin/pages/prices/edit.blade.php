@extends('admin.layout.master')
@section('content')
    <div class="card card-info col-12 mt-5">
        @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('prices.update', $prices->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">وقت وتاريخ الرسالة</label>
                    <div class="col-sm-10">
                        <input name="created_at" value="{{$prices->created_at}}" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">وقت وتاريخ الرد</label>
                    <div class="col-sm-10">
                        <input name="updated_at" value="{{$prices->updated_at}}" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الاسم</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{$prices->name}}" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">العنوان</label>
                    <div class="col-sm-10">
                        <input type="text" name="address" value="{{$prices->address}}" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">التليفون</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone" value="{{$prices->phone}}" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">عدد الطوابق</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone" value="{{$prices->floorNum}}" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">عدد الاشخاص</label>
                    <div class="col-sm-10">
                        <input type="text" name="peopleNum" value="{{$prices->peopleNum}}" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">عدد الابواب</label>
                    <div class="col-sm-10">
                        <input type="text" name="doorsNum" value="{{$prices->doorsNum}}" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">نوع الباب</label>
                    <div class="col-sm-10">
                        <input type="text" name="doorType" value="{{$prices->doorAr}} - {{$prices->doorEn}}" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">نوع المصعد</label>
                    <div class="col-sm-10">
                        <input type="text" name="elevatorType" value="{{$prices->elevatorAr}} - {{$prices->elevatorEn}}" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الرسالة</label>
                    <div class="col-sm-10">
                        <textarea type="text" name="notes" disabled class="form-control" id="inputEmail3">{{$prices->notes}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الرد</label>
                    <div class="col-sm-10">
                        <textarea type="text" required name="replay" class="form-control" id="inputEmail3" placeholder="الرد">{{$prices->replay}}</textarea>
                        @error('replay')
                            <div class="alert alert-danger">من فضلك رد على الرسالة</div>
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
