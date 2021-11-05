<!DOCTYPE html>
<html lang="@yield('lang', config('app.locale', 'it'))">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="robots" content="noindex" />
    <title>@yield('title', config('app.name', 'IYL DELIVERY'))</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    @section('styles')
        <link href="/css/all.css" rel="stylesheet" >
        <link href="/css/style.css" rel="stylesheet" >
        <link href="/css/font-awesome.css" rel="stylesheet" >
        <link href="/css/custom.css" rel="stylesheet" >
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/styles/default.min.css">
    @show

    @stack('head')
</head>

<body>
<div id="wrapper">

    @include('partials.sidebar')

    <div id="page-wrapper" class="gray-bg">
        @include('partials.header')
        @include('partials.breadcrumbs')
        @include('partials.flash_message')

        <div class="wrapper wrapper-content">
            @yield('content')
        </div>

        @include('partials.footer')
    </div>

</div>

<!-- MODALE -->
<div class="modal inmodal fade" id="myModal" tabindex="-1" role="dialog"  aria-hidden="true"></div>
<!-- FINE MODALE -->

@include('partials.loader')
@include('partials.img_popup')

@section('scripts')
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/js/plugins/dataTables/datatables.min.js"></script>
    <script src="/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
    <script src="/js/plugins/summernote/summernote-bs4.js"></script>
    <script src="/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="/js/plugins/dropzone/dropzone.js"></script>
    <script src="/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>
    <script src="/js/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="/js/plugins/select2/select2.full.min.js"></script>
    <script src="/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/js/inspinia.js"></script>
    <script src="/js/plugins/pace/pace.min.js"></script>

    <!-- Sparkline -->
    <script src="/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/highlight.min.js"></script>

    <script src="/js/cms.js"></script>
    <!--<script>hljs.highlightAll();</script>-->
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('code pre').forEach((el) => {
                hljs.highlightElement(el);
            });
        });
    </script>
@show
@yield('js_script')
@stack('body')

</body>

</html>