<html lang="en">

<head>

    <title>Laravel 5.6 Multiple File Upload Example</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>

<body>
    <h1>tes</h1>
    <img src="{{ QRCode::text('QR Code Generator for Laravel!')->png() }}" alt="" srcset="">

    {{-- <div class="container lst">



        @if (count($errors) > 0)

        <div class="alert alert-danger">

            <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

    @endforeach

    </ul>

    </div>

    @endif



    @if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

    @endif



    <h3 class="well">Laravel 5.6 Multiple File Upload</h3>

    <form method="post" action="/" enctype="multipart/form-data">

        {{csrf_field()}}



        <div class="input-group hdtuto control-group lst increment">

            <input type="file" name="filenames[]" class="myfrm form-control" multiple>

        </div>

        <button type="submit" class="btn btn-success" style="margin-top:10px">Submit</button>



    </form>

    </div> --}}


</body>

</html>
