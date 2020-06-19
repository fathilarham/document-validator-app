@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<!-- Header -->
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Dokumen</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $stat['documents_count'] }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Folder Dokumen
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $stat['groups_count'] }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Cek Dokumen
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">-</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card bg-white shadow">
                <div class="card-body border-0">
                    <h1 class="text-center">Hallo {{ Auth::user()->name }}</h1>
                    <h3 class="text-center">Selamat datang di Dashboard Pedod.id</h3>
                    <p class="px-md-5 px-2 text-center">Untuk melakukan pengamanan dokumen, silahkan lihat
                        tutorial yang
                        sudah kami sediakan. Apabila anda mengalami kesulitan, silahkan hubungi call center
                        kami. Anda mempunyai batas upload per file sebesar 4 MB. Bila ingin menambah batas ukuran file,
                        silahkan berlangganan Pedod.id</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6">
                <div class="copyright text-center text-xl-left text-muted">
                    &copy; 2020 <a href="https://www.instagram.com/fathil.arham" class="font-weight-bold ml-1"
                        target="_blank">Fathil Arham</a>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection