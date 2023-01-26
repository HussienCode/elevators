@include('admin.includes.heaer')

@include('admin.includes.navbar')

@include('admin.includes.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                @yield('content')

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>
@include('admin.includes.footer')
