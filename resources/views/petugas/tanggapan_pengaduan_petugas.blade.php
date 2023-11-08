<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanggapi | PM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/petugas.css">
    <script type="text/javascript" src="{{ URL::asset('js/refresh.js') }}"></script>
</head>

<body>
    @include ('layouts.navbar_petugas')
    <div class="container">
            <div class="mb-3">
                <form method="POST" action="{{url("/petugas/tanggapan_petugas/$pengaduan->id_pengaduan")}}" enctype="multipart/form-data" class="mb-3">
                    @method('POST')
                    @csrf
                    <label for="exampleFormControlTextarea1" class="form-label mt-3">Bukti Gambar / Video</label>
                    <div class="input-group mb-1">
                        <img src="{{ asset("storage/image/$pengaduan->foto") }}" style="width:auto;height:200px; margin-bottom:20px;">
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlTextarea1" class="form-label">Isi Laporan :</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi_laporan" disabled>{{  $pengaduan->isi_laporan }}</textarea>
                    </div>
                <h3 class="mb-3">Status Laporan : {{ $pengaduan->status }}</h3>

                <h5 class="mb-1">Perbarui Status Laporan</h5>
                <select name="status" class="form-select mb-2" style="width: 8%;outline: none;">
                    <option selected>0</option>
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                </select>
                <div style="display:flex;flex-flow:row wrap;align-items:center;">
                <button type="submit" class="btn btn-sm btn-success ml-auto" style="padding: 4px 20px; margin-right: 10px;">Simpan</button><h6 style="margin-right:10px;margin-top:4px;">atau</h6>
                <a href="../hapus_pengaduan/{{$pengaduan->id_pengaduan}}" class="btn btn-sm btn-danger ml-auto" style="padding: 4px 13px;" onclick="return confirm('Konfirmasi Penghapusan Data?')">Hapus</a>
                </div>
                </form>

                <form></form>
            <a href="../detail_pengaduan/{{$pengaduan->id_pengaduan}}" class="btn btn-sm ml-auto btn-outline-info" style="padding: 4px 13px;">Kembali</a>
            </div>
</body>
</html>