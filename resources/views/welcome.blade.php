@extends('layouts.app')


@section('content')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
   
<div class="landing_Page">
        <div class="filter">

      
        <h1 class="display-1 ">Mihanz Catering Service</h1>
        <!-- Button trigger modal -->
        @guest
        @if (Route::has('login'))
<button type="button" class="btn btn-success  btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
<a class=" {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
  </button>
  @endif
  @else
            @if (auth()->check())
            @if (auth()->user()->hasRole('admin'))
            <button type="button" class="btn btn-success  btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <a  href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
  </button>
            @else
            <button type="button" class="btn btn-success  btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <a  href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a>
  </button>
            @endif
          </li>
          @endif
  @endguest
</div>
    </div>
 
        <!-- Mihanz Information -->
        <div class="mihanz-info">
          <h1 class="display-5">
              Mihan'z Catering 
              <p id="p1">Since 2015</p>
          
          </h1>
          <p id="p2">Mihanz Catering is a food service business that has been serving its clients for 8 years and continues, located at 181 Calderon St.Subic Baliwag ,Bulacan, San Rafael, Philippines, 3010. founded in 2015, the business started through Mr. Antonio Javier’s passion for cooking and his business partner Golando Masi saw it as an opportunity. He offered Antonio Javier, who happened to be his brother- in-law, to finance the business. Antonio agreed and the business started as a small canteen. As a fellow business minded, Mr. Antonio Javier already set his plans and aiming to make a catering which after years of hard work was finally achieved, the business was named after Mirai Javier “Mi” whom is Antonio’s daughter and Yohanz Masi who is the son of Golando both combined to form the now “Mihanz Catering”.</p>
      </div>
    <!-- selection -->
    <div class="selection">
      <h1 class="display-2 text-center">Things We Offer</h1>
        <ul>
          <li><a href="{{ url('/services') }}">Services</a></li>
          <li><a href="{{ url('/menus') }}">Menu</a></li>
          <li><a href="{{ url('/themes') }}">Themes</a></li>
        </ul>




    </div>

    <!-- Reservation Information -->
    <div class="reservation-Info">
        <h1 class="display-4">
            Ready to make your reservation? 
        </h1>
        <ul>
            <li>Amazing Deals</li>
            <li>Make your reservation within 7 days for preparations</li>
            <li>We can customize your package base on your budget</li>
            <li>Check out our menu below</li>
        </ul>
        <div id="menu-btn"><button type="button" class="btn btn-primary btn-lg"> <a href="{{ url('/menus') }}">Check out our Menu</a> </button></div>

        
    </div>
    <!-- Calendar -->
    <div class="calendar-Date">

        <!-- <div>
            <h1>Mark your Dates</h1>
        <p>Here is our Available Event dates <br/>
        
          <b id="green">Green</b> means its Available</p>
        <p><b id="red">Red</b> means it's Occupied</p>
        </div> -->
        
        <div id="calendar"></div>
        </div>       
   

        <script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: @json($futureEvents),
      height: '70vh', // Set the height of the calendar
      width: '80%',   // Set the width of the calendar to 100% of the container
      eventRender: function(info) {
        var availability = info.event.extendedProps.availability;

        // Customize the content of the event
        var eventContent = '<div style="text-align: center; padding: 5px;">';
        eventContent += '<b>' + info.event.title + '</b><br>';
        eventContent += 'Availability: ' + availability + '<br>';
        // Add more details if needed

        eventContent += '</div>';
        
        // Set the HTML content to the event
        info.el.innerHTML = eventContent;

        // Apply styles based on availability
        if (availability === 'available') {
          info.el.style.backgroundColor = 'green';
        } else {
          info.el.style.backgroundColor = 'red';
        }

        // Show availability as a title on the event
        info.el.title = 'Availability: ' + availability;
      },
      eventClick: function(info) {
        // Handle event click if needed
        console.log(info);
      }
    });

    calendar.render();
  });
</script>
    
        @endsection