
<!doctype html>
<html lang="en">
    <head>
        @include('admin.layouts.head')
    </head>

    <body data-sidebar="dark">
        
        <!-- Begin page -->
        <div id="layout-wrapper">
            <!-- ========== Header ========== -->
            @include('admin.layouts.header')
            <!-- ========== Header END ========== -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.layouts.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <div class="page-content">
                            <div class="container-fluid">
                                @yield('content')
                            </div>
                        </div>
                    </div> <!-- container-fluid -->
                </div>
            
                <!-- End Page-content -->

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
        
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
       @include('admin.layouts.script')

    </body>
</html>
