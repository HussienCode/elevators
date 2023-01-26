@extends('admin.layout.master')
@section('content')
    <div class="card card-info col-12 mt-5">
        @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('orders.update', $order->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">وقت اضافة المنتج</label>
                    <div class="col-sm-10">
                        <input name="created_at" value="{{$order->created_at}}" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">اخر تعديل على المنتج</label>
                    <div class="col-sm-10">
                        <input name="updated_at" value="{{$order->updated_at}}" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">وقت وتاريخ الرد</label>
                    <div class="col-sm-10">
                        <input name="updated_at" value="{{$order->replayDate}}" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">المنتج</label>
                    <div class="col-sm-10">
                        <img src="/uploads/images/{{$order->mainPhoto}}" width="150" alt="">
                        <br>
                        <input type="text" name="name" value="{{$order->name_ar}} - {{$order->name_en}}" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">السعر</label>
                    <div class="col-sm-10">
                        <input type="text" name="price" value="{{$order->localPrice}} جنيه - {{$order->forignPrice}} $" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الكمية المطلوبة</label>
                    <div class="col-sm-10">
                        <input type="text" name="price" value="{{$order->mount}}" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الاجمالي</label>
                    <div class="col-sm-10">
                        <input type="text" name="price" value="{{$order->mount * $order->localPrice}} جنية - {{ $order->mount * $order->forignPrice }} $" disabled class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الرد</label>
                    <div class="col-sm-10">
                        <textarea type="text" required name="replay" class="form-control" id="inputEmail3" placeholder="الرد">{{$order->replay}}</textarea>
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
