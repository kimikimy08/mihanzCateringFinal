@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">

    <div class="menu ">
          <h1 class="display-1 text-center">Menu</h1>
          <ul>
          @foreach ($menuItems as $key => $menuItem)
            <li style="background-image: linear-gradient(rgba(0,0,0,50%),rgba(0,0,0,50%)), url({{ $menuItem->menu_image }});"><a href="/menus/{{ $menuItem->menu_category }}" class="display-4 text-center target">{{ $menuItem->menu_category }}</a></li>
            @endforeach
          </ul>
        </div>
@endsection
