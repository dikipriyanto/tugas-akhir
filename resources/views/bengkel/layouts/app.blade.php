
<!doctype html>
<html lang="en">

    <head>
        @include('bengkel.layouts.head')
    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">
            <!-- Header -->
            @include('bengkel.layouts.header')

            <!-- ========== Left Sidebar Start ========== -->
            @include('bengkel.layouts.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                
                    <div class="container-fluid">
                        <div class="page-content">
                            <div class="container-fluid">
                                @yield('content')
                            </div>
                        </div>
                    </div> <!-- container-fluid -->
                
                

                <!-- End Page-content -->

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

    

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        @include('bengkel.layouts.script')

    </body>
</html>
