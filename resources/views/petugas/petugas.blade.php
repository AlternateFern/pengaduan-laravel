@if(isset($petugas))
    <p>Petugas ID: {{ $petugas->id }}</p>
    <p>Petugas Name: {{ $petugas->username }}</p>
@else
    <p>No petugas logged in.</p>
@endif