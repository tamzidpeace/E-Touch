<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>E-Commerce</title>
     @include('user.includes.styles')
     @include('user.includes.header')
     @include('user.includes.navigation')
</head>

<body>
     <div class="container-fluid">
          @yield('content')
     </div>
     @include('user.includes.footer')
     @include('user.includes.scripts')
</body>

</html>