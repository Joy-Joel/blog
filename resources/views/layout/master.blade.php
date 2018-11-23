<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">
    
 
    
</head>
<body>
@include('layout.navbar')
  <div class="jumbotron">
      @yield('content')
    </div>  
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>