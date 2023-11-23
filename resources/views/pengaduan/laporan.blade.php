@extends('layouts.backend.admin.master')

@section('content')
<div class="container">
    <div class="form-group">
   <a href="{{url('/laporan/cetak')}}"><button class="btn btn-primary">Export ke PDF</button></a>
   </div>

    <div class="card shadow mb-4 my-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Laporan
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Pelapor</th>
                            <th>Isi Laporan</th>
                            <th>Foto</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($pengaduans) > 0)
                            @foreach($pengaduans as $key => $pengaduan)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $pengaduan->tgl_pengaduan }}</td>
                                    <td>{{ $pengaduan->user->name }}</td>
                                    <td>{{ Str::limit($pengaduan->isi_laporan,50) }}</td>
                                    <td>
                                        <a href="{{ asset('images') }}/{{ $pengaduan->foto }}" target="_blank">
                                            <img src="{{ asset('images') }}/{{ $pengaduan->foto }}" width="100">
                                        </a>
                                    </td>
                                    <td>
                                        @if ($pengaduan->status == '0')
                                            <span class="px-3 bg-gradient-danger text-white">{{ $pengaduan->status }}</span>
                                        @elseif ($pengaduan->status == 'Proses')
                                            <span class="px-3 bg-gradient-warning text-white">{{ $pengaduan->status }}</span>
                                        @else
                                            <span class="px-3 bg-gradient-success text-white">{{ $pengaduan->status }}</span>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <td>Tidak ada pengaduan yang dapat ditampilkan.</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection