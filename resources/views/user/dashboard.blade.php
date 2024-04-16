@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/User-Dashboard.css') }}">
<div class="User-container">
            <div class="con1">
                <h1 style=" font-family: 'Playfair Display', serif;">Profile</h1>
                <div class="con1-container">
                  
                  
                    <table class="table">
                      {{-- <tr>
                        <th scope="col" colspan="2"><img src="{{ asset('images/user/' . $user->profile_picture) }}" alt="" class=" img-thumbnail icon-container"></th>
                      </tr> --}}
                        <tr>
                          <th scope="row">First Name:</th>
                          <td class="text-capitalize">{{ $user->first_name }}</td>
                        </tr>
                        <tr>
                          <th scope="row">Last Name:</th>
                          <td class="text-capitalize">{{ $user->last_name }}</td>
                        </tr>
                        <tr>
                          <th scope="row">Address:</th>
                          <td><p>{{ $user->address }}</p></td>
                        </tr>
                        <tr>
                          <th scope="row">Email:</th>
                          <td><p>{{ $user->email }}</p></td>
                        </tr>
                        <tr>
                          <th scope="row">Contact No.:</th>
                          <td><p>{{ $user->contact_number }}</p></td>
                        </tr>
                        
                      
                      
                        
                      </tbody>
                    </table>
                    <!-- <div><button type="button" class="btn btn-primary">Edit</a> </button></div> -->
                    <div><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Edit">Edit</button></div>
                </div>
                <div class="modal fade" id="Edit" tabindex="-1" aria-labelledby="EditLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="EditLabel">Edit Information</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                      <div class="modal-body">
                        <div>
                          <table class="table">
                        
                            {{-- <tr>
                              <th scope="col">Image</th>
                              <td>
                                  <div class="input-group mb-3">
                                      
                                  <input type="file" class="form-control" name="profile_picture" id="inputGroupFile01">
                                      
                                    </div>
                              </td>
                            </tr> --}}
                              <tr>
                                <th scope="col">First Name:</th>
                                <td ><input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control text-capitalize"></td>
                              </tr>
                              <tr>
                                <th scope="col">Last Name:</th>
                                <td ><input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control text-capitalize"></td>
                              </tr>
                              <tr>
                                <th scope="col">Address:</th>
                                <td><input type="text" name="address" value="{{ $user->address }}" class="form-control"></td>
                              </tr>
                              <tr>
                                <th scope="col">Email:</th>
                                <td><input type="email" name="email" value="{{ $user->email }}" class="form-control"></td>
                              </tr>
                              <tr>
                                <th scope="col">Contact No.:</th>
                                <td><input type="tell" name="contact_number" value="{{ $user->contact_number }}" class="form-control"></td>
                              </tr>
                              
                            
                            
                              
                            </tbody>
                          </table>
                          <div><button type="submit" class="btn btn-primary"> Save</button></div>
                          
                         </div>
                         </form>
                      </div>
                      <div class="modal-footer">
                       
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="con2" >
                <div class="con-A">
                    <h1 style=" font-family: 'Playfair Display', serif;">Latest Reservation</h1>
                    <section>
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Reservation ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                        @php
    $counter = 1; 
@endphp
                          @foreach($latestReservations as $latestReservation)
                          <tr>
                            <th scope="row">{{ $counter }}</th>
                            @php
        $counter++; 
    @endphp
                            <td>{{ $latestReservation->event_date }}</td>
                            <td>{{ $latestReservation->event_time }}</td>
                            <td>{{ $latestReservation->reservation_status }}</td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Viewreservation{{ $latestReservation['id'] }}">View</button></td>
                          </tr>
                       @endforeach
                        </tbody>
                      </table>
                    </section>
                    <div> <button type="button" class="btn btn-primary"><a href="{{ url('/services') }}">New Reservation</a></button>
                      <button type="button" class="btn btn-primary"><a href="{{ url('/menus') }}">Check Our Menu</a></button>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancellation">Cancellation</button>
                      </div>
                      
                </div>
                <div class="con-B">
                    <h1 style=" font-family: 'Playfair Display', serif;">History</h1>
                    <section>
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Reservation ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                        @php
    $counter = 1; 
@endphp
                          @foreach($pastReservations as $pastReservation)
                          <tr>
                          <th scope="row">{{ $counter }}</th>
                            @php
        $counter++; 
    @endphp
                            <td>{{ $pastReservation->event_date }}</td>
                            <td>{{ $pastReservation->event_time }}</td>
                            <td>{{ $pastReservation->reservation_status }}</td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Viewreservation{{ $pastReservation['id'] }}">View</button></td>
                          </tr>
                          @endforeach
                       
                          
                        </tbody>
                      </table>
                      
                    </section>
                    
                </div>

