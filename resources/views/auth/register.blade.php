@extends('layouts.auth')
@section('content')
<section class="bg-home bg-circle-gradiant d-flex align-items-center">
    <div class="bg-overlay bg-overlay-white"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <div class="card login_page shadow rounded border-0">
                    <div class="card-body">
                        <h4 class="card-title text-center">Daftar</h4>
                        <form class="login-form mt-4" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Nama <span class="text-danger">*</span></label>
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input type="text" class="form-control pl-5" placeholder="Nama lengkap"
                                            name="name" required="" value="{{ old('name') }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <i data-feather="mail" class="fea icon-sm icons"></i>
                                        <input type="email" class="form-control pl-5" placeholder="Email" name="email"
                                            required="" value="{{ old('email') }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Password <span class="text-danger">*</span></label>
                                        <i data-feather="key" class="fea icon-sm icons"></i>
                                        <input type="password" class="form-control pl-5" placeholder="Password"
                                            required="" name="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Konfirmasi Password <span class="text-danger">*</span></label>
                                        <i data-feather="key" class="fea icon-sm icons"></i>
                                        <input type="password" class="form-control pl-5"
                                            placeholder="Konfirmasi Password" required="" name="password_confirmation">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-block">Daftar</button>
                                </div>

                            </div>
                            <div class="mx-auto">
                                <p class="mb-0 mt-3"><small class="text-dark mr-2">Sudah punya akun ?</small>
                                    <a href="/login" class="text-dark font-weight-bold">Masuk</a>
                                </p>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    </div>
    <!--end container-->
</section>
<!--end section-->
@endsection