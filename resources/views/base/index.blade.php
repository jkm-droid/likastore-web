<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Lika Store</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{ asset("/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css") }}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />

    <link href="{{ asset("/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('/toast/css/eggy.css') }}" />
    <!-- Progressbar Styles -->
    <link rel="stylesheet" href="{{ asset('/toast/css/progressbar.css') }}" />
    <!-- Themes -->
    <link rel="stylesheet" href="{{ asset('/toast/css/theme.css') }}" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

{{--    <link href="{{ asset("/css/tables.css")}}" rel="stylesheet" type="text/css" />--}}

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue">
<div class="wrapper">

    <!-- Header -->
@include('includes/header')

<!-- Sidebar -->
@include('includes/sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content" style="min-height:850px;">
            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('includes/footer')

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 2.1.4 -->
<script src="{{ asset("/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}" type="text/javascript"></script>
<!-- FastClick -->
<script src="{{asset("/admin-lte/plugins/fastclick/fastclick.min.js")}}" type="text/javascript"></script>
<!-- jQuery 2.1.3 -->
<script src="{{ asset ("/admin-lte/plugins/jQuery/jQuery-2.1.3.min.js") }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/admin-lte/dist/js/app.min.js") }}" type="text/javascript"></script>
<!-- Sparkline -->
<script src="{{ asset("/admin-lte/plugins/sparkline/jquery.sparkline.min.js") }}" type="text/javascript"></script>
<!-- jvectormap -->
<script src="{{asset("/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js")}}" type="text/javascript"></script>
<script src="{{asset("/admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js")}}" type="text/javascript"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{asset("/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js")}}" type="text/javascript"></script>
{{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>--}}
{{--<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>--}}
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<!-- fullCalendar 2.2.5 -->
<script src="{{asset("/admin-lte/plugins/fullcalendar/fullcalendar.min.js")}}" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function performSearch() {
        $(document).on('click', '#search_button', function (e) {
            e.preventDefault();

            var term = $('#search_term').val();

            if (term === '') {
                console.log("enter data");
            }else{
                $.ajax({
                    url: '{{ url('orders/search') }}',
                    type: 'GET',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'term': term,
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.status_code === 201){
                            $('#message').html('<p class="text-center text-danger">no match found</p>');
                        }
                        $('tbody').html(response);
                    },

                    failure: function (response) {
                        console.log("something went wrong");
                    }
                });
            }
        });
    }
</script>

<script type="text/javascript">
    @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.success("{{ session('success') }}");
    @endif

    @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
        toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
        toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.warning("{{ session('warning') }}");
    @endif
</script>
</body>
</html>
