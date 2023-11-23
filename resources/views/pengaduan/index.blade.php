@extends('layouts.backend.admin.master')

@section('content')
<div class="container">
    <h1>Daftar Pengaduan Saya</h1>

    @if ($pengaduans && count($pengaduans) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Tanggal Pengaduan</th>
                    <th>Isi Laporan</th>
                    <th>Status</th>
                    <th>Foto</th> <!-- New column for the photo -->
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengaduans as $item)
                    <tr>
                        <td>{{ $item->tgl_pengaduan }}</td>
                        <td>{{ $item->isi_laporan }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            @if ($item->foto)
                                <img src="{{ asset('images/' . $item->foto) }}" alt="Complaint Photo" style="max-width: 100px;">
                            @else
                                No Photo
                            @endif
                        </td>
                        <td class="d-flex" style="gap: 1rem;">
                            <a href="{{ route('pengaduan.show', $item->id) }}" class="btn btn-primary">Detail</a>
                            @if(Auth::user()->role==1 || Auth::user()->role==2)
                            <a href="{{ route('pengaduan.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('pengaduan.destroy', $item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Anda belum membuat pengaduan.</p>
    @endif
</div>
@endsection