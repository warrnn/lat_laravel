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
    <a href="{{ route('photo_page') }}" class="btn btn-primary">To Photo Page</a>
    <a href="{{ route('logout') }}" class="btn btn-danger">Log Out</a>

    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">Nama Foto</th>
                <th scope="col">Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($photos as $p)
            <tr>
                <td>{{ $p->nama }}</td>
                <td>
                    <img src="{{ asset('storage/' . $p->path_photo) }}" alt="" style="width: 200px;">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>