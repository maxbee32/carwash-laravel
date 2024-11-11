<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Booking - Excellent Car Wash</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="assets/img/water.webp" rel="icon">
    <link href="assets/img/water.webp" rel="apple-touch-icon">

    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Additional Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">

    <!-- CSS Files -->
    {{-- <link rel="stylesheet" href="assets/css/checkout.css" /> --}}

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/payment.css" rel="stylesheet" />
    <link href="assets/css/main.css" rel="stylesheet">
   <!-- stripe -->
   <script>
    const successUrl = "{{ route('success') }}";  // Rendered URL will be assigned to this variable
</script>
    <script src="assets/js/checkout.js" defer></script>

    <script src="https://js.stripe.com/v3/"></script>



</head>

<body class="portfolio-details-page">
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="{!! url('/'); !!}" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">Excellent<br>Car Wash</h1>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{!! url('/'); !!}" class="active">Home</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    <main class="main">
        <div class="page-title" data-aos="fade">
            <div class="container">
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="#">Home</a></li>
                        <li class="current">Payment</li>
                    </ol>
                </nav>
                <h1>Payment</h1>
            </div>
        </div>

        <div class="container p-0">
            <div class="card px-4">
                <p class="h8 py-3">Payment Details</p>


                {{-- <form id="payment-form" action="{{ route('checkout.createPayment') }}" method="POST" > --}}
                    {{-- @csrf --}}

                    {{-- <p class="text mb-1">Email </p>
                    <input class="form-control mb-3" id="email" type="email" name="email" placeholder="Enter email address" > --}}

                    <div class="stripe-container">
            {{ csrf_field() }}
            <form id="payment-form">
            <div id="payment-element">
            <!-- Stripe.js injects the Payment Element here-->
            </div>
            <button id="submit" class="btn btn-primary mb-3">
            <div class="spinner hidden" id="spinner"></div>
            <span id="button-text">Pay {{ Session::get('booking_data.total_amount') }}</span>
            </button>
            <div id="payment-message" class="hidden"></div>
            </form>
          </div>


          <!-- Modal Structure -->
    <div id="payment-modal" class="modal hidden">
        <div class="modal-content">
            <p id="payment-message"></p>
            <button id="close-modal">Close</button>
        </div>
    </div>


                <div id="dpm-annotation">
                    <p>
                      Payment methods are dynamically displayed based on customer location, and currency.&nbsp;
                      <a href="#" target="_blank" rel="noopener noreferrer" id="dpm-integration-checker">Preview payment methods by transaction</a>
                    </p>
                  </div>
            </div>
        </div>

    </main>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>
    <script src="assets/js/material-bootstrap-wizard.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>

</body>

</html>


