<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Payment - Excellent Car Wash</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="assets/img/water.webp" rel="icon">
    <link href="assets/img/water.webp" rel="apple-touch-icon">

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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/payment.css" rel="stylesheet" />
    <link href="assets/css/main.css" rel="stylesheet">
    {{-- <script>
        const bookingSaveUrl = "{{ route('saveBookingAfterPayment') }}";  // Rendered URL will be assigned to this variable
    </script>
    <script src="assets/js/complete.js" defer></script> --}}

    <!-- Add CSS directly to the head section -->
    <style>
        /* Modal styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 20%;
            /* margin: 8%; */
            width: 100%;
            height: 100%;
            display: flex; /* Use flexbox for centering */
             align-items: center; /* Center vertically */
            justify-content: center; /* Center horizontally */
            /* Optional: Background with opacity */
            /* background-color: rgba(0, 0, 0, 0.5); Uncomment to enable background */
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto; /* Center the modal vertically and horizontally */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Default width */
            max-width: 600px; /* Max width for larger screens */
            text-align: center;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }

        ._failed {
            border-bottom: solid 4px red !important;
        }

        ._failed i {
            color: red !important;
        }

        ._success {
            box-shadow: 0 15px 25px #00000019;
            padding: 45px;
            width: 100%;
            text-align: center;
            margin: 40px auto;
            border-bottom: solid 4px #28a745;
        }

        ._success i {
            font-size: 55px;
            color: #28a745;
        }

        ._success h2 {
            margin-bottom: 12px;
            font-size: 2em; /* Responsive font size */
            font-weight: 500;
            line-height: 1.2;
            margin-top: 10px;
        }

        ._success p {
            margin-bottom: 0px;
            font-size: 1em; /* Responsive font size */
            color: #495057;
            font-weight: 500;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .modal-content {
                width: 90%; /* Make modal wider on smaller screens */
            }

            ._success h2 {
                font-size: 1.5em; /* Adjust heading size for smaller screens */
            }

            ._success p {
                font-size: 0.9em; /* Adjust paragraph size for smaller screens */
            }
        }

        @media (max-width: 576px) {
            .modal-content {
                width: 95%; /* Make modal wider on extra small screens */
            }

            ._success h2 {
                font-size: 1.2em; /* Further adjust heading size */
            }

            ._success p {
                font-size: 0.8em; /* Further adjust paragraph size */
            }
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

      <!-- Include Stripe.js -->
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

    <!-- The Modal -->
    <div id="payment-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="modal-message" class="_success">
                <i class="fa fa-check-circle" aria-hidden="true"></i>
                <h2>Your payment was successful</h2>
                <p>Thank you for your payment. We look <br>forward to see you soon.</p>
            </div>
        </div>
    </div>





    {{-- <script>
        const bookingSaveUrl = "{{ route('saveBookingAfterPayment') }}";  // Rendered URL will be assigned to this variable
    </script>
    <script src="assets/js/complete.js" defer></script> --}}

    <script>

    const stripe = Stripe("pk_test_51Q7OyPRxmKe0UKBMa1Wos3xUj27xr5au3B3lVBbYJmANhBhTktp75pzpldutg7G4kJVK1yl2dSrPsEJ5Bl6gnhKD00w5aEWmyF");

        // Function to open the modal and set it to auto-close after 15 seconds
        function openModal() {
            var modal = document.getElementById("payment-modal");
            modal.style.display = "block";

            // Close modal after 15 seconds and redirect to the index page
            setTimeout(function () {
                modal.style.display = "none";
                window.location.href = "/"; // Change this to your index page URL
            }, 5000); // 5000 milliseconds = 15 seconds
        }


        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal and redirect to the index page
        span.onclick = function () {
            var modal = document.getElementById("payment-modal");
            modal.style.display = "none";
            window.location.href = "/"; // Change this to your index page URL
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            var modal = document.getElementById("payment-modal");
            if (event.target == modal) {
                modal.style.display = "none";
                window.location.href = "/"; // Change this to your index page URL
            }
        }

       // Check payment status
        document.addEventListener("DOMContentLoaded", function() {
            // Retrieve the payment intent client secret from the URL
            const clientSecret = new URLSearchParams(window.location.search).get("payment_intent_client_secret");

            if (clientSecret) {
                checkPaymentStatus(clientSecret);
            } else {
                console.error("No client secret found in URL.");
            }
        });

        // Function to check payment status using Stripe's retrievePaymentIntent
        async function checkPaymentStatus(clientSecret) {
            try {
                // Retrieve the payment intent using the client secret
                const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);

                // Check if payment succeeded
                if (paymentIntent && paymentIntent.status === "succeeded") {
                    console.log("Payment was successful!");

                    // Trigger modal open
                    openModal();

                    // Optionally, save booking data after successful payment
                    saveBookingAfterPayment(paymentIntent.id);
                } else {
                    console.log("Payment is not successful yet. Status: " + paymentIntent.status);
                    // Handle other statuses like processing, requires_payment_method, etc.
                }
            } catch (error) {
                console.error("Error retrieving payment intent: ", error);
            }
        }

         // Function to save booking data to the backend
         async function saveBookingAfterPayment(paymentIntentId) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content; // Fetch CSRF token if needed

            const response = await fetch("{{ route('saveBookingAfterPayment') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken
                },
                body: JSON.stringify({ paymentIntentId: paymentIntentId })
            });

            if (response.ok) {
                console.log("Booking data saved successfully!");
            } else {
                console.error("Failed to save booking data.");
            }
        }

    </script>

</body>

</html>
