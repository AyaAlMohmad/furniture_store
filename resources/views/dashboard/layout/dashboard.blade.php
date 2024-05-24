<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Maison Ciel</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{{ asset('dashboard/assets/images/photo_2024-01-18_11-51-02.jpg') }}">

    <!-- morris css -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/morris/morris.css') }}">
    <!-- Dropzone css -->
    <link href="{{ asset('dashboard/plugins/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard/assets/css/style.css') }}" rel="stylesheet" type="text/css">
   <!-- Sweet Alert -->
   <link href="{{ asset('dashboard/plugins/sweet-alert2/sweetalert2.css')}}" rel="stylesheet" type="text/css">

   <link href="{{ asset('dashboard/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
   <link href="{{ asset('dashboard/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
   <link href="{{ asset('dashboard/assets/css/style.css')}}" rel="stylesheet" type="text/css">

</head>


<body class="fixed-left">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        @include('dashboard.layout.includes.sidebar')
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">

                <!-- Top Bar Start -->
                @include('dashboard.layout.includes.navbar')
                <!-- Top Bar End -->

                <div class="page-content-wrapper ">




                    <div class="container-fluid">
                        @if ($message = \Session::get('success'))
                            <div class="alert alert-success">
                                {{ $message }}
                            </div>
                        @endif
                        @if ($message = \Session::get('error'))
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="row align-items-center">
                                        @if ($module_name != 'dash' )
                                        <div class="col-md-8">
                                            <h4 class="page-title m-0">
                                            <a href="{{ route($module_name . '.index') }}" >
                                                {{ $module_name }}
                                            </a></h4>
                                        </div>
                                        @endif
                                    
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end page-title-box -->
                            </div>
                        </div>
                        <!-- end page title -->

                        @yield('content')
                    </div><!-- container fluid -->
                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->

            @include('dashboard.layout.includes.footer')


        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->


    <!-- jQuery  -->
    <script src="{{ asset('dashboard/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/detect.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/fastclick.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/waves.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/jquery.scrollTo.min.js') }}"></script>
    <!-- Sweet-Alert  -->
        <script src="{{ asset('dashboard//plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
        <script src="{{ asset('dashboard/assets/pages/sweet-alert.init.js')}}"></script>        
    <!--Morris Chart-->
    <script src="{{ asset('dashboard/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/raphael/raphael.min.js') }}"></script>

    <!-- dashboard js -->
    <script src="{{ asset('dashboard/assets/pages/dashboard.int.js') }}"></script>
    <!-- Required datatable js -->
    <script src="{{ asset('dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('dashboard/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('dashboard/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/tinymce/tinymce.min.js')}}"></script>
    <!-- Datatable init js -->
    <script src="{{ asset('dashboard/assets/pages/datatables.init.js') }}"></script>
    <!-- Dropzone js -->
    <script src="{{ asset('dashboard/plugins/dropzone/dist/dropzone.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('dashboard/assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function () {
            if($("#elm1").length > 0){
                tinymce.init({
                    selector: "textarea#elm1",
                    theme: "modern",
                    height:300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                    style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ]
                });
            }
        });
    </script>
</body>

</html>
