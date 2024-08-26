<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Booking - Excellent Car Wash</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/water.webp" rel="icon">
  <link href="assets/img/water.webp" rel="apple-touch-icon">


  {{-- <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
    --}}
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
{{-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css'> --}}
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css'>


	
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />


	<!-- CSS Files -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/css/demo.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">


</head>

<body class="portfolio-details-page" >

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="#" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">Excellent<br> Car Wash</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#" class="active">Home</a></li>
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
            <li class="current">Booking</li>
          </ol>
        </nav>
        <h1>Booking</h1>
      </div>
    </div>

    <div class="container ">

        <div class="row">
            <div class="col-sm-12 col-md-offset-0">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="purple" id="wizard">
                        <form action="" method="">

                            <div class="wizard-header">
                                <h3 class="wizard-title">
                                    Online Booking
                                </h3>
                                <h5>This information will let us know more about your vehicle.</h5>
                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#type" data-toggle="tab">Vehicle Type</a></li>
                                    <li><a href="#location" data-toggle="tab">Pricing Plan</a></li>
                                    {{-- <li><a href="#type" data-toggle="tab">Type</a></li> --}}
                                    <li><a href="#facilities" data-toggle="tab">Booking Date</a></li>
                                    <li><a href="#description" data-toggle="tab">Driver Details</a></li>
                                    <li><a href="#booking" data-toggle="tab">Booking Details</a></li>
                                </ul>
                            </div>

                            <div class="tab-content">

                                <div class="tab-pane" id="type">
                                    <h4 class="info-text">Choose Your Car</h4>
                                    <div class="row">
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="col-sm-3 ">
                                                <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Select this option if your vehicle is microbus.">
                                                    <input type="radio" name="type" value="Microbus">

                                                    <div class="icon">
                                                        <img src="https://img.icons8.com/?size=90&id=COfeCP0ZqQKk&format=png&color=000000" alt="Microbus icon">
                                                    </div>
                                                    <h6>Microbus</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Select this option if your vehicle is minivan car">
                                                    <input type="radio" name="type" value="Minivan Car">


                                                    <div class="icon">
                                                        <img src="https://img.icons8.com/?size=90&id=xJvPMHT3yQhQ&format=png&color=000000" alt="Microbus icon">
                                                    </div>
                                                    <h6>Minivan Car</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Select this option if your vehicle is sedan car">
                                                    <input type="radio" name="type" value="Sedan Car">

                                                    <div class="icon">
                                                        <img src="https://img.icons8.com/?size=90&id=rtsQcWLB311a&format=png&color=000000" alt="Microbus icon">
                                                    </div>

                                                    <h6>Sedan Car</h6>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Select this option if your vehicle is suv car">
                                                    <input type="radio" name="type" value="Suv Car">

                                                    <div class="icon">
                                                        <img src="https://img.icons8.com/?size=100&id=21702&format=png&color=000000" alt="Microbus icon">
                                                    </div>
                                                    <h6>SUV Car</h6>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="location">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="info-text"> Choose Plan</h4>
                                        </div>
                                        <section class="pricing py-5">
                                          <div class="container">
                                            <div class="row">

                                                <div class="row row-cols-3 g-3">
                                                    <div class="col-lg-4">
                                                        <div class="card mb-5 mb-lg-0">
                                                          <div class="card-body">
                                                            <h5 class="card-title text-muted text-uppercase text-center">Basic Washing</h5>
                                                            <h6 class="card-price text-center">£60<span class="period"></span></h6>
                                                            <hr>
                                                            <ul class="fa-ul">
                                                                <li><i class="bi bi-check"></i></span>Single User</li>
                                                                <li><i class="bi bi-check"></i></span>5GB Storage</li>
                                                                <li><i class="bi bi-check"></i></span>Unlimited Public Projects</li>
                                                                <li><i class="bi bi-check"></i></i></span>Community Access</li>
                                                                <li><i class="bi bi-check"></i></span>Unlimited
                                                                Private Projects</li>
                                                              <li><i class="bi bi-check"></i></span>Dedicated
                                                                Phone Support</li>
                                                                <li><i class="bi bi-check"></i></span>Free Subdomain
                                                              </li>
                                                              <li><i class="bi bi-check"></i></span>Monthly Status
                                                                Reports</li>
                                                            </ul>
                                                            <div class="d-grid">
                                                              <a href="#" class="btn btn-primary text-uppercase">Select</a>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>

  <div class="col-lg-4">
    <div class="card mb-5 mb-lg-0">
      <div class="card-body">
        <h5 class="card-title text-muted text-uppercase text-center">Express Washing</h5>
        <h6 class="card-price text-center">£80</h6>
        <hr>
        <ul class="fa-ul">
          <li><i class="bi bi-check"></i></span><strong>5 Users</strong></li>
          <li><i class="bi bi-check"></i></span>50GB Storage</li>
          <li><i class="bi bi-check"></i></span>Unlimited Public Projects</li>
          <li><i class="bi bi-check"></i></span>Community Access</li>
          <li><i class="bi bi-check"></i></span>Unlimited Private Projects</li>
          <li><i class="bi bi-check"></i></span>Dedicated Phone Support</li>
          <li><i class="bi bi-check"></i></span>Free Subdomain</li>
          <li><i class="bi bi-check"></i></span>Monthly Status
            Reports</li>
        </ul>
        <div class="d-grid">
          <a href="#" class="btn btn-primary text-uppercase">Select</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="card mb-5 mb-lg-0">
      <div class="card-body">
        <h5 class="card-title text-muted text-uppercase text-center">Advanced Washing</h5>
        <h6 class="card-price text-center">£99</h6>
        <hr>
        <ul class="fa-ul">
          <li><i class="bi bi-check"></i></span><strong>5 Users</strong></li>
          <li><i class="bi bi-check"></i></span>50GB Storage</li>
          <li><i class="bi bi-check"></i></span>Unlimited Public Projects</li>
          <li><i class="bi bi-check"></i></span>Community Access</li>
          <li><i class="bi bi-check"></i></span>Unlimited Private Projects</li>
          <li><i class="bi bi-check"></i></span>Dedicated Phone Support</li>
          <li><i class="bi bi-check"></i></span>Free Subdomain</li>
          <li><i class="bi bi-check"></i></span>Monthly Status
            Reports</li>
        </ul>
        <div class="d-grid">
          <a href="#" class="btn btn-primary text-uppercase">Select</a>
        </div>
      </div>
    </div>
  </div>

</div>


  </div>

 </div>
</div>

 </div>
     </section>


     <div class="tab-pane" id="facilities">
        <h4 class="info-text">Select Your Booking Appointment Date. </h4>
        <div class="container-fluid px-0 px-sm-4 mx-auto">
            <div class="row justify-content-center mx-0">
                <div class="col-lg-10">
                    <div class="card border-0">

                        <div class="container-fluid">
                            <div class="row">
                              <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                <div class="content">

                                  <div class="form-group">
                                    <label>Date</label>
                                    <div class="input-group date" id="datepicker">
                                      <input class="form-control" placeholder="MM/DD/YYYY"/><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar"></i></span></span>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Time</label>
                                    <div class="input-group time" id="timepicker">
                                      <input class="form-control" placeholder="HH:MM AM/PM"/><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


                                {{-- <div class="tab-pane" id="description">
                                    <div class="row">
                                        <h4 class="info-text"> Enter your details. </h4>
                                        <div class="col-sm-6 col-sm-offset-1">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Place description</label>
                                                <textarea class="form-control" placeholder="" rows="9"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Example</label>
                                                <p class="description">"The place is really nice. We use it every sunday when we go fishing. It is so awesome."</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="tab-pane" id="description">
                                <div class="row">
                                    <h4 class="info-text">Enter your details.</h4>
                                    <div class="col-sm-6 col-sm-offset-1">
                                        <div class="form-group label-floating">
                                            <label class="control-label">First Name</label>
                                            <input type="text" class="form-control" name="firstname" required>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Email</label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Phone Number</label>
                                            <input type="tel" class="form-control" name="phonenumber" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Postcode</label>
                                            <input type="text" class="form-control" name="postcode" required>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Address</label>
                                            <input type="text" class="form-control" name="address"  required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="booking">
                                <!-- Booking Details Tab Content -->
                                <h4 class="info-text">Booking Details</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Left side -->
                                        <div class="mb-3 row">
                                            <label for="vehicleType" class="col-sm-4 col-form-label">Vehicle Type</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control-plaintext" id="vehicleType" value="Selected Vehicle Type">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="pricingPrice" class="col-sm-4 col-form-label">Pricing Price</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control-plaintext" id="pricingPrice" value="Selected Pricing Plan">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="bookingDate" class="col-sm-4 col-form-label">Booking Date</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control-plaintext" id="bookingDate" value="Selected Booking Date">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="bookingTime" class="col-sm-4 col-form-label">Booking Time</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control-plaintext" id="bookingTime" value="Selected Booking Time">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Right side -->
                                        <div class="mb-3 row">
                                            <label for="FullName" class="col-sm-4 col-form-label">Full Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control-plaintext" id="FullName" value="Entered Full Name">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control-plaintext" id="email" value="Entered Email">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="postcode" class="col-sm-4 col-form-label">Postcode</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control-plaintext" id="postcode" value="Entered Postcode">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="address" class="col-sm-4 col-form-label">Address</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control-plaintext" id="address" value="Entered Address">
                                            </div>
                                        </div>
                                        {{-- <div class="mb-3 row">
                                            <label for="phoneNumber" class="col-sm-4 col-form-label">Phone Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control-plaintext" id="phoneNumber" value="Entered Phone Number">
                                            </div>
                                        </div> --}}
                                        <div class="mb-3 row">
                                            <label for="totalAmount" class="col-sm-4 col-form-label">Total Amount</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control-plaintext" id="totalAmount" value="Entered Phone Number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="wizard-footer">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Next' />
                                    <input type='button' class='btn btn-finish btn-fill btn-primary btn-wd' name='finish' id='finishBtn' value='Finish' />
                                </div>
                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div> <!-- wizard container -->
            </div>
        </div> <!-- row -->
    </div> <!--  big container -->

  </main>

  {{-- <footer id="footer" class="footer">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="#" class="d-flex align-items-center">
            <span class="sitename">Excellent Car Wash</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street, New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
        </div>

        <div class="col-lg-4 col-md-12 footer-links">
          <h4>Follow Us</h4>
          <p>Stay connected with us on social media</p>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>

    {{-- <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Excellent Car Wash</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div> --}}
  {{-- </footer>  --}}

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

  {{-- <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
  {{-- <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script> --}}
  {{-- <script>
    $(document).ready(function() {
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        startDate: '0d'
    });
    $('.cell').click(function() {
        $('.cell').removeClass('select');
        $(this).addClass('select');
    });
}); --}}

{{-- <script src="assets/js/n.js"></script> --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Assuming you have jQuery included for simplicity
        $('#finishBtn').on('click', function() {
            // Redirect to payment page
            window.location.href = '/payment'; // Replace with your payment page URL

            // Prepare data to send to the server (optional)
            // var bookingData = {
            //     vehicleType: $('#vehicleType').val(),
            //     pricingPrice: $('#pricingPrice').val(),
            //     bookingDate: $('#bookingDate').val(),
            //     bookingTime: $('#bookingTime').val(),
            //     FullName: $('#FullName').val(),
            //     email: $('#email').val(),
            //     postcode: $('#postcode').val(),
            //     address: $('#address').val(),
            //     phoneNumber: $('#phoneNumber').val()
            // };

            // // Send data to backend (optional, using Ajax)
            // $.ajax({
            //     url: 'save_booking.php', // Replace with your backend endpoint URL
            //     type: 'POST',
            //     data: bookingData,
            //     success: function(response) {
            //         console.log('Booking details saved successfully');
            //     },
            //     error: function(xhr, status, error) {
            //         console.error('Error saving booking details:', error);
            //     }
            // });
        });
    });
</script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js'></script>
<script src="assets/js/n.js"></script>
{{-- </script> --}}
  <script src="assets/js/main.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>


  <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="assets/js/material-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="assets/js/jquery.validate.min.js"></script>








</body>

</html>
