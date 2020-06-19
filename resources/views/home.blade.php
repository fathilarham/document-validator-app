@extends('layouts.home')

@section('content')
<!-- Hero Start -->
<section class="bg-half-170 d-table w-100" id="home">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-7">
                <div class="title-heading mt-4">
                    <h1 class="heading mb-3">Solusi Pengamanan <br><span class="element text-primary"
                            data-elements="Ijazah,Sertifikat,Piagam,Dokumen"></span>Digital.</h1>
                    <p class="para-desc text-muted"><b>Cek Keaslian</b> & <b>Cegah Manipulasi</b> Sertifikat,
                        Ijazah, Piagam, dan dokumen-dokumen digital lainnya
                        yang anda terbitkan.</p>
                    <div class="mt-4">
                        <a href="/app" class="btn btn-outline-primary rounded"><i class="mdi mdi-inbox"></i> Coba
                            Aplikasi</a>
                    </div>
                </div>
            </div>
            <!--end col-->
            <!--end col-->

            <div class="col-lg-5 col-md-5 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <img src="images/illustrator/services.svg" alt="">
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!--end section-->
<!-- Hero End -->
@endsection