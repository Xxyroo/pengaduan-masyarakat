@extends('layouts.backend.admin.master')

@section('content')
<div class="container">
    <h1>Edit Pengaduan</h1>
    <form method="POST" action="{{ route('pengaduan.update', $pengaduan->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Tanggal Pengaduan -->
        <div class="form-group">
            <label for="tgl_pengaduan">Tanggal Pengaduan:</label>
            <input type="date" name="tgl_pengaduan" class="form-control" value="{{ $pengaduan->tgl_pengaduan }}" required>
        </div>

        <!-- Isi Laporan -->
        <div class="form-group">
            <label for="isi_laporan">Isi Laporan:</label>
            <textarea name="isi_laporan" class="form-control" rows="5" required>{{ $pengaduan->isi_laporan }}</textarea>
        </div>

        <!-- Foto -->
        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" name="foto" class="form-control-file">
            @if ($pengaduan->foto)
                <img src="{{ asset('images/' . $pengaduan->foto) }}" alt="Complaint Photo" class="mt-2" style="max-width: 200px;">
            @else
                <p>No Photo</p>
            @endif
        </div>

        <div class="form-group">
                        <label for="status">Status</label>
                        <br>
                        <select name="status" id="status">
                        <option value="Diproses">Diproses</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Ditolak">Ditolak</option>
                        </select>
                    </div>

        <!-- Button to Submit Form -->
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection