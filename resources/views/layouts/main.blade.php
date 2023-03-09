<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Technical Test</title>
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    @include('layouts.navbar')
    <main>
        <div class="shadow">
            @if (session()->has('alert'))
                <div class="alert alert-success text-center fs-5 mt-1" role="alert">
                    {{ session('alert') }}
                </div>
            @endif
            @if (session()->has('failed'))
                <div class="alert alert-danger text-center fs-5" role="alert">
                    {{ session('failed') }}
                </div>
            @endif
        </div>
        <div class="container mt-1">
            <div class="row justify-content-center">

                <div class="col-md-8">
                    @yield('container')
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    {{-- fontawesome --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"></script>


</body>

</html>
