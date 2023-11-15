<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengaduan | PM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/masyarakat.css') }}">
    <script src="{{ asset('js/refresh.js') }}"></script>
</head>

<body>
    @include ('layouts.navbar')
    <div class="container">
            <div class="mb-3">
                <form action="{{url("/update_pengaduan/$pengaduan->id_pengaduan")}}" method="POST" enctype="multipart/form-data" class="mb-3">
                    @method('POST')
                    @csrf
                    <div class="mb-1">
                        <label for="exampleFormControlTextarea1" class="form-label">Isi Laporan </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi_laporan">{{  $pengaduan->isi_laporan }}</textarea>
                    </div>
                    <label for="exampleFormControlTextarea1" class="form-label">Bukti File</label>
                    <div class="input-group mb-3">
                        <img src="{{ asset("storage/image/$pengaduan->foto") }}" style="width:auto;height:200px; margin-bottom:20px;">
                    </div>
                    <label for="exampleFormControlTextarea1" class="form-label">Bukti berbentuk File Gambar atau Video</label>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02" name="foto">
                    </div>
                    <button type="submit" class="btn btn-sm btn-success ml-auto" style="padding: 4px 20px; margin-right: 3px; margin-top:">Simpan</button>
                </form>
            <a href="../home" class="btn btn-sm btn-info ml-auto" style="padding: 4px 13px;">Kembali</a>
            </div>
</body>

</html>