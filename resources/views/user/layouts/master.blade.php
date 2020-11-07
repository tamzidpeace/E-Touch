<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @yield('title')
     {{-- <title>E-Commerce</title> --}}
     @include('user.includes.styles')
     @yield('styles')
     @include('user.includes.navigation')
     @include('user.includes.header')    
</head>

<body>
     <div class="container-fluid">
          @yield('content')
     </div>
     @include('user.includes.footer')
     @include('user.includes.scripts')
     @yield('scripts')
</body>

</html>