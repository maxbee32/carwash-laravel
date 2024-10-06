<!DOCTYPE html>
<html lang="en">


<head>
    <title>Booking Confirmation</title>
</head>

<body>
    <h1>Booking Confirmation</h1>
    <p>Thank you for booking with us, {{ $bookingData['name'] }}.</p>

    <h2>Booking Details:</h2>
    <ul>
        <li>Reference #: {{ $bookingData['ticket'] }}</li>
        <li>Vehicle: {{ $bookingData['vehicle'] }}</li>
        <li>Pricing Plan: {{ $bookingData['total_amount'] }}</li>
        <li>Date: {{ $bookingData['date'] }}</li>
        <li>Time: {{ $bookingData['time'] }}</li>
        <li>Email: {{ $bookingData['email'] }}</li>
        <li>Phone: {{ $bookingData['phone_number'] }}</li>
    </ul>


</body>

</html>
