<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('itech/assets/images/favicon.png') }}">
    <link href="{{ asset('itech/assets/fonts/feather/feather.css') }}" rel="stylesheet"/>
    <link href="{{ asset('itech/assets/libs/dragula/dist/dragula.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('itech/assets/libs/%40mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('itech/assets/libs/prismjs/themes/prism.css') }}" rel="stylesheet"/>
    <link href="{{ asset('itech/assets/libs/dropzone/dist/dropzone.css') }}" rel="stylesheet"/>
    <link href="{{ asset('itech/assets/libs/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet"/>
    <link href="{{ asset('itech/assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('itech/assets/libs/%40yaireo/tagify/dist/tagify.css') }}" rel="stylesheet">
    <link href="{{ asset('itech/assets/css/select2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('itech/assets/css/theme.min.css') }}">
    @yield('title')
</head>
<body>
<div id="db-wrapper">
    @include('partials.dashboard.sidebar')
    <div id="page-content">
        <div class="header">
            @include('partials.dashboard.header')
        </div>
        @yield('content')
    </div>
    @yield('modal')
</div>

<script src="{{ asset('itech/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('itech/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('itech/assets/libs/odometer/odometer.min.js') }}"></script>
<script src="{{ asset('itech/assets/libs/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('itech/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('itech/assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('itech/assets/libs/flatpickr/dist/flatpickr.min.js') }}"></script>
<script src="{{ asset('itech/assets/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('itech/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('itech/assets/libs/quill/dist/quill.min.js') }}"></script>
<script src="{{ asset('itech/assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js') }}"></script>
<script src="{{ asset('itech/assets/libs/dragula/dist/dragula.min.js') }}"></script>
<script src="{{ asset('itech/assets/libs/bs-stepper/dist/js/bs-stepper.min.js') }}"></script>
<script src="{{ asset('itech/assets/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
<script src="{{ asset('itech/assets/libs/jQuery.print/jQuery.print.js') }}"></script>
<script src="{{ asset('itech/assets/libs/prismjs/prism.js') }}"></script>
<script src="{{ asset('itech/assets/libs/prismjs/components/prism-scss.min.js') }}"></script>
<script src="{{ asset('itech/assets/libs/%40yaireo/tagify/dist/tagify.min.js') }}"></script>
<script src="{{ asset('itech/assets/clipboard.js/1.5.12/clipboard.min.js') }}"></script>
<script src="{{ asset('itech/assets/js/theme.min.js') }}"></script>
<script src="{{ asset('itech/assets/js/sweetalert2.all.min.js') }}"></script>

</body>
@yield('js')
@include('sweetalert::alert')
</html>
