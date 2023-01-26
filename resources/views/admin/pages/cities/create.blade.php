@extends('admin.layout.master')

@section('content')

<div style="display:block; ">
    <h1 class="mt-3">اضافة مدينة</h1>
</div>

    <div class="card card-info col-12 mt-5">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('cities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الاسم باللغة العربية</label>
                    <div class="col-sm-10">
                        <input type="text" name="name_ar" placeholder="الاسم باللغة العربية" class="form-control"
                            id="inputEmail3">
                            @error('name_ar')
                                <div class="alert alert-danger">يرجى ادخال الاسم العربي</div>
                            @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الاسم باللغة الانجليزية</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="الاسم باللغة الانجليزية" name="name_en" class="form-control"
                            id="inputEmail3">
                            @error('name_en')
                                <div class="alert alert-danger">يرجى ادخال الاسم الانجليزي</div>
                            @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">الدولة</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="country" id="country-dropdown">
                            <option value="">اختر...</option>
                            @foreach ($countries as $item)
                                <option value="{{$item->id}}">{{$item->name_ar}} - {{$item->name_en}}</option>
                            @endforeach
                        </select>
                        @error('country')
                            <div class="alert alert-danger">يرجى اختيار الدولة</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">المحافظة</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="state" id="state-dropdown">
                        </select>
                        @error('state')
                            <div class="alert alert-danger">يرجى اختيار المحافظة</div>
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
        <script>
            $(document).ready(function() {
                $('#country-dropdown').on('change', function() {
                    var country_id = this.value;
                    $("#state-dropdown").html('');
                    $.ajax({
                        url: "{{ url('/admin/getStates') }}",
                        type: "POST",
                        data: {
                            country_id: country_id,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(result) {
                            $('#state-dropdown').html('<option value="">Select State</option>');
                            $.each(result.states, function(key, value) {
                                $("#state-dropdown").append('<option value="' + value.id +
                                    '">' + value.name_ar + '</option>');
                            });
                            $('#city-dropdown').html(
                            '<option value="">Select State First</option>');
                        }
                    });
                });
                $('#state-dropdown').on('change', function() {
                    var state_id = this.value;
                    $("#city-dropdown").html('');
                    $.ajax({
                        url: "{{ url('get-cities-by-state') }}",
                        type: "POST",
                        data: {
                            state_id: state_id,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(result) {
                            $('#city-dropdown').html('<option value="">Select City</option>');
                            $.each(result.cities, function(key, value) {
                                $("#city-dropdown").append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                });
            });
        </script>
    </div>
@endsection
