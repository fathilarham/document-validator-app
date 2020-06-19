<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Pedod.id</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pedod.id , Solusi pengamanan dokumen digital" />
    <meta name="keywords" content="Dokumen Digital, Sertifikat, E-Sertifikat, Piagam" />
    <meta name="author" content="fathil.arham" />
    <meta name="email" content="fathil.arham@gmail.com" />
    <meta name="website" content="http://www.instagram.com/fathil.arham" />
    <meta name="Version" content="v1.0" />
    <!-- favicon -->
    <link rel="shortcut icon" href="/images/favicon.png">
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link href="/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.7/css/unicons.css">
    <!-- Main Css -->
    <link href="/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400;">
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
    <!-- Loader -->

    <!-- Hero Start -->
    <section style="align-items: center; padding: 150px 0;">
        <div class="container">
            <div class="row" style="justify-content: center;">
                <div class="col-lg-6 col-md-8">
                    @if ($errors->any())
                    <div class=""
                        style="padding: 8px; color: #e43f52; background-color: rgba(228, 63, 82, 0.2); border: 1px solid rgba(228, 63, 82, 0.2); border-radius: 6px; text-align: center; font-size: 16px; font-weight: 600;">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>
                    @endif
                    @if (Session::has('msg'))
                    <div class=""
                        style="padding: 8px; color: #5ae43f; background-color: #5ae43f25; border: 1px solid #5ae03f; border-radius: 6px; text-align: center; font-size: 16px; font-weight: 600;">
                        <li>{{ Session::get('msg') }}</li>
                    </div>
                    @endif
                    <br>
                    <table
                        style="box-sizing: border-box; width: 100%; border-radius: 6px; overflow: hidden; background-color: #fff; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
                        <thead>
                            <tr
                                style="background-color: #fafafa; padding: 3px 0; line-height: 68px; text-align: center; color: #fff; font-size: 24px; font-weight: 700; letter-spacing: 1px;">
                                <th scope="col">
                                    <img src="/images/logo-dark.png" height="24" alt="">
                                    <h6 class="text-primary">Pengaman Dokumen Digital</h6>
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td class="text-center" style="padding: 10px 1px 8px; color: #3b3b3b;">
                                    <h4>{{ $folder->title }}</h4>
                                    <h6>({{ $folder->institution }})</h6>
                                </td>
                            </tr>

                            <form action="/check-document/{{ $folder->code }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <tr>
                                    <td class="text-center" style="padding: 6px 24px;">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFileLang" lang="en"
                                                name="document" accept="application/pdf">
                                            <label class="custom-file-label" for="customFileLang">Pilih Dokumen</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center" style="padding: 24px 24px;">
                                        <button type="submit" class="btn-primary btn-block"
                                            style="padding: 8px 20px; outline: none; text-decoration: none; font-size: 16px; letter-spacing: 0.5px; transition: all 0.3s; font-weight: 600; border-radius: 6px;">Cek
                                            Dokumen</button>
                                    </td>
                                </tr>
                            </form>

                            <tr>

                                <td
                                    style="padding: 16px 8px; color: #8492a6; background-color: #f8f9fc; text-align: center;">
                                    Terimakasih sudah mempercayai Pedod.id sebagai solusi <br>pengaman dokumen digital
                                    anda.<br><br>
                                    © 2020 Fathil Arham.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- Hero End -->

    <!-- javascript -->
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <!-- Icons -->
    <script src="/js/feather.min.js"></script>
    <script src="https://unicons.iconscout.com/release/v2.1.9/script/monochrome/bundle.js"></script>
    <!-- Main Js -->
    <script src="/js/app.js"></script>
    <script>
        $('#customFileLang').change(function() {
            var name = $(this).get(0).files[0].name;
            $('.custom-file-label').html(name);
        });

    </script>
</body>

</html>