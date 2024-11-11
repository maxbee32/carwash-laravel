<!DOCTYPE html>
<html>
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

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <style type="text/css">
        #card-element{
            height: 50px;
            padding-top: 16px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mt-5">
                <h3 class="card-header p-3">Laravel 11 Stripe Payment Gateway Integration Example - ItSolutionStuff.com</h3>
                <div class="card-body">

                    @session('success')
                        <div class="alert alert-success" role="alert">
                            {{ $value }}
                        </div>
                    @endsession

                    <form id='checkout-form' method='post' action="{{ route('stripe.post') }}">
                        @csrf

                        <strong>Name:</strong>
                        <input type="input" class="form-control" name="name" placeholder="Enter Name">

                        <input type='hidden' name='stripeToken' id='stripe-token-id'>
                        <br>
                        <div id="card-element" class="form-control" ></div>
                        <button
                            id='pay-btn'
                            class="btn btn-success mt-3"
                            type="button"
                            style="margin-top: 20px; width: 100%;padding: 7px;"
                            onclick="createToken()">PAY $10
                        </button>
                    <form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">

    var stripe = Stripe('pk_test_51Q7OyPRxmKe0UKBMa1Wos3xUj27xr5au3B3lVBbYJmANhBhTktp75pzpldutg7G4kJVK1yl2dSrPsEJ5Bl6gnhKD00w5aEWmyF')
    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');

    /*------------------------------------------
    --------------------------------------------
    Create Token Code
    --------------------------------------------
    --------------------------------------------*/
    function createToken() {
        document.getElementById("pay-btn").disabled = true;
        stripe.createToken(cardElement).then(function(result) {

            if(typeof result.error != 'undefined') {
                document.getElementById("pay-btn").disabled = false;
                alert(result.error.message);
            }

            /* creating token success */
            if(typeof result.token != 'undefined') {
                document.getElementById("stripe-token-id").value = result.token.id;
                document.getElementById('checkout-form').submit();
            }
        });
    }
</script>

</html>
