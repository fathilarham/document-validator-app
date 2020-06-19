@extends('layouts.app')
@section('title', 'Lihat Dokumen')
@section('content')
<!-- Header -->
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8"></div>
<!-- Page content -->
<div class="container-fluid mt--7">
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    @if ($showFolder)
                    <h3 class="mb-0">Tabel Dokumen</h3>
                    @else
                    <h3 class="mb-0">{{ $documents[0]->group->title }}</h3>
                    @endif
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" scope="col">Id</th>
                                <th scope="col">Nama Dokumen</th>
                                @if ($showFolder)
                                <th class="text-center" scope="col">Folder</th>
                                @endif
                                <th class="text-center" scope="col">Dibuat</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($documents as $key=>$document)

                            <tr>
                                <td class="text-center">
                                    {{ $document->id }}
                                </td>
                                <th scope="row">
                                    <span class="mb-0 text-sm">{{ $document->original_name }}</span>
                                </th>
                                @if ($showFolder)
                                <td class="text-center">
                                    {{ $document->group->title }}
                                </td>
                                @endif
                                <td>
                                    {{ \Carbon\Carbon::parse($document->created_at)->locale('id')->isoFormat('DD MMMM YYYY') }}
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item"
                                                href="/app/document/download/{{ $document->id }}">Download</a>
                                            <a class="dropdown-item"
                                                href="/app/document/delete/{{ $document->id }}">Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            {{-- <h4>Masih kosong.</h4> --}}
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    {{ $documents->links() }}
                </div>
            </div>
        </div>
    </div>
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
@if (Session::has('msg'))
<div class="row">
    <div class="col-md-4">
        <button type="button" id="success" class="d-none" data-toggle="modal"
            data-target="#modal-notification"></button>
        <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification"
            aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                <div class="modal-content bg-gradient-success">

                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-notification">Berhasil</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="py-3 text-center">
                            <i class="ni ni-satisfied ni-3x"></i>
                            <h4 class="heading mt-4">Hore. Berhasil menghapus dokumen</h4>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-white mx-auto" data-dismiss="modal">Tutup
                            Pesan</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
@section('js')
<script>
    $('#errors').ready(function () {
            $('#errors').click()
        });

        $('#success').ready(function () {
            $('#success').click()
        });
</script>
@endsection