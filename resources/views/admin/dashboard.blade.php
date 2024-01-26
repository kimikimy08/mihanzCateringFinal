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
                  <thead>
                    <tr>
                      <th scope="row">Name:</th>
                      <td id="modalName">{{ $event['name'] }}</td>
                      <th scope="row">Date:</th>
                      <td id="modalDate">{{ $event['event_date'] }}</td>
                    </tr>
                    <tr>
                      <th scope="row">Email:</th>
                      <td>{{ $event['email'] }}</td>
                      <th scope="row">Time:</th>
                      <td>{{ $event['event_time'] }}</td>
                    </tr>
                    <tr>
                      <th scope="row">Event Location:</th>
                      <td colspan="4">{{ $event['venue_address'] }}</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row" colspan="4" class=" fs-2">Details</th>
                    </tr>
                    <tr>
                      <th scope="row">Event:</th>
                      <td>@if ($event['choice'] == 'premade' && $event['service_category'])
                        {{ $event['service_category'] }}
                        @elseif ($event['choice'] == 'customize' && $event['category_name'])
                        {{ $event['category_name'] }}
                        @endif
                      </td>
                      <th scope="row">Theme</th>
                      <td>{{ $event['event_theme'] }}</td>
                    </tr>
                    <tr>
                      <th scope="row">Pax:</th>
                      <td>@if ($event['choice'] == 'premade' && $event['premade_pax'])
                        {{ $event['premade_pax'] }}
                        @elseif ($event['choice'] == 'customize' && $event['customize_pax'])
                        {{ $event['customize_pax'] }}
                        @endif</td>
                      <th scope="row">Budget:</th>
                      <td>@if ($event['choice'] == 'premade' && $event['premade_price'])
                        {{ $event['premade_price'] }}
                        @elseif ($event['choice'] == 'customize' && $event['customize_price'])
                        {{ $event['customize_price'] }}
                        @endif</td>
                    </tr>
                    <tr>
                      <th scope="row">Celebrant Name:</th>
                      <td>{{ $event['celebrant_name'] }}</td>
                      <th scope="row">Celebrant Age:</th>
                      <td>{{ $event['celebrant_age'] }}</td>
                    </tr>
                    <tr>
                      <th scope="row">Celebrant Gender:</th>
                      <td>{{ $event['celebrant_gender'] }}</td>
                      <th scope="row">Package Type:</th>
                      <td>@if ($event['choice'] == 'premade' && $event['premade_package'])
                        {{ $event['premade_package'] }}
                        @elseif ($event['choice'] == 'customize')
                        Customized
                        @endif</td>
                    </tr>
                    <tr>
                      <th scope="row" colspan="4" class="fs-2 ">Menu</th>
                    </tr>
                    <tr>
                      <th scope="row">Pork:</th>
                      <td>{{ $event['pork_menu'] }}</td>
                      <th scope="row">Beef:</th>
                      <td>{{ $event['beef_menu'] }}</td>
                    </tr>
                    <tr>
                      <th scope="row">Chicken:</th>
                      <td>{{ $event['chicken_menu'] }}</td>
                      <th scope="row">Fish:</th>
                      <td>{{ $event['fish_menu'] }}</td>
                    </tr>
                    <tr>
                      <th scope="row">Seafood:</th>
                      <td>{{ $event['seafood_menu'] }}</td>
                      <th scope="row">Vegetables:</th>
                      <td>{{ $event['vegetable_menu'] }}</td>
                    </tr>
                    <tr>
                      <th scope="row">Pasta:</th>
                      <td>{{ $event['pasta_menu'] }}</td>
                      <th scope="row">Dessert:</th>
                      <td>{{ $event['dessert_menu'] }}</td>
                    </tr>
                    <tr>
                      <th scope="row">Drink:</th>
                      <td>{{ $event['drink_menu'] }}</td>
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
      <div class="section-footer"></div>
    </div>
  </div>
</div>

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