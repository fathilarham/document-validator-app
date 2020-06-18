@extends('layouts.app')
@section('title', 'Registrasi Dokumen')
@section('content')
<!-- Header -->
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8"></div>
<!-- Page content -->
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card bg-white shadow">
                <div class="card-body border-0">
                    <form action="/app/register-document" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Jenis Dokumen</label>
                                    <input type="text" name="title" class="form-control form-control-alternative"
                                        placeholder="Co: Sertifikat lomba ..." value="{{ old('title') }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Institusi</label>
                                    <input type="text" name="institution" class="form-control form-control-alternative"
                                        placeholder="Co: Udinus / Pemkab Semarang / ..."
                                        value="{{ old('institution') }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h5 class="form-control-label">File Dokumen</h5>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFileLang" lang="en"
                                        name="documents[]" accept="application/pdf" multiple>
                                    <label class="custom-file-label" for="customFileLang">Pilih beberapa dokumen</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h5 class="form-control-label">Berlaku Hingga</h5>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input class="form-control datepicker" name="valid_till"
                                            placeholder="*Kosongkan bila tidak ada masa berlaku dokumen" type="text"
                                            value="{{ old('valid_till') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-icon btn-primary" type="submit">
                                    <span class="btn-inner--icon"><i class="ni ni-key-25"></i></span>
                                    <span class="btn-inner--text">Regitrasi Dokumen</span>
                                </button>
                            </div>
                        </div>
                    </form>
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
@if ($errors->any())
<div class="row">
    <div class="col-md-4">
        <button type="button" id="errors" class="d-none" data-toggle="modal" data-target="#modal-notification"></button>
        <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification"
            aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                <div class="modal-content bg-gradient-danger">

                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-notification">Kesalahan Input</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="py-3 text-center">
                            <i class="ni ni-bell-55 ni-3x"></i>
                            <h4 class="heading mt-4">Ups, ada kesalahan</h4>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
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
                            <h4 class="heading mt-4">Hore. Berhasil mengamankan dokumen</h4>
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
    $(document).ready(function () {
        $('#errors').ready(function () {
            $('#errors').click()
        });

        $('#success').ready(function () {
            $('#success').click()
        });

        $('#customFileLang').change(function() {
            var count = $(this).get(0).files.length;
            $('.custom-file-label').html(count + " dokumen telah dipilih");
        });
    });
</script>
<script src="/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
@endsection