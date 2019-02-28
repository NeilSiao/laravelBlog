<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>{{  env('APP_NAME', 'laravel')  }}</title>
</head>
<body>
    <div class="container">
        <div class="center">
        <h2>Welcome to MixN, {{$user->name}}</h2>
        <br>
        Your registered email-id is {{$user->email}} , Please click on the below link to verify your email
        account
        <br>
        @extends('vendor.mail.html.button')
        </div>
    </div>
</body>
</html>