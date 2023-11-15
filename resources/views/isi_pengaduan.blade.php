<!DOCTYPE html>
<html lang="en">

<head>
  <title>Isi Pengaduan | PM</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('css/masyarakat.css') }}">
  <script src="{{ asset('js/refresh.js') }}"></script>
</head>

<body>
  @include('layouts.navbar')
  <div class="container mt-5">
    <div class="mb-3">
      <form action="isi_pengaduan" method="POST" enctype="multipart/form-data">
        @method("POST")
        @csrf

        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Isi Laporan Anda</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi_laporan"></textarea>
          @error('isi_laporan')
            <div> {{ $message }}</div>
          @enderror
        </div>
        <label for="exampleFormControlTextarea1" class="form-label">Bukti berbentuk File Gambar atau Video</label>
        <div class="input-group mb-3">
          <input type="file" class="form-control" id="inputGroupFile02" name="foto">
        </div>
        <button type="submit" class="btn btn-success ml-auto">Kirim</button>
        <a href="{{ url('home') }}" class="btn btn-warning ml-auto" style="margin-left: 7px;">Kembali</a>
      </form>
    </div>
</body>

</html>