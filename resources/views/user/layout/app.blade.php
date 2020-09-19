<!DOCTYPE html>
<html dir="ltr" lang="en">

@include('user.layout.head')

<body class="hold-transition sidebar-mini">

    <!-- Site wrapper -->
    <div class="wrapper">

    <!-- ============================================================== -->
    <!-- navbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
     @include('user.layout.navbar')
    <!-- ============================================================== -->
    <!-- End navbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    @include('user.layout.sidebar')
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('name_page')</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="card  card-outline col-md-12 " style="margin: auto">
                <div class=" card-body box-profile">
                    @include('massege')
            @yield('page padding')
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- /.content -->
            <div style="height: 20px;">

            </div>
        </div>
        <!-- /.content-wrapper -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
          @include('user.layout.footer')
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <script src="../../dist/js/search.js"></script>
</body>

</html>
