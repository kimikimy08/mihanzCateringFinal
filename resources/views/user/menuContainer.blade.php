@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">

<h1 class="display-1 text-center mb-5" style=" font-family: 'Playfair Display', serif;" >{{ $categoryName }}</h1>
<div class="menu-selection">
    
       

        <ul>
        @foreach($menus as $menu)
        <li  data-bs-toggle="modal" data-bs-target="#menuModal{{ $menu->id }}">
                <!-- trigger modal -->
                <div class="food-container">
                  <img src="{{  asset('images/menu/' . $menu->menus_image) }}" alt="">
                <div class="food-info">
                  <div>{{$menu->name}}</div>
                  <div style="font-size: 20px;">Price: {{$menu->price}}</div>
                </div>
                </div>
                
            </li>
  
            @endforeach
        </ul>


  
  <!-- Modal -->
  @foreach($menus as $menu)
  <div class="modal fade" id="menuModal{{ $menu->id }}" tabindex="-1" aria-labelledby="menuModalLabel{{ $menu->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <img src="{{  asset('images/menu/' . $menu->menus_image) }}" alt="" class="">
            <div class="info">
            <h1 class="display-5  fw-semibold">{{$menu->name}}</h1>
            
           <div class="info-pos">
            <p class="text-center fw-bolder ">Price: ₱{{$menu->price}}</p>
            <p class="text-center fw-bolder  mb-5">Serving: {{$menu->serving}}</p>
           </div>
          <p class="" style="font-size: 20px;">
          {{$menu->description}}
          </p>
        </div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  @endforeach
        
       
    
</div>
@endsection
