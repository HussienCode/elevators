@extends('admin.layout.master')

@section('content')
    <div class="card card-info col-12 mt-5">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('products.update', $products->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">الاسم باللغة العربية</label>
                    <div class="col-sm-10">
                        <input required type="text" name="name_ar" value="{{$products->name_ar}}" placeholder="الاسم باللغة العربية" class="form-control"
                            id="inputEmail3">
                            @error('name_ar')
                                <div class="alert alert-danger">يرجى ادخال الاسم العربي</div>
                            @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">الاسم باللغة الانجليزية</label>
                    <div class="col-sm-10">
                        <input required type="text" value="{{$products->name_en}}" placeholder="الاسم باللغة الانجليزية" name="name_en" class="form-control"
                            id="inputEmail3">
                            @error('name_en')
                                <div class="alert alert-danger">يرجى ادخال الاسم الانجليزي</div>
                            @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">الكود</label>
                    <div class="col-sm-10">
                        <input required type="text" value="{{$products->code}}" placeholder="الكود" name="code" class="form-control"
                            id="inputEmail3">
                            @error('code')
                                <div class="alert alert-danger">يرجى ادخال الكود الخاص بالنتج</div>
                            @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">الوصف باللغة العربية</label>
                    <div class="col-sm-10">
                        <textarea required name="description_ar" id="" class="form-control" placeholder="الوصف العربي">{{$products->description_ar}}</textarea>
                        @error('description_ar')
                                <div class="alert alert-danger">يرجى ادخال الوصف العربي</div>
                            @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">الوصف باللغة الانجليزية</label>
                    <div class="col-sm-10">
                        <textarea required name="description_en" id=""  class="form-control" placeholder="الوصف الانجليزي">{{$products->description_en}}</textarea>
                        @error('description_en')
                                <div class="alert alert-danger">يرجى ادخال الوصف الانجليزي</div>
                            @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">سنة التصنيع</label>
                    <div class="col-sm-10">
                        <input required type="text" value="{{$products->productionYear}}" placeholder="سنة التصنيع" name="productionYear" class="form-control"
                            id="inputEmail3">
                            @error('productionYear')
                                <div class="alert alert-danger">يرجى ادخال سنة التصنيع</div>
                            @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">السعر المحلى</label>
                    <div class="col-sm-10">
                        <input required type="text" value="{{$products->localPrice}}" placeholder="السعر المحلى" name="localPrice" class="form-control"
                            id="inputEmail3">
                            @error('localPrice')
                                <div class="alert alert-danger">يرجى ادخال السعر المحلي</div>
                            @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">السعر العالمي</label>
                    <div class="col-sm-10">
                        <input required type="text" value="{{$products->forignPrice}}" placeholder="السعر العالمي" name="forignPrice" class="form-control"
                            id="inputEmail3">
                            @error('forignPrice')
                                <div class="alert alert-danger">يرجى ادخال السعر العالمي</div>
                            @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">القسم</label>
                    <div class="col-sm-10">
                        <select required class="form-control" name="categories" id="">
                            <option value="{{$products->cat_id}}">{{$catValue[0]->name_ar}} - {{$catValue[0]->name_en}}</option>
                            @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->name_ar}} - {{$item->name_en}}</option>
                            @endforeach
                        </select>
                        @error('categories')
                                <div class="alert alert-danger">يرجى اختيار القسم</div>
                            @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">التصميم</label>
                    <div class="col-sm-10">
                        <select required class="form-control" name="designs" id="">
                            <option value="{{$products->design_id}}">{{$designValue[0]->name_ar}} - {{$designValue[0]->name_en}}</option>
                            @foreach ($designs as $item)
                                <option value="{{$item->id}}">{{$item->name_ar}} - {{$item->name_en}}</option>
                            @endforeach
                        </select>
                        @error('designs')
                                <div class="alert alert-danger">يرجى اختيار التصميم</div>
                            @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">المنشأ</label>
                    <div class="col-sm-10">
                        <select required class="form-control" name="countries" id="">
                            <option value="{{$products->country_id}}">{{$countryValue[0]->name_ar}} - {{$countryValue[0]->name_en}}</option>
                            @foreach ($countries as $item)
                                <option value="{{$item->id}}">{{$item->name_ar}} - {{$item->name_en}}</option>
                            @endforeach
                        </select>
                        @error('countries')
                                <div class="alert alert-danger">يرجى اختيار المنشأ</div>
                            @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">النوع</label>
                    <div class="col-sm-10">
                        <select required class="form-control" name="types" id="">
                            <option value="{{$products->type_id}}">{{$typeValue[0]->name_ar}} - {{$typeValue[0]->name_en}}</option>
                            @foreach ($types as $item)
                                <option value="{{$item->id}}">{{$item->name_ar}} - {{$item->name_en}}</option>
                            @endforeach
                        </select>
                        @error('types')
                                <div class="alert alert-danger">يرجى اختيار النوع</div>
                            @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">المقاس</label>
                    <div class="col-sm-10">
                        <select required class="form-control" name="sizes" id="">
                            <option value="{{$products->size_id}}">{{$sizeValue[0]->sizeNum}} - {{$sizeValue[0]->unit}}</option>
                            <option value="">اختر...</option>
                            @foreach ($sizes as $item)
                                <option value="{{$item->id}}">{{$item->sizeNum}} - {{$item->unit}}</option>
                            @endforeach
                        </select>
                        @error('sizes')
                                <div class="alert alert-danger">يرجى اختيار المقاس</div>
                            @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">الموديل</label>
                    <div class="col-sm-10">
                        <select required class="form-control" name="models" id="">
                            <option value="{{$products->model_id}}">{{$modelValue[0]->name_ar}} - {{$modelValue[0]->name_en}}</option>
                            <option value="">اختر...</option>
                            @foreach ($models as $item)
                                <option value="{{$item->id}}">{{$item->name_ar}} - {{$item->name_en}}</option>
                            @endforeach
                        </select>
                        @error('models')
                                <div class="alert alert-danger">يرجى ادخال الموديل</div>
                            @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">الشركة</label>
                    <div class="col-sm-10">
                        <select required class="form-control" name="companies" id="">
                            <option value="{{$products->company_id}}">{{$companyValue[0]->name_ar}} - {{$companyValue[0]->name_en}}</option>
                            @foreach ($companies as $item)
                                <option value="{{$item->id}}">{{$item->name_ar}} - {{$item->name_en}}</option>
                            @endforeach
                        </select>
                        @error('companies')
                                <div class="alert alert-danger">يرجى اختيار الشركة المصنعة للمنتج</div>
                            @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">الصورة الرئيسية</label>
                    <div class="col-sm-10">
                        <input type="file" name="mainPhoto" class="form-control">
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
