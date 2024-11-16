<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @include('includes.bootstrap')

    <link rel="stylesheet" href="{{ asset('css/welcomeStyles.css') }}">
</head>
<body>
    <h1>HOME PAGE</h1>
    <h1>Hello, {{ session()->get('anggota')->nama }}</h1>
    <a href="{{ route('read_data_to_profile') }}" class="btn btn-primary">To Profile Page</a>
    <a href="{{ route('logout') }}" class="btn btn-danger">Log Out</a>
</body>
</html>