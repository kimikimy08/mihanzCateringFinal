<!-- Inside resources/views/admin/dashboard.blade.php -->

@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<h1 class="display-1">Dashboard</h1>
<div class="Dashboard-container">
  <div class="Dashboard">
    <ul>
      <li><a href="{{ url('/admin/reservation/pending') }}">Pending Request <p class="mt-4 fs-1">{{ $pendingReservationsCount }}</p></a></li>
      <li><a href="{{ url('/admin/reservation/approved') }}">Approved Request <p class="mt-4 fs-1">{{ $approvedReservationsCount }}</p></a></li>
      <li><a href="{{ url('/admin/reservation/incoming') }}">Incoming Events <p class="mt-4 fs-1">{{ $futureReservationsCount }}</p></a></li>
      <li><a href="{{ url('/admin/reservation/history') }}">Past Events <p class="mt-4 fs-1">{{ $pastReservationsCount }}</p></a></li>
      <li><a href="{{ url('/admin/user') }}">Users <p class="mt-4 fs-1">{{ $userCount }}</p></a></li>
    </ul>
  </div>
  <div class="calendar-container">
    <div id="calendar"></div>
    <div class="calendar-event">
      <div class="h5">Calendar Events Info</div>
      <section>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Reservation ID </th>
              <th scope="col">Date</th>
              <th scope="col">Celebrant Name</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($futureEvents as $futureEvent)
            <tr>
              <th scope="row">{{ $futureEvent['id'] }}</th>
              <td>{{ $futureEvent['start'] }}</td>
              <td>{{ $futureEvent['celebrant_name'] }}</td>
              <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Viewreservation{{ $futureEvent['id'] }}">View</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <!-- Modal -->
      </section>
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
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <th scope="row" class=" fs-1" style="font-weight: 500;">Client Information</th>
                  <td></td>
                  <td></td>
                  <td></td>
                    <tr>
                      <th scope="row">Name:</th>
                      <td id="modalName">{{ $event['name'] }}</td>
                      <td></td>
                      <td></td>
                    </tr>
                    
                    <tr>
                      <th scope="row">Email:</th>
                      <td>{{ $event['email'] }}</td>
                      <td></td>
                      <td></td>
                      
                    </tr>
                    
                    
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row" class=" fs-1" style="font-weight: 500;">Celebrant Information</th>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
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
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row" class=" fs-1" style="font-weight: 500;">Event Information</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row">Event:</th>
                      <td>@if ($event['choice'] == 'premade' && $event['service_category'])
                        {{ $event['service_category'] }}
                        @elseif ($event['choice'] == 'customize' && $event['category_name'])
                        {{ $event['category_name'] }}
                        @endif
                      </td>
                      <td></td>
                      <td></td>
                      
                    </tr>
                    <tr>
                      <th scope="row">Event Location:</th>
                      <td colspan="4">{{ $event['venue_address'] }}</td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row">Date:</th>
                      <td id="modalDate">{{ $event['event_date'] }}</td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row">Time:</th>
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
                      <td>@if ($event['choice'] == 'premade' && $event['premade_pax'])
                        {{ $event['premade_pax'] }}
                        @elseif ($event['choice'] == 'customize' && $event['customize_pax'])
                        {{ $event['customize_pax'] }}
                        @endif</td>
                        <td></td>
                      <td></td>
                      
                    </tr>
                    <tr>
                      <th scope="row">Budget:</th>
                      <td>@if ($event['choice'] == 'premade' && $event['premade_price'])
                        {{ $event['premade_price'] }}
                        @elseif ($event['choice'] == 'customize' && $event['customize_price'])
                        {{ $event['customize_price'] }}
                        @endif</td>
                        <td></td>
                      <td></td>
                    </tr>
                    
                    <tr>
                      <th scope="row">Package Type:</th>
                      <td>@if ($event['choice'] == 'premade' && $event['premade_package'])
                        {{ $event['premade_package'] }}
                        @elseif ($event['choice'] == 'customize')
                        Customized
                        @endif</td>
                        <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row" class=" fs-1" style="font-weight: 500;">Menu</th>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
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
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row" class=" fs-1" style="font-weight: 500;">Other Information</th>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th>Allergies</th>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th>Special Request</th>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th>Other Concern</th>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row" class=" fs-1" style="font-weight: 500;">Additional services</th>
                      <td scope="row" class=" fs-3" style="font-weight: 500;"></td>
                      <td></td>
                      <td scope="row" class=" fs-3" style="font-weight: 500;"> Price</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th>
                        Party Entertainers:
                      </th>
                   
                      <td>
                        2 Clowns with funny hosting, game handler and magic show
                      </td>
                      <td></td>
                      <td>1350.00</td>
                   
                      
                    </tr>
                    <tr>
                      <th>
                        Photo Booth:
                      </th>
                      <td>
                        Unlimited picture for 2 hours with frame and customized template
                      </td>
                      <td></td>
                      <td>1350.00</td>
                      
                    </tr>
                    <tr>
                      <th>
                        Chocolate Fountain Booth:
                      </th>
                      <td>
                        Chocolate fountain only
                      </td>
                    <td></td>
                    <td>1350.00</td>
                      
                    </tr>
                    <tr>
                      <th>
                        Face Painting Booth:
                      </th>
                      <td>
                        1 Face Painter + Unlimited Paint for 2 hrs with your chosen design
                      </td>
                    <td></td>
                    <td>1350.00</td>
                      
                    </tr>
                    <tr>
                      <th>
                        Cupcake Tower Booth:
                      </th>
                      <td>
                        Plain Chocolate Moist Cupcake
                      </td>
                    <td></td>
                    <td>3000.00</td>
                      
                    </tr>
                    <tr>
                      <th>
                        Fruits Booth:
                      </th>
                      <td>
                        Kiwi, Blueberry, Oranges, Watermelons, Strawberries and Mango
                      </td>
                    <td></td>
                    <td>100.00</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    
                  
                </table>
                <div class="w-50 total-table">
                  <table class="table table-bordered ">
                    <tr>
{{-- Premade --}}
                      {{-- <td class="fw-semibold">
                        Price:
                      </td>
                      <td>1000</td> --}}

