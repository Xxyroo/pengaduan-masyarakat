<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('template/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
<div class="sidebar-heading">
    Pengaduan
</div>

<!-- Nav Item - Pengaduan -->
<li class="nav-item {{ Request::is('/pengaduan/table') ? 'active' : '' }}">
    <a class="nav-link" href="/pengaduan">
        <i class="fas fa-fw fa-bug"></i>
        <span>Pengaduan</span>
    </a>
</li>

<!-- Nav Item - Tambah Pengaduan -->
@if(Auth::user()->role==2 || Auth::user()->role==0)
<li class="nav-item {{ Request::is('/pengaduan/create') ? 'active' : '' }}">
    <a class="nav-link" href="/pengaduan/create">
        <i class="fas fa-fw fa-bug"></i>
        <span>Tambah Pengaduan</span>
    </a>
</li>
@endif

<!-- Heading -->
<div class="sidebar-heading">
    Laporan
</div>

<!-- Nav Item - Laporan -->
<li class="nav-item {{ Request::is('/laporan') ? 'active' : '' }}">
    <a class="nav-link" href="/laporan">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>Laporan</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    User
</div>

<!-- Nav Item - User -->
<li class="nav-item {{ Request::is('/user') ? 'active' : '' }}">
    <a class="nav-link" href="/user">
        <i class="fas fa-fw fa-user"></i>
        <span>User</span>
    </a>
</li>

        </ul>
        <!-- End of Sidebar -->