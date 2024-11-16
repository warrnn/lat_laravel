<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @include('includes.bootstrap')
    {{-- @vite('resources/css/app.css') --}}
</head>

<body class="py-5">
    @if(session()->has('success'))
    <script>
        alert("{{ session()->get('success') }}");
    </script>
    @endif
    @if(session()->has('error'))
    <script>
        alert("{{ session()->get('error') }}");
    </script>
    @endif

    <form action="{{ route('process_login') }}" method="POST" class="mx-5">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <input type="submit" value="Login" class="btn btn-primary">
    </form>

    <form action="{{ route('process_register') }}" method="POST" class="mx-5 mt-5">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Umur</label>
            <input type="number" class="form-control" name="umur" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Telp</label>
            <input type="phone" class="form-control" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <input type="submit" value="Register" class="btn btn-primary">
    </form>
</body>

</html>