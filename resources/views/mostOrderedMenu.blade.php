@extends('layouts.app')


@section('content')
<link rel="stylesheet" href="{{ asset('css/Services.css') }}">
  
 <!-- Info -->
 <section class="info mb-5">
<div class="info-container">
<div>
  <div class="display-2 p-3 text-center " style=" font-family: 'Playfair Display', serif; ">Top foods per category!</div>
  <div class="display-6 text-center " >Are you not sure what to pick on your reservation? </div>
  <div class="display-6 text-center mb-5" >Come and take a look at client's favorites</div>
  <div class="btn-pos"><a href="{{ url('/menus') }}"><button type="button" class="btn btn-primary btn-lg">Check Our Menu</button> </a></div>
</div>

</div>
        
      </section>
      <!-- Menu -->
      <div class="display-1 mb-5" style=" font-family: 'Playfair Display', serif;">Most Ordered Menu</div>
      <section class="most-ordered-menu w-100 mb-5">
      @foreach ($mostOrderedMenus as $category => $menus)
        <div class="display-3 m-5" style="border-bottom: solid; text-align: center;" >{{ ucfirst($category) }}:</div>
        <div class=" w-100 ">
            
          <ul>
          
          @if (collect($menus)->isNotEmpty())

          @foreach ($menus as $menu)
            <li data-bs-toggle="modal" data-bs-target="#menuModal{{ $menu->id }}">
              <div class="food-container ">
                <img src="{{  asset('images/menu/' . $menu->menus_image) }}" alt="">
                  <!-- Dish Name -->
                  <div class="food-name">{{ $menu->name }}</div>
  
              </div>
            </li>
            @endforeach
            @endif
           
          </ul>  
          </div>

           
          @endforeach
      </section>
    


<!-- Modal -->
@foreach ($mostOrderedMenus as $category => $menus)
@foreach ($menus as $menu)
<div class="modal fade" id="menuModal{{ $menu->id }}" tabindex="-1" aria-labelledby="beefLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content ">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="beefLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
       <div class="modal-food-info">
        <img src="{{  asset('images/menu/' . $menu->menus_image) }}" alt="" class="" style="width: 400px ; height: 400px;">
        <div class="foodinfo">
        <h1 class="display-5 text-center fw-semibold">{{ $menu->name }}</h1>
        
       <div class="info-pos">
        <p class="text-center fw-bolder ">Price:  ₱{{ $menu->price }}</p>
        <p class="text-center fw-bolder  mb-5">Serving: {{ $menu->serving }}</p>
       </div>
      <p class="text-center" style="font-size: 20px;">
      {{ $menu->description }}
      </p>
    </div>
       </div>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
@endforeach
@endforeach
        @endsection