{{-- Customize --}}
                      <td class="fw-semibold">
                        Budget:
                      </td>
                      <td>1000</td>
                     
                    </tr>
                     <tr>
                      
                      <td class="fw-semibold">
                        Total Additional Services:
                      </td>
                      <td>1000</td>
                      
                    </tr>
                   
                    <tr>
{{-- Customize --}}
                      <td class="fw-semibold">
                       Charge:
                      </td>
                      <td>1000</td>
                      
                    </tr>
                    <tr>
                      
                      <td class="fw-semibold text-bg-secondary">
                       Total Amount:
                      </td>
                      <td class="text-bg-secondary">1000</td>
                      
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
      @endforeach
      <div class="section-footer"></div>
    </div>
  </div>
</div>
<style>
  .calendar-Date{
    /* background-color: gainsboro; */
  }
  #calendar{
    background:rgb(199, 199, 199);
  }
  .fc-daygrid-day-number {
    color: #000 !important;
    background:rgba(199, 199, 199, 0) !important;
    text-shadow: 0px 1px 3px black;
}
  .fc-media-screen {
    width: 90%;
    height: 500px;
    margin: auto;
    margin-top: 20px;
    margin-bottom: 20px;
}
  #calendar td{
  border: solid 1px black;
  }
  #calendar th{
  border: solid 1px black;
  background-color: forestgreen;
  
  }
  #calendar th a{
    color: snow;
  text-shadow: -1px 4px 8px black;
  
  }
  .fc-col-header-cell-cushion{
    color: snow !important;
  text-shadow: -1px 4px 8px black !important;
  background-color: forestgreen !important;
  }
  .fc .fc-toolbar.fc-header-toolbar {
  margin-bottom:0;
  text-shadow: 0px 1px 3px black;
}
.fc .fc-toolbar.fc-header-toolbar h2{
margin-left: 1em;
}
  .fc-h-event{
    background: rgba(255, 0, 0, 0.589) !important;
  }
  #calendar a{
    color: black;
    text-decoration: none;
    text-shadow: 0px 1px 3px black;
  }
  #calendar button{
    text-transform: capitalize
  }
 </style>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: @json($events),
      eventClick: function(info) {
        // Open the modal when an event is clicked
        $('#Viewreservation' + info.event.id).modal('show');
      },
      eventMouseEnter: function(info) {
        // Show description when mouse enters an event
        var description = info.event.extendedProps.description;
        if (description) {
          $('#calendar').append('<div id="event-description">' + description + '</div>');
        }
      },
      eventMouseLeave: function(info) {
        // Remove description when mouse leaves an event
        $('#event-description').remove();
      }
    });

    calendar.render();
  });
</script>
<script>
  // Function to populate modal dynamically
  function populateModal(eventDetails) {
    // Use jQuery or plain JavaScript to update modal content
    $('#ViewreservationLabel').text('Event Information');
    $('#modalName').text('Name: ' + eventDetails.celebrant_name);
    $('#modalDate').text('Date: ' + eventDetails.event_date);
    $('#modalEvent').text(eventDetails.event_name); // Add this line for each property
    $('#modalTheme').text(eventDetails.event_theme); // Example: Add this line for each property
    // ... Populate other modal elements similarly
  }
  
</script>
@endsection