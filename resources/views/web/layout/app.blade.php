@php
$locale = app()->getLocale();
@endphp


<!DOCTYPE html>
@if ($locale == 'ar')
<html lang="ar" dir="rtl">
@else
<html lang="en">
@endif

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $title ?? '' }} Riadah Online</title>

    @include('web.inc.styles')
     <!-- App favicon -->
     <link rel="shortcut icon" href="{{asset('assets/admin')}}/images/favicon.ico">
     @if($locale == 'ar')
     <style>
         @font-face {
            font-family: 'MoLarabicRegular';
            src: url("{{public_path('assets/web/fonts/ar/MoLarabicRegular')}}") format('truetype');
        }
        body.ar{
            font-family: MoLarabicRegular;
        }
        h1,h2,h3,h4,h5,h6,p,a,span,b,div,pre{
            font-family: MoLarabicRegular,sans-serif !important;
        }
        </style>
    @endif
     @if($locale == 'en')
     <style>
         @font-face {
            font-family: Cocogoose;
            src: url("{{public_path('assets/web/fonts/eng/Cocogoose Pro Light-trial.ttf')}}") format('truetype');
        }
        body.ar{
            font-family: Cocogoose;
        }
        h1,h2,h3,h4,h5,h6,p,a,span,b,div,pre{
            font-family: Cocogoose,sans-serif !important;
        }
        </style>
    @endif

     <!-- App css -->
     @stack('css')

</head>

<body class="{!! app()->getLocale(); !!}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('web.inc.header')
    <!-- headermain -->
@include('web.inc.header-main')
<!-- headermain./ -->

    @yield('main')

    <!-- footer-top -->
@include('web.inc.footer-top')
<!-- footer-top./ -->

    @include('web.inc.footer')

    @include('web.inc.scripts')

    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            setTimeout(function(){
                $(".alert-success").fadeOut('slow');
            },4000)
        })
    </script>
    <script>
        @if(Session::has('success'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("{{ session('success') }}");
        @endif

        @if(Session::has('error'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
      </script>

  @stack('js')

</body>

</html>
