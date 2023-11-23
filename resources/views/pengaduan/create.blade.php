@extends('layouts.backend.admin.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Pengaduan</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label> <br>
                                <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" readonly>
                            </div>
                <div class="form-group"> <label for="nik">NIK</label>
            <br> <input type="text" name="nik" value="{{ Auth::user()->nik }}" class="form-control" readonly> </div>

                        <div class="form-group">
                            <label for="tgl_pengaduan">Tanggal Pengaduan</label>
                            <input type="date" name="tgl_pengaduan" id="tgl_pengaduan" class="form-control" required>
                            @error('tgl_pengaduan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="isi_laporan">Isi Laporan</label>
                            <textarea name="isi_laporan" id="isi_laporan" class="form-control" rows="5" required></textarea>
                            @error('isi_laporan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto (opsional)</label>
                            <input type="file" name="foto" id="foto" class="form-control-file">
                            @error('foto') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="0">Pending</option>
                                <option value="Proses">Proses</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Ajukan Pengaduan</button>
                    </form>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection