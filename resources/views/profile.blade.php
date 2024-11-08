<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @include('includes.bootstrap')
    {{-- @vite('resources/css/app.css') --}}
</head>

<body>
    <h1>PROFILE PAGE</h1>
    <a href="/" class="btn btn-primary">To Home Page</a>
    <!-- <img src="{{ asset('images/bootstrap.png') }}" alt=""> -->

    <form action="{{ route('create_data') }}" method="POST" class="ms-3" style="width: 500px;">
        <!-- TOKEN WAJIB UNTUK POST DI LARAVEL -->
        @csrf
        <div class="mb-3" class="w-50">
            <label for="" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Umur</label>
            <input type="text" name="umur" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Telp</label>
            <input type="text" name="telp" class="form-control">
        </div>
        <input type="submit" value="Masukan Data" class="btn btn-primary">
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">Umur</th>
                <th scope="col">Telp</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($anggota as $a)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $a->nama }}</td>
                <td>{{ $a->umur }}</td>
                <td>{{ $a->telp }}</td>
                <td>
                    <form action="{{ route('delete_data', $a->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <!-- <input type="text" name="id" value="{{ $a->id }}" hidden> -->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal{{ $a->id }}">
                            Edit
                        </button>
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>
                <!-- Modal -->
                <div class="modal fade" id="modal{{ $a->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('update_data', $a->id) }}" method="POST" class="ms-3" style="width: 500px;">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3" class="w-50">
                                        <label for="" class="form-label">Nama</label>
                                        <input type="text" name="nama" class="form-control" value="{{ $a->nama }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Umur</label>
                                        <input type="text" name="umur" class="form-control" value="{{ $a->umur }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Telp</label>
                                        <input type="text" name="telp" class="form-control" value="{{ $a->telp }}">
                                    </div>
                                    <input type="submit" value="Update Data" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script src="{{ asset('js/profileScript.js') }}"></script>
</body>

</html>