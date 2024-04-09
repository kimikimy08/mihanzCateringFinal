@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/Services.css') }}">

<div class="filter">

      
<div class="container custom-container">
 <h1 class="display-3 m-5" style=" font-family: 'Playfair Display', serif;">Customize your own package</h1>
 <ul>
  <p class="h4 text-decoration-underline">Amazing Deals</p>
  <li class="h4">Make your reservation within 7 days for preparation</li>
  <li class="h4">We can customize your package base on your budget</li>
  <li class="h4">Customize your own package given to your budget and how many guest you have</li>
  <li class="h4">Budget must be 18,000 minimum that the cater can provide</li>
  <li class="h4">Guest count must be 50 minimum that the cater can provide</li>
 </ul>
 <div><button type="button" class="btn btn-primary"> <a href="{{ route('user.reservations.customize') }}">Continue</a></button></div>
</div>

</div>

@endsection
