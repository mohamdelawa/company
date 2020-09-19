<!DOCTYPE html>
<html dir="ltr" lang="en">

@include('layout.head')

<body>
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid" style="padding: 0px;">

           @include('layout.sidebar')
            <!-- ============================================================== -->
            <!-- Start Page padding -->
            <!-- ============================================================== -->
               @yield('page padding')

            <!-- ============================================================== -->
            <!-- End Page padding -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @include('layout.footer')
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>

        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="index/assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="index/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="index/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="index/dist/js/app-style-switcher.js"></script>
<!--Wave Effects -->
<script src="index/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="index/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="index/dist/js/custom.js"></script>
<script src="index/dist/js/search.js"></script>
</body>
</html>
