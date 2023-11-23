<!DOCTYPE html>
<html>
<head>
    <title>Contact Details</title>
</head>
<body>
    <h2>Hey, It's me {{ $data->name }}</h2> 
    <br>
    <strong>User details: </strong><br>
    <strong>Name: </strong>{{ $data->name }} <br>
    <strong>Phone: </strong>{{ $data->phone }} <br>
    <strong>Subject: </strong>{{ $data->subject }} <br>
    <strong>Message: </strong>{{ $data->message }} <br><br>
    <p>Thank you</p>
</body>

</html>