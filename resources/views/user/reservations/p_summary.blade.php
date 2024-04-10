@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/Services.css') }}">

    <div class="premade-form">
        <!-- No common content for both premade and customize -->
    </div>

    <div class="form-container">
        <h1 class="display-1 text-center mb-5 fw-bolder">Summary</h1>

        <table>
            <!-- User information -->
            <tr>
            <td class="fw-bolder"> Name:</td>

            <td>
            {{ $reservations->user->first_name . ' ' . $reservations->user->last_name }}
            </td>

            <td class="fw-bolder"> Email:</td>

            <td>
            {{$reservations->user->email}}
            </td>

          </tr>


            <!-- Event details -->
            <tr>
              <td class="fw-bolder">Date of Event:</td>
            <td>
            {{$reservations->event_date}}
            </td>
            <td class="fw-bolder"> Time of Event:</td>
            <td>
            {{$reservations->event_time}}
            </td>

          </tr>

          <tr>
            <td class="fw-bolder"> Event Location:</td>
            <td>{{$reservations->venue_address}}</td>
            <td class="fw-bold">Contact No.:</td>
            <td>{{$reservations->user->contact_number}}</td>

          </tr>

</table>

<hr>
        <h1 class="text-start mb-5" style=" font-family: 'Playfair Display', serif;">Package Information</h1>

          <table>

            <!-- Package Information -->
            <tr>
                <td class="fw-bolder"> Event:</td>
                <td>
                    @if ($reservations->reservationSelection->choice == 'premade')
                        {{ $reservations->premades->servicePackage->serviceSelection->services_category }}
                    @elseif ($reservations->reservationSelection->choice == 'customize')
                        {{ $reservations->reservationSelection->categoryName }}
                    @endif
                </td>
                 <!-- Additional Sections based on Reservation Type -->
            @if ($reservations->reservationSelection->choice == 'premade')
                <!-- Premade Reservation Section -->
          
                    <td class="fw-bolder">Package Type:</td>
                    <td>{{ $reservations->premades->servicePackage->name }}</td>
                    </tr>
                    <tr>
              <td class="fw-bolder"> Pax:</td>
            <td>
            {{ $reservations->premades->servicePackage->pax }}
            </td>
            <td class="fw-bolder"> Price:</td>
            <td>
            {{ $reservations->premades->servicePackage->price }}
            </td>

          </tr>
            @elseif ($reservations->reservationSelection->choice == 'customize')
                <!-- Customize Reservation Section -->
              
                  <tr>
                    <td class="fw-bolder">Package Type:</td>
                    <td>Customized</td>
                  </tr>
             
                    <tr>
                      <td class="fw-bolder">Theme: </td>
                      <td>{{ $reservations->event_theme }}</td>
                      
                      
                  </tr>
                  {{-- Guest Package --}}
                  <tr>
                    <td class="fw-bolder">Package Guest:</td>
                    <td>{{ number_format($reservations->reservationCustomize->pax  )  }}</td>
                  </tr>
                  {{-- Recommended Guest--}}
                  <tr>
                    <td class="fw-bolder">Recommended Guest:</td>
                    <td>{{ number_format(floor($reservations->reservationCustomize->price /350)  )  }}</td>
                  </tr>
                  {{-- Additional Charge --}}
                  <tr>
                    <td class="fw-bolder">Additional Charge:</td>
                    <td>{{ number_format(floor(( $reservations->reservationCustomize->pax - floor($reservations->reservationCustomize->price / 350 ))*350  )) }}</td>
                  </tr>
                   {{-- Budget --}}
                   <tr>
                    <td class="fw-bolder"> Total Amount:</td>
                    <td>{{  number_format(floor(( $reservations->reservationCustomize->pax - floor($reservations->reservationCustomize->price / 350 ))*350  )+floor($reservations->reservationCustomize->price ) )}}</td>
                </tr>
                  

                    <!-- ... other customize reservation fields ... -->
                </tr>
            @endif
                <!-- ... other package information fields ... -->
                

              </tr>

          </table>
        <hr>
        <!-- Celebrants detail -->
        <h1 class="text-start mb-5">Celebrant Information</h1>
        <table>
        <tr>
            <td class="fw-bolder"> Name:</td>
            <td>
            {{$reservations->celebrant_name}}
            </td>
          </tr>
          <td class="fw-bolder"> Age:</td>
          <td>
          {{$reservations->celebrant_age}}
          </td>

            <tr>
              <td class="fw-bolder"> Gender:</td>
            <td>
            {{$reservations->celebrant_gender}}
            </td>
            
          </tr>
          
          
        </table>
        <hr>
<!-- Menu -->
        <div class="menu-selection">
          <h1 class="text-start mb-5">Menu</h1>
          <table>

            <!-- Menu Selection -->
            <tr>
              <td class="fw-bolder ">Beef: </td>
              <td>{{ $reservations->getMenuName('beefMenu') }}</td>
              <td class="fw-bolder"> Pork: </td>
              <td>{{ $reservations->getMenuName('porkMenu') }}</td>
            </tr>


            <tr>
              <td class="fw-bolder">Chicken: </td>
              <td>{{ $reservations->getMenuName('chickenMenu') }}</td>
              <td class="fw-bolder">Vegetables: </td>
              <td>{{ $reservations->getMenuName('vegetableMenu') }}</td>
            </tr>

            <tr>
              <td class="fw-bolder">Fish: </td>
              <td>{{ $reservations->getMenuName('fishMenu') }}</td>
              <td class="fw-bolder">Seafood:</td>
              <td>{{ $reservations->getMenuName('seafoodMenu') }}</td>
            </tr>

            <tr>
              <td class="fw-bolder">Dessert: </td>
              <td>{{ $reservations->getMenuName('dessertMenu') }}</td>
              <td class="fw-bolder">Drinks: </td>
              <td>{{ $reservations->getMenuName('drinkMenu') }}</td>
            </tr>

            <tr>
              <td class="fw-bolder">Pasta: </td>
              <td>{{ $reservations->getMenuName('pastaMenu') }}</td>
            </tr>
        </table>

        <div class="btn-position justify-content-center m-5">
            <a href="{{ route('generate.pdf',$reservations->id) }}" class="btn btn-primary" target="_blank" rel="noopener noreferrer">Download PDF File</a>
        </div>
       
        <div class="fs-5 mb-4 fst-italic w-75 justify-content-center" style="text-align: center"><p>Your reservation will be reviewed within <b class=" text-success" >24hours</b>, thank you for considering Mihanz Catering as your event's caterer</p></div>
        <div class="fs-5 mb-3 fst-italic">Disclaimer: For any changes please contact the catering.</div>
    </div>
@endsection
