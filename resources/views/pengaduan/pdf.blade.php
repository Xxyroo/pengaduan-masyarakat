<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOMBOzW1RWuH61DGLwZJEdK2KadqZF9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="title text-center mb-5">
        <h2>Laporan Layanan Pengaduan Masyarakat</h2>
        <h5>Jakarta Barat</h5>
    </div>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>NIK</th>
                <th>Pelapor</th>
                <th>Isi Laporan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengaduans as $key => $pengaduan)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $pengaduan->tgl_pengaduan }}</td>
                    <td>{{ $pengaduan->user->nik }}</td>
                    <td>{{ $pengaduan->user->name }}</td>
                    <td>{{ $pengaduan->isi_laporan }}</td>
                    <td>{{ $pengaduan->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>