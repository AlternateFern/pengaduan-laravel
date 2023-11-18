<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home (Petugas) | PM</title>
    <link rel="stylesheet" href="{{ asset('css/petugas.css') }}">
    <script src="{{ asset('js/refresh.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
         @include('layouts.navbar_petugas')
         <div class="container mt-3">
              <h2 style="text-shadow: 0px 1px 1.8px black;"> Welcome,</h2>
                  <div class="profile-container">
                      <div class="pfp-container">
                          <img src="{{ $petugas->foto_profil ? asset('storage/' . $petugas->foto_profil) : asset('storage/image/default.jpg') }}" class="pfp" alt="Profile Picture" width="150px" height="150px">
                      </div>
                    <h2 style="text-shadow: 0px 1px 1.8px black;">{{ $petugas->username }}</h2>
                    <form action="{{ route('petugas.uploadFotoprofil') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="file" name="foto_profil" accept=".png, .jpg, .jpeg" />
                      <button type="submit">Upload PFP</button>
                  </form>
                <p>pls end this, i hate doing this all day</p>
              </div>
              <a href="../petugas/home" class="btn btn-sm ml-auto btn-outline-info" style="padding: 4px 13px;">Kembali</a>
          </div>
</body>
</html>