<!-- Request Modal -->
@foreach($events as $event)
      <div class="modal fade" id="Viewreservation{{ $event['id'] }}" tabindex="-1" aria-labelledby="ViewreservationLabel{{ $event['id'] }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5 " id="ViewreservationLabel">Event Information</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div>
                <table class="table">
                  <thead>
                  <tr>
              <th scope="row" class=" fs-1" style="font-weight: 500;">Client Information</th>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th scope="row">Name:</th>
              <td>{{ $event['name'] }}</td>
              <td></td>
              <td></td>
             
            </tr>
            
            <tr>
              <th scope="row">Email:</th>
              <td>{{ $event['email'] }}</td>
              <td></td>
              <td></td>
              
            </tr>
{{-- Celebrant Information --}}
            <tr>
              <th scope="row" class=" fs-1" style="font-weight: 500;">Celebrant Information</th>
              <td></td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th scope="row">Celebrant Name:</th>
              <td>{{ $event['celebrant_name'] }}</td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th scope="row">Celebrant Age:</th>
              <td>{{ $event['celebrant_age'] }}</td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th scope="row">Celebrant Gender:</th>
              <td>{{ $event['celebrant_gender'] }}</td>
              <td></td>
              <td></td>
            </tr>
{{-- Event Information --}}
            <tr>
              <th scope="row" class=" fs-1" style="font-weight: 500;">Event Information</th>
              <td></td>
              <td></td>
              <td></td>
            </tr>
             
            <tr>
              <th scope="row">Event:</th>
              <td>
                @if ($event['choice'] == 'premade' && $event['service_category'])
                {{ $event['service_category'] }}
                @elseif ($event['choice'] == 'customize' && $event['category_name'])
                {{ $event['category_name'] }}
                @endif
              </td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th scope="row" >Event Location:</th>
              <td colspan="4">{{ $event['venue_address'] }}</td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th scope="row">Date of Event:</th>
              <td>{{ $event['event_date'] }}</td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th scope="row">Time of Event:</th>
              <td>{{ $event['event_time'] }}</td>
              <td></td>
              <td></td>
            </tr>
           
            <tr>
              <th scope="row">Theme</th>
              <td>{{ $event['event_theme'] }}</td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th scope="row">Pax:</th>
              <td>
                @if ($event['choice'] == 'premade' && $event['premade_pax'])
                {{ $event['premade_pax'] }}
                @elseif ($event['choice'] == 'customize' && $event['customize_pax'])
                {{ $event['customize_pax'] }}
                @endif
              </td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th scope="row">Budget:</th>
              <td>
                @if ($event['choice'] == 'premade' && $event['premade_price'])
                {{ $event['premade_price'] }}
                @elseif ($event['choice'] == 'customize' && $event['customize_price'])
                {{ $event['customize_price'] }}
                @endif
              </td>
              <td></td>
              <td></td>
            </tr>
            
            <tr>
              <th scope="row">Package Type:</th>
              <td>
                @if ($event['choice'] == 'premade' && $event['premade_package'])
                {{ $event['premade_package'] }}
                @elseif ($event['choice'] == 'customize')
                Customized
                @endif
              </td>
              <td></td>
              <td></td>
            </tr>
            {{-- Other Information --}}
            <tr>
              <th scope="row" class=" fs-1" style="font-weight: 500;">Other Information</th>
              <td></td>
              <td></td>
              <td></td>
            </tr>

            <tr class="mt-10">
              <th scope="row"  class="fs-6 ">Reservation Status:</th> 
              <th scope="row"  class="fs-6 ">{{ $event['reservation_status'] }}</th>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th>Allergies:</th>
              <td>
              {{ $event['allergies'] }}
              </td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th>Special Request:</th>
              <td>
              {{ $event['special'] }}
              </td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th>
                Other Concern
              </th>
              <td>
              {{ $event['other'] }}
              </td>

              <td></td>
              <td></td>
            </tr>
                    {{-- Menu --}}
                    <tr>
              <th scope="row" class=" fs-1" style="font-weight: 500;">Menu</th>
              <td></td>
              <td></td>
              <td></td>
               
            </tr>

            <tr>
              <th scope="row">Pork:</th>
              <td>{{ $event['pork_menu'] }}</td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th scope="row">Beef:</th>
              <td>{{ $event['beef_menu'] }}</td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th scope="row">Chicken:</th>
              <td>{{ $event['chicken_menu'] }}</td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th scope="row">Fish:</th>
              <td>{{ $event['fish_menu'] }}</td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th scope="row">Seafood:</th>
              <td>{{ $event['seafood_menu'] }}</td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th scope="row">Vegetables:</th>
              <td>{{ $event['vegetable_menu'] }}</td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th scope="row">Pasta:</th>
              <td>{{ $event['pasta_menu'] }}</td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th scope="row">Dessert:</th>
              <td>{{ $event['dessert_menu'] }}</td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th scope="row">Drink:</th>
              <td>{{ $event['drink_menu'] }}</td>
              <td></td>
              <td></td>
            </tr>
              <th scope="row" class=" fs-1" style="font-weight: 500;">Additional services</th>
              <td scope="row" class=" fs-3" style="font-weight: 500;"></td>
              <td></td>
              <td scope="row" class=" fs-3" style="font-weight: 500;"> Price</td>
            </tr>

            <tr>
              <th>Party Entertainers:</th>
              <td>{{ $event['pe_menu'] }}</td>
              <td></td>
              <td>{{ $event['pe_price'] }}</td>
            </tr>

            <tr>
              <th>Photo Booth:</th>
              <td>{{ $event['pb_menu'] }}</td>
              <td></td>
              <td>{{ $event['pb_price'] }}</td>
            </tr>

            <tr>
              <th>Chocolate Fountain Booth:</th>
              <td>{{ $event['cf_menu'] }}</td>
              <td></td>
              <td>{{ $event['cf_price'] }}</td>
            </tr>

            <tr>
              <th>Face Painting Booth:</th>
              <td>{{ $event['fp_menu'] }}</td>
              <td></td>
              <td>{{ $event['fp_price'] }}</td>
            </tr>
