@extends('admin.layout.master')

@section('content')

<div style="display:block; ">
    <h1 class="mt-3">اضافة منتج</h1>
</div>

    <div class="card card-info col-12 mt-5">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">الاسم باللغة العربية</label>
                    <div class="col-sm-10">
                        <input type="text" required name="name_ar" placeholder="الاسم باللغة العربية" class="form-control"
                            id="inputEmail3">
                        @error('name_ar')
                            <div class="alert alert-danger">يرجى ادخال الاسم العربي</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">الاسم باللغة الانجليزية</label>
                    <div class="col-sm-10">
                        <input type="text" required placeholder="الاسم باللغة الانجليزية" name="name_en" class="form-control"
                            id="inputEmail3">
                        @error('name_en')
                            <div class="alert alert-danger">يرجى ادخال الاسم الانجليزي</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">الكود</label>
                    <div class="col-sm-10">
                        <input type="text" required placeholder="الكود" name="code" class="form-control" id="inputEmail3">
                        @error('code')
                            <div class="alert alert-danger">يرجى ادخال الكود الخاص بالنتج</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">الوصف باللغة العربية</label>
                    <div class="col-sm-10">
                        <textarea required name="description_ar" id="" class="form-control" placeholder="الوصف العربي"></textarea>
                        @error('description_ar')
                            <div class="alert alert-danger">يرجى ادخال الوصف العربي</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">الوصف باللغة الانجليزية</label>
                    <div class="col-sm-10">
                        <textarea required name="description_en" id="" class="form-control" placeholder="الوصف الانجليزي"></textarea>
                        @error('description_en')
                            <div class="alert alert-danger">يرجى ادخال الوصف الانجليزي</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">سنة التصنيع</label>
                    <div class="col-sm-10">
                        <input required type="text" placeholder="سنة التصنيع" name="productionYear" class="form-control"
                            id="inputEmail3">
                        @error('productionYear')
                            <div class="alert alert-danger">يرجى ادخال سنة التصنيع</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">السعر المحلى</label>
                    <div class="col-sm-10">
                        <input required type="text" placeholder="السعر المحلى" name="localPrice" class="form-control"
                            id="inputEmail3">
                        @error('localPrice')
                            <div class="alert alert-danger">يرجى ادخال السعر المحلي</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">السعر العالمي</label>
                    <div class="col-sm-10">
                        <input required type="text" placeholder="السعر العالمي" name="forignPrice" class="form-control"
                            id="inputEmail3">
                        @error('forignPrice')
                            <div class="alert alert-danger">يرجى ادخال السعر العالمي</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">القسم</label>
                    <div class="col-sm-10">
                        <select required class="form-control" name="categories" id="">
                            <option value="">اختر...</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name_ar }} - {{ $item->name_en }}</option>
                            @endforeach
                        </select>
                        @error('categories')
                            <div class="alert alert-danger">يرجى اختيار القسم</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">التصميم</label>
                    <div class="col-sm-10">
                        <select required class="form-control" name="designs" id="">
                            <option value="">اختر...</option>
                            @foreach ($designs as $item)
                                <option value="{{ $item->id }}">{{ $item->name_ar }} - {{ $item->name_en }}</option>
                            @endforeach
                        </select>
                        @error('designs')
                            <div class="alert alert-danger">يرجى اختيار التصميم</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">المنشأ</label>
                    <div class="col-sm-10">
                        <select required class="form-control" name="countries" id="">
                            <option value="">اختر...</option>
                            @foreach ($countries as $item)
                                <option value="{{ $item->id }}">{{ $item->name_ar }} - {{ $item->name_en }}</option>
                            @endforeach
                        </select>
                        @error('countries')
                            <div class="alert alert-danger">يرجى اختيار المنشأ</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">النوع</label>
                    <div class="col-sm-10">
                        <select required class="form-control" name="types" id="">
                            <option value="">اختر...</option>
                            @foreach ($types as $item)
                                <option value="{{ $item->id }}">{{ $item->name_ar }} - {{ $item->name_en }}
                                </option>
                            @endforeach
                        </select>
                        @error('types')
                            <div class="alert alert-danger">يرجى اختيار النوع</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">المقاس</label>
                    <div class="col-sm-10">
                        <select required class="form-control" name="sizes" id="">
                            <option value="">اختر...</option>
                            @foreach ($sizes as $item)
                                <option value="{{ $item->id }}">{{ $item->sizeNum }} - {{ $item->unit }}</option>
                            @endforeach
                        </select>
                        @error('sizes')
                            <div class="alert alert-danger">يرجى اختيار المقاس</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">الموديل</label>
                    <div class="col-sm-10">
                        <select required class="form-control" name="models" id="">
                            <option value="">اختر...</option>
                            @foreach ($models as $item)
                                <option value="{{ $item->id }}">{{ $item->name_ar }} - {{ $item->name_en }}
                                </option>
                            @endforeach
                        </select>
                        @error('models')
                            <div class="alert alert-danger">يرجى ادخال الموديل</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">الشركة</label>
                    <div class="col-sm-10">
                        <select required class="form-control" name="companies" id="">
                            <option value="">اختر...</option>
                            @foreach ($companies as $item)
                                <option value="{{ $item->id }}">{{ $item->name_ar }} - {{ $item->name_en }}
                                </option>
                            @endforeach
                        </select>
                        @error('companies')
                            <div class="alert alert-danger">يرجى اختيار الشركة المصنعة للمنتج</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">الصورة الرئيسية</label>
                    <div class="col-sm-10">
                        <input type="file" name="mainPhoto" class="form-control" required>
                        <input type="text" class="form-control" name="mainPhotoTitle_ar" placeholder="اسم الصورة العربي">
                        <input type="text" class="form-control" name="mainPhotoTitle_en" placeholder="اسم الصورة الانجليزي">
                        <textarea name="mainPhotoDescription_ar" class="form-control" placeholder="الوصف العربي"></textarea>
                        <textarea name="mainPhotoDescription_en" class="form-control" placeholder="الوصف الانجليزي"></textarea>
                        @error('mainPhoto')
                            <div class="alert alert-danger">يرجى اضافة صورة للمنتج</div>
                        @enderror
                    </div>
                </div>
                {{--
                <div id="images">
                    <div class="form-group row">
                        <div class="col-2">
                            <label for="">صورة</label>
                        </div>
                        <div class="col-10">
                            <input type="file" class="form-control" name="ProductImage[]" placeholder="PhotosGroups">
                            <input type="text" class="form-control" name="title_ar[]" placeholder="اسم الصورة العربي">
                            <input type="text" class="form-control" name="title_en[]" placeholder="اسم الصورة الانجليزي">
                            <textarea name="ImageDescription_ar[]" class="form-control" placeholder="الوصف العربي"></textarea>
                            <textarea name="ImageDescription_en[]" class="form-control" placeholder="الوصف الانجليزي"></textarea>
                        </div>
                    </div>
                </div>
                <a id="add" class="btn btn-primary">اضف صورة</a>

                {{-- Videos --}}
                {{-- <div id="videos">
                    <div class="form-group row">
                        <div class="col-2">
                            <label for="">فيديو</label>
                        </div>
                        <div class="col-10">
                            <input type="file" class="form-control" name="ProductVideos[]" placeholder="PhotosGroups">
                            <input type="text" class="form-control" name="title_ar[]" placeholder="اسم الفيديو العربي">
                            <input type="text" class="form-control" name="title_en[]" placeholder="اسم الفيديو الانجليزي">
                            <textarea name="videosDescription_ar[]" class="form-control" placeholder="الوصف العربي"></textarea>
                            <textarea name="videosDescription_en[]" class="form-control" placeholder="الوصف الانجليزي"></textarea>
                        </div>
                    </div>
                </div>
                <a id="addVideo" class="btn btn-primary">اضف فيديو</a> --}}


                {{-- Videos --}}
                {{-- <div id="files">
                    <div class="form-group row">
                        <div class="col-2">
                            <label for="">ملف</label>
                        </div>
                        <div class="col-10">
                            <input type="file" class="form-control" name="ProductFiles[]" placeholder="PhotosGroups">
                            <input type="text" class="form-control" name="title_ar[]" placeholder="اسم الملف العربي">
                            <input type="text" class="form-control" name="title_en[]" placeholder="اسم الملف الانجليزي">
                            <textarea name="filesDescription_ar[]" class="form-control" placeholder="الوصف العربي"></textarea>
                            <textarea name="filesDescription_en[]" class="form-control" placeholder="الوصف الانجليزي"></textarea>
                        </div>
                    </div>
                </div>
                <a id="addFile" class="btn btn-primary">اضف ملف</a> --}}


                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">اضافة</button>
                </div>
                <!-- /.card-footer -->
        </form>
    </div>
@endsection
