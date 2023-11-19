<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail | PM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/masyarakat.css') }}">
    <script src="{{ asset('js/refresh.js') }}"></script>
</head>

<body>
    @include ('layouts.navbar')
    <div class="container">
        @foreach ($pengaduan as $pengaduan)
            <div class="mb-3">
                <form action="" method="POST" enctype="multipart/form-data" class="mb-3">
                    <div class="mb-1">
                        <label for="exampleFormControlTextarea1" class="form-label">Isi Laporan :</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi_laporan" disabled>{{  $pengaduan->isi_laporan }}</textarea>
                    </div>
                    <label for="exampleFormControlTextarea1" class="form-label">File</label>
                    <div class="input-group mb-3">
                        <img src="{{ asset("storage/image/$pengaduan->foto") }}" style="width:auto;height:200px; margin-bottom:20px;">
                    </div>
                    <a href="../update_pengaduan/{{$pengaduan->id_pengaduan}}" class="btn btn-sm btn-success ml-auto" style="padding: 4px 20px; margin-right: 3px; margin-top:">Edit</a>
                    <a href="../hapus_pengaduan/{{$pengaduan->id_pengaduan}}" class="btn btn-sm btn-danger ml-auto" style="padding: 4px 13px;" onclick="return confirm('Konfirmasi Penghapusan Data?')">Hapus</a>
                </form>
            @endforeach
            <p>Laporan ini sudah di tanggapi!</p>
            <button type="button" class="btn btn-sm btn-success ml-auto" onclick="showDetails()">Lihat Tanggapan</button>
            <br><br>
            <div id="responseDetails" class="details-container" style="display: none;">
                <div class="petugas-user-pfp">
                <img src="{{ $petugas->foto_profil ? asset('storage/' . $petugas->foto_profil) : asset('storage/image/default.png') }}" style="border-radius: 50%;" class="pfp" alt="Profile Picture" width="40px" height="40px">
                <p style="font-size: 20px; margin:0; margin-left:10px;">{{ $petugas->username }}</p></div><br>
                <label for="tanggapan">Tanggapan Petugas:</label><br>
                <textarea name="tanggapan" id="textarea-tanggapan" rows="4" cols="50" disabled>{{ $pengaduan->tanggapan->isi_tanggapan }}</textarea>
                <p>Status: {{ $pengaduan->status }}</p>
            </div>
            <a href="../home" class="btn btn-sm btn-info ml-auto" style="padding: 4px 13px;">Kembali</a>
            </div>
            <script>
                function showDetails() {
                    var detailsDiv = document.getElementById('responseDetails');
                    var currentDisplay = detailsDiv.style.display;

                    // Toggle the display state
                    detailsDiv.style.display = (currentDisplay === 'none') ? 'block' : 'none';
                }
            </script>
</body>

</html>