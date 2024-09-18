{{-- <h2>Hello, It's me {{ $data->name }}</h2>
<br>

<strong>User details: </strong><br>
<strong>Name: </strong>{{ $data->name }} <br>
<strong>Email: </strong>{{ $data->email }} <br>
<strong>Subject: </strong>{{ $data->subject }} <br>
<strong>Message: </strong>{{ $data->message }} <br><br>

Thank you --}}


<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
</head>
<body>
    <p>Name:  {{ $data['name'] }}</p>
    <p>Email: {{ $data['email']  }}</p>
    <p>Subject: {{ $data['subject'] }}</p>
    <p>Message: {{ $data['message']}}</p>


    <br>
    Thank you
</body>
</html>
