{{-- detail laporan --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Masyarakat | PM</title>
    <link rel="stylesheet" href="{{ asset('css/petugas.css') }}">
    <script src="{{ asset('js/refresh.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
    
        {{-- <a href="{{ url('home') }}">Home</a>
        <a href="{{ url('about') }}">About</a>
        <a href="{{ url('login') }}">Login</a>
         --}}
         @include('layouts.navbar_petugas')
         <div class="container mt-3">
          <h2 style="text-shadow: 0px 1px 1.8px black;"> Welcome Admin</h2>
            <h2 style="text-shadow: 0px 1px 1.8px black;"> List Laporan Pengaduan</h2>
            <table class="table" style="margin-top:20px;">
              <tbody>
                @foreach ($masyarakat as $masyarakat)
                  <tr>
                    <td><img src="{{ asset("storage/image/default.png") }}" height="30px" width="30px">
                    </td>
                    <td>{{  $masyarakat->id }}</td>
                    <td>{{  $masyarakat->nik }}</td>
                    <td>{{  $masyarakat->nama }}</td>
                    <td>{{  $masyarakat->username }}</td>
                    <td>{{  $masyarakat->telp }}</td>
                    <td>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
</body>
</html>