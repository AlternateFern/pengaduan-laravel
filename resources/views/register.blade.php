<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Pengaduan Masyarakat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <div class="container">
        <h1>Register</h1>
        <h3>Selamat datang!</h3>
        @if(session("error"))
        <h5 class="alert alert-danger text-center">{{session("error")}}</h5>
        @endif
        <form class="p-3 mt-3" action="{{url('register')}}" method="POST" enctype="multipart/form-data">
            @method("POST")
            @csrf
            <div class="form-group">
                <div class="form-inline">
                <input type="text" class="form-control" name="nik" id="nik" placeholder="Nomor Induk Keluarga" required>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" style="margin-left: 40px; width: 49.3%;" required>
                </div>
                <div class="bar bar-anim"></div>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" required>
                <div class="bar"></div>
                <input type="text" class="form-control" name="telp" id="telp" placeholder="Nomor Telpon" required>
                <div class="bar"></div>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                <div class="bar"></div>
                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Konfirmasi Password" required>
                <div class="bar"></div>
                <button type="submit" name="" class="btn mt-3 btn-block btn-grad" style="color:white;font-weight:bold;">Register</button>

            </div>
        </form>
        <div class="text-center">
            <a href="{{url('login')}}">Sudah Memiliki Akun?</a>
        </div>
    </div>
    </div>

</body>

</html>