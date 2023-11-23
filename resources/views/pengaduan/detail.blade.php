@extends('layouts.backend.admin.master')
@section('content')
<div class="container">
    @if(Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
    @endif

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">

            <div class="card">
                <div class="card-header"><b>Detail Pengaduan</b></div>

                <div class="card-body">
                    <div class="form-group">
                        Nama Pelapor :
                        <b>{{ $pengaduan->user->name }}</b><br>
                        NIK : <b>{{ $pengaduan->user->nik }}</b><br>
                        Tanggal Pengaduan :
                        <b>{{ $pengaduan->tgl_pengaduan }}</b><br>
                        Status : <b>{{ $pengaduan->status }}</b><br>
                        Isi Pengaduan :
                        <b>{{ $pengaduan->isi_laporan }}</b><br>
                        Foto :<br><img src="{{ asset('images') }}/{{ $pengaduan->foto }}" width="50%">
                    </div>
                    <div class="form-group">
                        Tanggapan:
                        @if (empty($pengaduan->tanggapan->tanggapan))
                        <b>Belum ada tanggapan</b>
                        @if(Auth::user()->role==1 || Auth::user()->role==2)
                        <div class="form-group">
                            <a href="{{ route('tanggapan.show',[$pengaduan->id]) }}"><button class="btn btn-primary">Beri Tanggapan</i></button></a>
                        </div>
                        @endif
                        @else
                        <b>{{ $pengaduan->tanggapan->tanggapan }}</b>
                        @if(Auth::user()->role==1 || Auth::user()->role==2)
                        <div class="form-group">
                            <a href="{{ route('tanggapan.edit',[$pengaduan->id]) }}"><button class="btn btn-primary">Update Tanggapan</i></button></a>
                        </div>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection