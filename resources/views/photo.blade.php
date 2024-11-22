<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @include('includes.bootstrap')
    @include('includes.jquery')

    {{-- @vite('resources/css/app.css') --}}
</head>

<body class="container-fluid">
    <h1>PHOTO PAGE</h1>

    <form action="{{ route('upload_photo') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Foto</label>
            <input type="text" name="image_name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Photo</label>
            <input type="file" name="image_input" class="form-control">
        </div>
        <input type="submit" value="Upload Photo" class="btn btn-primary">
    </form>
</body>

</html>