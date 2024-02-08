@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/services.css') }}">

    <div class="Services-Container ">
        <h1 class="display-1 " style="font-family: 'Playfair Display', serif;">Services</h1>
<hr>
        <ul >
        @foreach ($servicesItems as $key => $servicesItem)
            <li class="birthday" style="background-image: linear-gradient(rgba(0,0,0,50%),rgba(0,0,0,50%)), url({{ $servicesItem->services_image }});">
                <a href="{{ route('user.servicePackages', ['serviceCategory' => $servicesItem->services_category]) }}" class="display-2">{{ $servicesItem->services_category }}</a>
            </li>
            @endforeach
        </ul>
        </div>
@endsection