<tr>
  <th>
    Cupcake Tower Booth:
  </th>
  <td>{{ $event['ct_menu'] }}</td>
              <td></td>
              <td>{{ $event['ct_price'] }}</td>
  
</tr>
<tr>
  <th>
    Fruits Booth:
  </th>
  <td>{{ $event['f_menu'] }}</td>
              <td></td>
              <td>{{ $event['f_price'] }}</td>
</tr>
{{-- TOTAL AMOUNT --}}
<tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td></td>
  <th>Total Additional Services:</th>
  <td>{{ $event['pe_price'] +$event['pb_price']+$event['ct_price']+$event['fp_price']+$event['cf_price']+$event['f_price'] }}</td>
  <td></td>
  </tr>
  <tr>
  
    <td></td>
    
    <th>Budget:</th>
    <td> @if ($event['choice'] == 'premade' && $event['premade_price'])
                {{ $event['premade_price'] }}
                @elseif ($event['choice'] == 'customize' && $event['customize_price'])
                {{ $event['customize_price'] }}
                @endif</td>
    <td></td>
    </tr>
    @if ($event['choice'] == 'customize')
    <tr>
     
      <td></td>
      
      <th class=" border-black">Charge:</th>
      @if ($event['customize_option'] == 'option 2')
      <td class=" border-black">{{ number_format(round(( $event['customize_pax'] - round($event['customize_price'] / 350 ))*350  )) }}</td>
      @else
      <td class=" border-black">0</td>
     @endif
      <td></td>
      </tr>
      @endif
      <tr>
    
        <td></td>
        <th >Total Amount:</th>
        @if ($event['choice'] == 'premade' && $event['premade_price'])
        <td >{{ ($event['pe_price'] +$event['pb_price']+$event['ct_price']+$event['fp_price']+$event['cf_price']+$event['f_price']) + $event['premade_price'] }}</td>
        @elseif ($event['choice'] == 'customize')
        @if ($event['customize_option'] == 'option 1')
        <td >{{ ($event['pe_price'] +$event['pb_price']+$event['ct_price']+$event['fp_price']+$event['cf_price']+$event['f_price']) +  ($event['customize_price']) + 0 }}</td>
        @else
        <td >{{ ($event['pe_price'] +$event['pb_price']+$event['ct_price']+$event['fp_price']+$event['cf_price']+$event['f_price']) +  ($event['customize_price']) + (round(( $event['customize_pax'] - round($event['customize_price'] / 350 ))*350  )) }}</td>
        @endif
        @endif
        <td></td>
        </tr>

          </tbody>
                </table>
              </div>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
      @endforeach
<!-- Cancellation Modal -->
<div class="modal fade" id="cancellation" tabindex="-1" aria-labelledby="cancellationLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="cancellationLabel">Cancellation</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <p class="">Kindly contact Mihanz Catering for cancellation of reservation</p>
          
         </div>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="Edit" tabindex="-1" aria-labelledby="EditLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditLabel">For Edit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <p>Kindly contact the Mihanz Catering for Edit of reservation</p>
          
         </div>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
            </div>







        </div>

@endsection
