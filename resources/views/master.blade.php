<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ asset(url('plugins/dropjone/css/dropjone.css')) }}"> --}}
    {{-- @vite(['resources/css/app.css','resources/js/app.js']) --}}
    {{-- <link rel="stylesheet" href="{{ asset('plugins/dropzone/dist/min/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/dropzone/dist/min/basic.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/basic.css" integrity="sha512-+Vla3mZvC+lQdBu1SKhXLCbzoNCl0hQ8GtCK8+4gOJS/PN9TTn0AO6SxlpX8p+5Zoumf1vXFyMlhpQtVD5+eSw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="p-5">

    @yield('content')



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="{{ asset('./jquery/dist/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('plugins/dropzone/dist/min/dropzone.min.js') }}"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/dropzone.js" integrity="sha512-tYefFVRPVQIZMI0CqDcVLTti7ajlO/l9qk1s8eswWduldmconu2sKCdYQOTRkn/f2k3eupgRbFzf55bM2moH8Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    @yield('script')

</body>

</html>



