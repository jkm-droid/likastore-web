<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Lika Store - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="/"><strong>Lika</strong> Store</a></h1>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="getstarted " href="https://play.google.com/store/apps/details?id=jkmdroid.likastore" target="_blank" >Get Started</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header>

<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-9 text-center">
                <h1>Welcome to <strong>Lika</strong> Store</h1>
                <h2>We the best in liquor delivery</h2>
            </div>
        </div>
        <div class="text-center">
            <a href="https://play.google.com/store/apps/details?id=jkmdroid.likastore" class="btn-get-started" target="_blank">Download Lika Store App</a>
        </div>

{{--        <div class="row icon-boxes">--}}
{{--            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">--}}
{{--                <div class="icon-box">--}}
{{--                    <div class="icon"><i class="ri-stack-line"></i></div>--}}
{{--                    <h4 class="title"><a href="">Android Development</a></h4>--}}
{{--                    <p class="description">Get unique and beautiful android apps created using a simplified and accelerated development process.</p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">--}}
{{--                <div class="icon-box">--}}
{{--                    <div class="icon"><i class="ri-palette-line"></i></div>--}}
{{--                    <h4 class="title"><a href="">Web Scraping</a></h4>--}}
{{--                    <p class="description">Get organized and cleaned from your target web URL scraped with with Python and Beautiful Soup.</p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">--}}
{{--                <div class="icon-box">--}}
{{--                    <div class="icon"><i class="ri-command-line"></i></div>--}}
{{--                    <h4 class="title"><a href="">Django Development</a></h4>--}}
{{--                    <p class="description">Get unique and beautiful web apps developed through django rapid development,clean and pragmatic design.</p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="500">--}}
{{--                <div class="icon-box">--}}
{{--                    <div class="icon"><i class="ri-fingerprint-line"></i></div>--}}
{{--                    <h4 class="title"><a href="">Website Maintenance</a></h4>--}}
{{--                    <p class="description">Keep your website well maintained and attractive through our rapid maintenace and elegance process. </p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
    </div>
</section>

<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3><strong>Lika</strong>Store</h3>
                    <p>
                        Gatundu Road <br>
                        Juja<br>
                        Kenya <br><br>
                        <strong>Phone:</strong> +254-738-801-655<br>
                        <strong>Email:</strong> likastore@gmail.com<br>
                    </p>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Join Our Newsletter</h4>
                    <p>Get the latest updates from our team</p>
                    @if ($message = Session::get('success'))
                        <p class="text-success">{{ $message }}</p>
                    @endif
                    <form action="{{ route('newsletter.subscribe') }}" method="post">
                        @csrf
                        <input type="email" id="email" name="email" placeholder="enter email">
                        @if ($errors->has('email'))
                            <div class="text-danger form-text">{{ $errors->first('email') }}</div>
                        @endif
                        <input type="submit" id="submit_email" value="Subscribe">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>Lika Store</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Developed by <b>Oak & Teak technologies</b>
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
    </div>
</footer><!-- End Footer -->
<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/purecounter/purecounter.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
{{--<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>--}}
{{--<script type="text/javascript">--}}
{{--    function subscribe(){--}}
{{--        $(document).on('click', '#subscribe_button', function (e) {--}}
{{--            e.preventDefault();--}}

{{--            var email = $('#email').val();--}}

{{--            if (email === '') {--}}
{{--                alert("email cannot be empty")--}}
{{--            }else{--}}
{{--                $.ajax({--}}
{{--                    url: '{{ url('newsletter/subscribe') }}',--}}
{{--                    type: 'POST',--}}
{{--                    data: {--}}
{{--                        "_token": "{{ csrf_token() }}",--}}
{{--                        'email': email,--}}
{{--                    },--}}
{{--                    success: function (response) {--}}

{{--                    },--}}

{{--                    failure: function (response) {--}}
{{--                        console.log("something went wrong");--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--        });--}}
{{--    }--}}
{{--</script>--}}
</body>

</html>
