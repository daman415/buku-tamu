<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Face detection on the browser using javascript !</title>
  <script defer src="{{ asset('assets/js/face-api.min.js') }}"></script>
  <script defer src="{{ asset('assets/js/face-detec.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('assets/css/face-style.css') }}">
</head>
<body>

    <div class="row">
        <div class="col-md-6">
            <video id="video" width="600" height="450" autoplay>

        </div>
        <div class="col-md-6">
            <div id="vieww"></div>

        </div>
        {{-- <div class="col-md-6">
            <div id="app" class="visitor-app"></div>
            <div class="data-container">
                <h1 id="nama"></h1>
                <h1 id="identitas"></h1>
                <h1 id="n_identitas"></h1>
                <h1 id="jk"></h1>
                <h1 id="pekerjaan"></h1>
                <h1 id="alamat"></h1>
                <h1 id="no_hp"></h1>
                <h1 id="keperluan"></h1>
                <h1 id="tujuan"></h1>
                <h1 id="tgl"></h1>
                <h1 id="jam"></h1>

            </div>

        </div> --}}
    </div>

</body>
</html>
