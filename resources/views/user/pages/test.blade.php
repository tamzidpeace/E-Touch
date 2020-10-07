@extends('layouts.app')

@section('content')

<div class="container">
     @foreach ($products as $user)
         {{ $user->name }}
     @endforeach
 </div>
 
 {{ $products->links() }}
    
@endsection