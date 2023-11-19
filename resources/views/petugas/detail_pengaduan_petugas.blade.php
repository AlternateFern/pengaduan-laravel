<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail ({{ $petugas->level }}) | PM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/petugas.css') }}">
    <script src="{{ asset('js/refresh.js') }}"></script>
</head>

<body>
    @include ('layouts.navbar_petugas')
    <div class="container">
        @foreach ($pengaduan as $pengaduan)
            <div class="mb-3">
                <form action="" method="POST" enctype="multipart/form-data" class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label mt-3">Bukti Gambar / Video</label>
                    <div class="input-group">
                        <img src="{{ asset("storage/image/$pengaduan->foto") }}" style="width:auto;height:200px; margin-bottom:20px;">
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlTextarea1" class="form-label">Isi Laporan :</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi_laporan" disabled>{{  $pengaduan->isi_laporan }}</textarea>
                    </div>
                </form>
                
                <a href="../tanggapan_pengaduan/{{$pengaduan->id_pengaduan}}" class="btn btn-sm btn-success ml-auto" style="padding: 4px 20px; margin-right: 3px;">Respon</a>
                <a href="../hapus_pengaduan/{{$pengaduan->id_pengaduan}}" class="btn btn-sm btn-danger ml-auto" style="padding: 4px 13px;" onclick="return confirm('Konfirmasi Penghapusan Data?')">Hapus</a>
                <br> <br>
            @endforeach
            <a href="../home" class="btn btn-sm ml-auto btn-outline-info" style="padding: 4px 13px;">Kembali</a>
            </div>
        </div>

</body>
</html>