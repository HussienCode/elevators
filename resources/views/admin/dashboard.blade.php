@extends('admin.layout.master')

@section('content')
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ DB::table('users')->count('id') }}</h3>
                <p>كافة الاعضاء</p>
            </div>
            <div class="icon">
                <i class="fa fa-envelope"></i>
            </div>
            <a href="{{ url('/admin/users') }}" class="small-box-footer">تفاصيل اكتر <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ DB::table('contact')->count('id') }}</h3>
                <p>تواصل معنا</p>
            </div>
            <div class="icon">
                <i class="fa fa-envelope"></i>
            </div>
            <a href="{{ url('/admin/contact') }}" class="small-box-footer">تفاصيل اكتر <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ DB::table('about')->count('*') }}</h3>
                <p>عن الموقع</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/about') }}" class="small-box-footer">تفاصيل اكتر <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ DB::table('lk_Category')->count('*') }}</h3>

                <p>الاقسام</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/categories') }}" class="small-box-footer">تفاصيل اكتر <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ DB::table('lk_design')->count('*') }}</h3>

                <p>التصاميم</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/designs') }}" class="small-box-footer">تفاصيل اكتر <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ DB::table('lk_country')->count('*') }}</h3>
                <p>الدول</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/countries') }}" class="small-box-footer">تفاصيل اكتر <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-pink">
            <div class="inner">
                <h3>{{ DB::table('lk_state')->count('*') }}</h3>
                <p>المحافظات</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/states') }}" class="small-box-footer">تفاصيل اكتر <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-black">
            <div class="inner">
                <h3>{{ DB::table('lk_city')->count('*') }}</h3>
                <p>المدن</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/cities') }}" class="small-box-footer">تفاصيل اكتر <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-gray">
            <div class="inner">
                <h3>{{ DB::table('lk_type')->count('*') }}</h3>
                <p>الانواع</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/types') }}" class="small-box-footer">تفاصيل اكتر <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-purple">
            <div class="inner">
                <h3>{{ DB::table('lk_size')->count('*') }}</h3>
                <p>المقاسات</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/sizes') }}" class="small-box-footer">تفاصيل اكتر <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ DB::table('lk_model')->count('*') }}</h3>
                <p>الموديلات</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/models') }}" class="small-box-footer">تفاصيل اكتر <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ DB::table('lk_company')->count('*') }}</h3>
                <p>الشركات المصنعة</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/companies') }}" class="small-box-footer">تفاصيل اكتر <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ DB::table('products')->count('*') }}</h3>
                <p>المنتجات</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/products') }}" class="small-box-footer">تفاصيل اكتر <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <h3>{{ DB::table('prices')->count('*') }}</h3>
                <p>طلبات الاسعار</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/prices') }}" class="small-box-footer">تفاصيل اكتر <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ DB::table('lk_door_types')->count('*') }}</h3>
                <p>انواع الابواب</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/doorTypes') }}" class="small-box-footer">تفاصيل اكتر <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-orange">
            <div class="inner">
                <h3>{{ DB::table('lk_elevator_types')->count('*') }}</h3>
                <p>انواع المصاعد</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/elevatorTypes') }}" class="small-box-footer">تفاصيل اكتر <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    {{-- Cart Section --}}
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ DB::table('cart')->count('*') }}</h3>
                <p>الطلبات</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/admin/orders') }}" class="small-box-footer">تفاصيل اكتر <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
@endsection
