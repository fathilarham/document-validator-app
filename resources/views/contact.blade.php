@extends('layouts.home')
@section('content')
<div class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0 order-2 order-md-1">
                <div class="card shadow rounded border-0">
                    <div class="card-body py-5">
                        <h4 class="card-title">Hubungi Kami !</h4>
                        <div class="custom-form mt-4">
                            <div id="message"></div>
                            <form method="post" action="/hubungi-kami" name="contact-form" id="contact-form">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Nama <span class="text-danger">*</span></label>
                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                            <input name="name" id="name" type="text" class="form-control pl-5"
                                                placeholder="Nama anda ...">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                            <input name="email" id="email" type="email" class="form-control pl-5"
                                                placeholder="Email anda ...">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-md-12">
                                        <div class="form-group position-relative">
                                            <label>Subjek</label>
                                            <i data-feather="book" class="fea icon-sm icons"></i>
                                            <input name="subject" id="subject" type="text" class="form-control pl-5"
                                                placeholder="Tentang ...">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-md-12">
                                        <div class="form-group position-relative">
                                            <label>Pesan</label>
                                            <i data-feather="message-circle" class="fea icon-sm icons"></i>
                                            <textarea name="comments" id="comments" rows="4" class="form-control pl-5"
                                                placeholder="Sampaikan pesan anda ..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--end row-->
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <input type="submit" id="submit" name="send"
                                            class="submitBnt btn btn-primary btn-block" value="Kirim Pesan">
                                        <div id="simple-msg"></div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                            <!--end form-->
                        </div>
                        <!--end custom-form-->
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-7 col-md-6 order-1 order-md-2">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <img src="images/contact.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>

    <div class="container mt-100 mt-60">
        <div class="row">
            <div class="col-md-4">
                <div class="card contact-detail text-center border-0">
                    <div class="card-body p-0">
                        <div class="icon">
                            <img src="images/icon/bitcoin.svg" class="avatar avatar-small" alt="">
                        </div>
                        <div class="content mt-3">
                            <h4 class="title font-weight-bold">No HP</h4>
                            <p class="text-muted">Kami akan senang hati merespon pesan Whatsapp dari anda.</p>
                            <a href="tel:+628-222-5210-125" class="text-primary">+628 222 5210 125</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="card contact-detail text-center border-0">
                    <div class="card-body p-0">
                        <div class="icon">
                            <img src="images/icon/Email.svg" class="avatar avatar-small" alt="">
                        </div>
                        <div class="content mt-3">
                            <h4 class="title font-weight-bold">Email</h4>
                            <p class="text-muted">Kami akan senang hati merespon Email dari anda.</p>
                            <a href="mailto:fathil.arham@gmail.com" class="text-primary">fathil.arham@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="card contact-detail text-center border-0">
                    <div class="card-body p-0">
                        <div class="icon">
                            <img src="images/icon/location.svg" class="avatar avatar-small" alt="">
                        </div>
                        <div class="content mt-3">
                            <h4 class="title font-weight-bold">Lokasi</h4>
                            <p class="text-muted">Konsultasi untuk keperluan bisnis besar anda. Kunjungi alamat kami.
                            </p>
                            <a href="https://goo.gl/maps/VSFPGzzJ7Nn7LMYK7" target="blank" class="h6 text-primary">Jl.
                                Kauman Johar
                                no.15 Semarang, Indonesia</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->

        </div>
        <!--end row-->
    </div>
    <!--end container-->


</div>
<!--end container-->
@endsection