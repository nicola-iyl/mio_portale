<!DOCTYPE html>
<html lang="@yield('lang', config('app.locale', 'it'))">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="robots" content="noindex" />
   <title>PestDetection Panel</title>

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <!-- Styles -->
   @section('styles')
      <link href="/css/all.css" rel="stylesheet" >
      <link href="/css/style.css" rel="stylesheet" >
      <link href="/css/font-awesome.css" rel="stylesheet" >
      <link href="/css/custom.css" rel="stylesheet" >
   @show

   @stack('head')
</head>

<body class="gray-bg">
   <div class="middle-box text-center loginscreen animated fadeInDown">
      <div>
         <div><h1 class="logo-name" style="font-size:140px">NT</h1></div>
         <h3>Tomo Sapiens</h3>

         <form class="m-t" role="form" method="POST" action="{{ route('login.exec') }}">

            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
               <input type="email" class="form-control" placeholder="E-Mail" name="email" value="{{ old('email') }}" required autofocus >
               @if ($errors->has('email'))<span class="help-block text-danger"><strong>{{ $errors->first('email') }}</strong></span>@endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
               <input type="password" class="form-control" placeholder="Password" name="password" required>
               @if ($errors->has('password'))<span class="help-block text-danger"><strong>{{ $errors->first('password') }}</strong></span>@endif
            </div>

            <div class="form-group">
               <label> <input type="checkbox" class="i-checks" name="remember"> Ricordami </label>
            </div>

            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
         </form>
         <div>
            @include('partials.flash_message')
         </div>
         <p class="m-t">
            <small>Nicola Tamburini &copy; {{ date('Y') }}</small>
         </p>
      </div>
   </div>

@section('scripts')
   <script src="/js/jquery-3.1.1.min.js"></script>
@show
@stack('body')
</body>

