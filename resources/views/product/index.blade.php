<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="">
            @include('layouts.navigation')
        </div>
    </body>
</html>

<div class="container">
<div class="row">
    @foreach($products as $product)
    
      <div class="col-md-3 py-5">
      <div class="card w-75 text-center" id="productCard" style="width: 18rem;">
        <img  style="width:100%!important;height:180px!important;" src='{{$product->image}}' class="card-img-top w-75 m-auto" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$product->name}}</h5>
            <span>{{$product->price}} USD</span>
            <form action="{{route('transactions',['price'=>$product->price])}}" method="post">
                @csrf
            <button type="submit" style="color:black!important;" class="btn btn-primary mt-3">Buy</button>
            </form>
        </div>
        </div>
      </div>
    @endforeach
    </div>
</div>

