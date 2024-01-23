@extends('layouts.app')


@section('content')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
   
<div class="landing_Page">
        <div class="filter">

      
        <h1 class="display-1 ">Mihanz Catering Service</h1>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-success  btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Log In
  </button>
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
          <li><a href="Services.html">Services</a></li>
          <li><a href="Menu.html">Menu</a></li>
          <li><a href="Themes.html">Themes</a></li>
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
        <div id="menu-btn"><button type="button" class="btn btn-primary btn-lg"> <a href="Menu.html">Check out our Menu</a> </button></div>

        
    </div>
    <!-- Calendar -->
    <div class="calendar-Date">

        <div>
            <h1>Mark your Dates</h1>
        <p>Here is our Available Event dates <br/>
        
          <b id="green">Green</b> means its Available</p>
        <p><b id="red">Red</b> means it's Occupied</p>
        </div>
        
        <div class="calendar">
          <table class="table table-dark table-striped text-center">
            <tr>
              <th colspan="7">Month/Year</th>
              
            </tr>
            <tr>
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <td>5</td>
              <td>6</td>
              <td>7</td>
            </tr>
            <tr>
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <td>5</td>
              <td>6</td>
              <td>7</td>
            </tr>
            <tr>
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <td>5</td>
              <td>6</td>
              <td>7</td>
            </tr>
            <tr>
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <td>5</td>
              <td>6</td>
              <td>7</td>
            </tr>
            <tr>
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <td>5</td>
              <td>6</td>
              <td>7</td>
            </tr>
            <tr>
             <td colspan="7"></td>
            </tr>
          </table>
        </div>
        </div>       
   
   
    
        @endsection