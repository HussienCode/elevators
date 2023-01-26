@extends('admin.layout.master')
@section('content')
    <div class="card card-info col-12 mt-5">
        @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('contact.update', $contacts->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">وقت وتاريخ الرسالة</label>
                    <div class="col-sm-10">
                        <input name="created_at" value="{{$contacts->created_at}}" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">وقت وتاريخ الرد</label>
                    <div class="col-sm-10">
                        <input name="updated_at" value="{{$contacts->updated_at}}" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الاسم</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{$contacts->name}}" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الايميل</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value="{{$contacts->email}}" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">التليفون</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone" value="{{$contacts->phone}}" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الرسالة</label>
                    <div class="col-sm-10">
                        <textarea type="text" name="message" disabled class="form-control" id="inputEmail3">{{$contacts->message}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الرد</label>
                    <div class="col-sm-10">
                        <textarea type="text" name="replay" class="form-control" id="inputEmail3" placeholder="الرد">{{$contacts->replay}}</textarea>
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
