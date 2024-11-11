<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Excellent Car Wash</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/water.webp" rel="icon">
  <link href="assets/img/water.webp" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css">
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"> --}}


  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

  <link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet" />

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/demo.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />


</head>

<body class="portfolio-details-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{!! url('/'); !!}" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">Excellent<br> Car Wash</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{!! url('/'); !!}" class="active">Home</a></li>


        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    <div class="page-title" data-aos="fade">
        <div class="container">
          <nav class="breadcrumbs">
            <ol>
              <li><a href="">Home</a></li>
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
                        <form action="{{ route('save-book') }}" method="POST">
                            @csrf

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
                                    <li><a href="#facilities" data-toggle="tab">Booking Date</a></li>
                                    <li><a href="#description" data-toggle="tab">Driver Details</a></li>
                                    <li><a href="#booking" data-toggle="tab">Booking Details</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                                  @endforeach
                                   </ul>
                                  </div>
                                   @endif
                                 {{-- start vehicle tab --}}

                                <div class="tab-pane" id="type">
                                    <h4 class="info-text">Choose Your Car</h4>
                                    <div class="row">
                                        <div class="col-sm-10 col-sm-offset-1">
                                            {{-- @if($vehicles->isNotEmpty()) --}}
                                            @foreach($vehicles as $vehicle)
                                            <div class="col-sm-3 ">
                                                <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Select this option if your vehicle is {{ $vehicle->title }}">
                                                    <input required type="radio" name="vehicle" value="{{ $vehicle->title }}"
                                                  {{ session('vehicle') == $vehicle->title ? 'checked' : '' }}   >
                                                    <div class="icon">
                                                        <img src="{{ Storage::url($vehicle->icon) }}" alt="{{ $vehicle->title }} icon" style="width: 95px; height: 100px;">
                                                    </div>
                                                    <h6>{{ $vehicle->title }}</h6>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                {{-- end vehicle tab --}}

                <div class="tab-pane" id="location">
                    <div class="row">
                        <h4 class="info-text">Choose Plan</h4>
                        <div class="container">
                            <div class="row">
                                <div class="row row-cols-3 g-3">
                                    @foreach($services as $description => $groupedServices)
                                        <div class="col-lg-4">
                                            @php
                                                // Get the first service to access the price
                                                $firstService = $groupedServices->first();
                                            @endphp
                                            <div class="card-body">
                                                <!-- Radio button for selecting plan -->
                                                <input type="radio"  name="total_amount" id="control_{{ $loop->index }}" value="{{ $firstService->price }}"
                                                {{ session('total_amount') == $firstService->price ? 'checked' : ''  }} required>
                                                <label for="control_{{ $loop->index }}">
                                                    <!-- Plan description -->
                                                    <h5 class="card-title text-muted text-uppercase text-center">{{ $description }}</h5>
                                                    <!-- Plan price -->
                                                    <h6 class="card-price text-center">£{{ $firstService->price }}<span class="period"></span></h6>
                                                    <hr>
                                                    <!-- Services under the plan -->
                                                    <ul class="fa-ul">
                                                        @foreach($groupedServices as $service)
                                                            <li><i class="bi bi-check"></i> <span>{{ $service->service }}</span></li>
                                                        @endforeach
                                                    </ul>
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

     <div class="tab-pane" id="facilities">
        <h4 class="info-text">Select Your Booking Date and Time. </h4>
        <div class="container-fluid px-0 px-sm-4 mx-auto">
            <div class="row justify-content-center mx-0">
                <div class="col-lg-10">
                    <div class="card border-0">

                        <div class="container-fluid">
                            <div class="row">
                              <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                <div class="content">

                                  <div class="form-group">
                                    {{-- <label>Date</label> --}}
                                    <div class="input-group date" id="datepicker">
                                      {{-- <input name="date" class="form-control" placeholder="MM/DD/YYYY"/><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar"></i></span></span> --}}
                                      <input name="date" type="date" class="form-control" placeholder="Select Date (YYYY/MM/DD)" required />
                                      <small class="form-text text-muted">Please select date (MM/DD/YYYY) format.</small>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    {{-- <label>Time</label> --}}
                                    <div class="input-group time" id="timepicker">
                                        <input name="time"  type='time' class="form-control" aria-label="Select time" placeholder="Select Time (HH:MM AM/PM)" required />
                                        <small class="form-text text-muted">Please enter time in HH:MM format.</small>
                                      {{-- <input name="time" type="time" class="form-control" placeholder="HH:MM AM/PM"/> --}}
                                      {{-- <span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span> --}}
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

    <div class="tab-pane" id="description">
        <div class="row">
            <h4 class="info-text">Enter your details.</h4>
            <div class="col-sm-6 col-sm-offset-1">
                <div class="form-group label-floating">
                    {{-- <label class="control-label">First Name</label> --}}
                    <input type="text" class="form-control" name="name" placeholder="Enter fullname" required>
                </div>
                <div class="form-group label-floating">
                    {{-- <label class="control-label">Email</label> --}}
                    <input type="email" class="form-control" placeholder="Enter email" name="email" required>
                </div>
                <div class="form-group label-floating">
                    {{-- <label class="control-label">Phone Number</label> --}}
                    <input type="tel" class="form-control" placeholder="Enter phone number" name="phone_number" required>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group label-floating">
                    {{-- <label class="control-label">Postcode</label> --}}
                    <input type="text" class="form-control" placeholder="Enter postcode" name="postcode" required>
                </div>
                <div class="form-group label-floating">
                    {{-- <label class="control-label">Address</label> --}}
                    <input type="text" class="form-control"  placeholder="Enter address" name="address" required >
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
                    <div class="col-sm-4 d-flex align-items-center">
                        <small class="form-text text-muted">Vehicle Type</small>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext" id="VehicleType" value="{{Session::get('booking_data.vehicle') }}">

                    </div>
                </div>


                <div class="mb-3 row">
                    {{-- <label for="pricingPlan" class="col-sm-4 col-form-label">Pricing Plan</label> --}}
                    <div class="col-sm-4 d-flex align-items-center">
                        <small class="form-text text-muted">Pricing Plan</small>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext" id="pricingPlan" value="{{ Session::get('booking_data.total_amount') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    {{-- <label for="bookingDate" class="col-sm-4 col-form-label">Booking Date</label> --}}
                    <div class="col-sm-4 d-flex align-items-center">
                        <small class="form-text text-muted">Booking Date</small>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext" id="bookingDate" value="{{ Session::get('booking_data.date') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    {{-- <label for="bookingTime" class="col-sm-4 col-form-label">Booking Time</label> --}}
                    <div class="col-sm-4 d-flex align-items-center">
                        <small class="form-text text-muted">Booking Time</small>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext" id="bookingTime" value="{{ Session::get('booking_data.time') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Right side -->
                <div class="mb-3 row">
                    {{-- <label for="FullName" class="col-sm-4 col-form-label">Full Name</label> --}}
                    <div class="col-sm-4 d-flex align-items-center">
                        <small class="form-text text-muted">Full Name</small>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext" id="FullName" value="{{ Session::get('booking_data.name') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    {{-- <label for="email" class="col-sm-4 col-form-label">Email</label> --}}
                    <div class="col-sm-4 d-flex align-items-center">
                        <small class="form-text text-muted">Email</small>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext" id="email" value="{{ Session::get('booking_data.email') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    {{-- <label for="postcode" class="col-sm-4 col-form-label">Postcode</label> --}}
                    <div class="col-sm-4 d-flex align-items-center">
                        <small class="form-text text-muted">Postcode</small>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext" id="postcode" value="{{ Session::get('booking_data.postcode') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    {{-- <label for="address" class="col-sm-4 col-form-label">Address</label> --}}
                    <div class="col-sm-4 d-flex align-items-center">
                        <small class="form-text text-muted">Address</small>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext" id="address" value="{{ Session::get('booking_data.address') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    {{-- <label for="phoneNumber" class="col-sm-4 col-form-label">Phone Number</label> --}}
                    <div class="col-sm-4 d-flex align-items-center">
                        <small class="form-text text-muted">Phone Number</small>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext" id="phoneNumber" value="{{ Session::get('booking_data.phone_number') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="wizard-footer">
        <div class="pull-right">
<input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Next' />
{{-- <button type="submit" class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Next'>Next </button> --}}
{{-- @endif --}}
            {{-- <input type='button' class='btn btn-finish btn-fill btn-primary btn-wd' name='finish' id='finishBtn' value='Finish' /> --}}
       <button type="submit" class='btn btn-finish btn-fill btn-primary btn-wd' name='finish' id='finishBtn' value='Finish'>Finish </button>
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

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>


   <!-- Vendor JS Files -->
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


  <script>
    $(document).ready(function() {
        // Function to update session data via AJAX
        function updateSessionData() {
            var data = {
                vehicle: $("input[name='vehicle']:checked").val(),
                total_amount: $("input[name='total_amount']:checked").val(),
                date: $("input[name='date']").val(),
                time: $("input[name='time']").val(),
                name: $("input[name='name']").val(),
                email: $("input[name='email']").val(),
                phone_number: $("input[name='phone_number']").val(),
                postcode: $("input[name='postcode']").val(),
                address: $("input[name='address']").val(),
            };

            $.ajax({
                url: "{{ route('store-session-data') }}", // Adjust route as necessary
                method: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if(response.success) {
                         // Update session data on the page without reloading
                    $('#VehicleType').val(response.data.vehicle);
                    $('#pricingPlan').val(response.data.total_amount);
                    $('#bookingDate').val(response.data.date);
                    $('#bookingTime').val(response.data.time);
                    $('#FullName').val(response.data.name);
                    $('#email').val(response.data.email);
                    $('#address').val(response.data.address);
                    $('#postcode').val(response.data.postcode);
                    $('#phoneNumber').val(response.data.phone_number);

                    }
                }
            });
        }

        // Attach event listeners to input fields to trigger the session update
        $("input[name='vehicle'], input[name='total_amount'], input[name='date'], input[name='time'], input[name='name'], input[name='email'], input[name='phone_number'], input[name='postcode'], input[name='address']").on('change keyup', function() {
            updateSessionData();
        });
    });
  </script>
</body>

</html>
