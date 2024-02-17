@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">

    <div class="menu ">
          <h1 class="display-1 text-center"  style="font-family: 'Playfair Display', serif;">Menu</h1>
          <div class=" mostOrderedMenu">
            <a href="{{ route('most-ordered-menu') }}" class="display-2 w-100 d-flex h-100 justify-content-center align-items-center text-decoration-none">
              Most Ordered Menu
            </a>
          </div>
          <ul>
          @foreach ($menuItems as $key => $menuItem)
            <li style="background-image: linear-gradient(rgba(0,0,0,50%),rgba(0,0,0,50%)), url({{ $menuItem->menu_image }}); background-position: center;
              background-size: cover; " ><a href="/menus/{{ $menuItem->menu_category }}" class="display-4 text-center target">{{ $menuItem->menu_category }}</a></li>
            @endforeach
          </ul>
        </div>
@endsection
