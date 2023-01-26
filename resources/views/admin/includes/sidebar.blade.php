<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admin/dashboard') }}" class="brand-link">
        <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">المصاعد</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                @guest
                    @if (Route::has('admin.login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.login') }}">{{ __('login') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('admin')->user()->name }}
                        </a>
                        <br>
                        <br>
                        <a href="{{ route('adminLogout') }}">
                            {{ __('تسجيل الخروج') }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                            <form id="logout-form" action="{{ route('adminLogout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                {{-- <a href="{{url('/admin/dashboard')}}" class="d-block"></a> --}}
            </div>
        </div>

        <!-- Sidebar Menu -->
        {{-- <nav class="mt-2"> --}}
        <nav class="sidebar card py-2 mb-4">
            <ul class="nav flex-column" id="nav_accordion">

                {{-- Setting --}}
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"> الاعدادات </a>
                    <ul class="submenu collapse">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('setting.index') }}"> المعلومات الاساسية </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('phones.index') }}"> ارقام التليفونات </a>
                        </li>
                    </ul>
                </li>

                {{-- categories --}}
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"> كافة المستخدمين </a>
                    <ul class="submenu collapse">
                        <li><a class="nav-link" href="{{ route('categories.index') }}">الادمن</a></li>
                        <li><a class="nav-link" href="{{ route('categories.create') }}">اضافة ادمن </a></li>
                    </ul>
                </li>

                <li class="nav-item has-submenu">
                    <a class="nav-link" href="{{ route('contact.index') }}"> تواصل معنا </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about.index') }}"> عن الموقع </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders.index') }}"> الطلبات </a>
                </li>

                {{-- categories --}}
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"> الاقسام </a>
                    <ul class="submenu collapse">
                        <li><a class="nav-link" href="{{ route('categories.index') }}">كافة الاقسام </a></li>
                        <li><a class="nav-link" href="{{ route('categories.create') }}">اضافة قسم </a></li>
                    </ul>
                </li>

                {{-- Designs --}}
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"> التصاميم </a>
                    <ul class="submenu collapse">
                        <li><a class="nav-link" href="{{ route('designs.index') }}">كافة التصاميم </a></li>
                        <li><a class="nav-link" href="{{ route('designs.create') }}">اضافة تصميم </a></li>
                    </ul>
                </li>

                {{-- countries --}}
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"> الدول </a>
                    <ul class="submenu collapse">
                        <li><a class="nav-link" href="{{ route('countries.index') }}">كافة الدول </a></li>
                        <li><a class="nav-link" href="{{ route('countries.create') }}">اضافة دولة </a></li>
                    </ul>
                </li>
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"> المحافظات </a>
                    <ul class="submenu collapse">
                        <li><a class="nav-link" href="{{ route('states.index') }}">كافة المحافظات </a></li>
                        <li><a class="nav-link" href="{{ route('states.create') }}">اضافة محافظة </a></li>
                    </ul>
                </li>
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"> المدن </a>
                    <ul class="submenu collapse">
                        <li><a class="nav-link" href="{{ route('cities.index') }}">كافة المدن </a></li>
                        <li><a class="nav-link" href="{{ route('cities.create') }}">اضافة مدينة </a></li>
                    </ul>
                </li>
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"> الانواع </a>
                    <ul class="submenu collapse">
                        <li><a class="nav-link" href="{{ route('types.index') }}">كافة الانواع </a></li>
                        <li><a class="nav-link" href="{{ route('types.create') }}">اضافة نوع </a></li>
                    </ul>
                </li>
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"> المقاسات </a>
                    <ul class="submenu collapse">
                        <li><a class="nav-link" href="{{ route('sizes.index') }}">كافة المقاسات </a></li>
                        <li><a class="nav-link" href="{{ route('sizes.create') }}">اضافة مقاس </a></li>
                    </ul>
                </li>
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"> الموديلات </a>
                    <ul class="submenu collapse">
                        <li><a class="nav-link" href="{{ route('models.index') }}">كافة الموديلات </a></li>
                        <li><a class="nav-link" href="{{ route('models.create') }}">اضافة موديل </a></li>
                    </ul>
                </li>
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"> الشركات المصنعة </a>
                    <ul class="submenu collapse">
                        <li><a class="nav-link" href="{{ route('companies.index') }}">كافة الشركات </a></li>
                        <li><a class="nav-link" href="{{ route('companies.create') }}">اضافة شركة </a></li>
                    </ul>
                </li>
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"> المنتجات </a>
                    <ul class="submenu collapse">
                        <li><a class="nav-link" href="{{ route('products.index') }}">كافة المنتجات </a></li>
                        <li><a class="nav-link" href="{{ route('products.create') }}">اضافة منتج </a></li>
                    </ul>
                </li>
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="{{ route('prices.index') }}"> طلبات الاسعار </a>
                </li>
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"> انواع الابواب </a>
                    <ul class="submenu collapse">
                        <li><a class="nav-link" href="{{ route('doorTypes.index') }}"> كافة انواع الابواب </a></li>
                        <li><a class="nav-link" href="{{ route('doorTypes.create') }}"> اضافة نوع للابواب </a></li>
                    </ul>
                </li>
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="#"> انواع المصاعد </a>
                    <ul class="submenu collapse">
                        <li><a class="nav-link" href="{{ route('elevatorTypes.index') }}"> كافة انواع المصاعد </a>
                        </li>
                        <li><a class="nav-link" href="{{ route('elevatorTypes.create') }}"> اضافة نوع للمصاعد </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        {{-- </nav> --}}
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
