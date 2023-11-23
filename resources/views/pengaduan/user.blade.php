@extends('layouts.backend.admin.master')

@section('content')
<div class="container">
    <h1>Daftar User</h1>

    @if ($users && count($users) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>NIK</th>
                    <!-- Add other fields as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->nik   }}</td>
                        <!-- Add other fields as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada user.</p>
    @endif
</div>
@endsection