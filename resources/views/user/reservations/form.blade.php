@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/Services.css') }}">

<div class="premade-form">
        <h1 class="display-1 mb-5" style=" font-family: 'Playfair Display', serif;">
         Customization Form
      </h1>
      
      

<!-- Hidden input for selected_option -->



        </p>
      </div>
      </div>
      <div class="form-container">
        
        <h1 class="display-3 text-center mb-5"> More details</h1>
        <form action="{{ route('reservation.customize.submit') }}" method="post">
        @csrf

<div class=" w-100  d-flex flex-column align-items-center mb-5">
  <div class="form-check fs-5 mb-5 fw-semibold w-75 " style="text-align: justify">
    <div class="h5">Option 1</div>
    <input class="form-check-input" type="radio" name="selected_option" id="option1" value="option 1" checked>
    <label class="form-check-label" for="option1">
        The package is for <b>{{ number_format((session('pax'))) }}</b> guest, <b>{{ number_format(floor(session('budget') / 350)) }}</b> guest is recommended for your given budget,
        The buffer for additional guests is <b>10</b>. The total amount will be <b>{{ number_format((session('budget'))) }}</b>.
    </label>
</div>
<div class="form-check fs-5 fw-semibold w-75" style="text-align: justify">
    <div class="h5">Option 2</div>
    <input class="form-check-input" type="radio" name="selected_option" id="option2" value="option 2">
    <label class="form-check-label" for="option2">
        The package is for <b>{{ number_format((session('pax'))) }}</b> guests, <b>{{ number_format(floor(session('budget') / 350)) }}</b> guests are recommended for your given budget,
        additional charges will be <b>{{ number_format(((session('pax') - floor(session('budget') / 350)) * 350)) }}</b>. The buffer for additional guests is <b>10</b>. The total amount will be <b>{{ number_format((ceil((session('pax') - floor(session('budget') / 350)) * 350) + session('budget'))) }}</b>.
    </label>
</div>
</div>

<!-- Hidden input for selected_option -->
<input type="hidden" name="selected_option" id="selected_option" value="">

<!-- Celebrants detail -->
<div class=" d-flex align-items-center flex-column">
  <table>
    <tr>
      <td>
        <div class="input-group mb-3">
          <div class="fs-2">Celebrant details</div>
        </div>
      </td>
    </tr>
          @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  <tr>
              <td>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                  <input type="text" class="form-control"  name="celebrant_name" value="{{ old('celebrant_name') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                </div>
              </td>
            </tr>
  
            
            <tr>
              <td>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Age</span>
                  <input type="number" class="form-control"  name="celebrant_age" value="{{ old('celebrant_age') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" min="0" required>
                </div>
              </td>
              
            </tr>
            <tr>
              <td>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Celebrant Gender</span>
                  <select class="form-select" name="celebrant_gender" aria-label="Default select example">
                  <option value="" selected disabled>Select Gender</option>
  
                  <option value="Male" {{ old('celebrant_gender') == 'Male' ? 'selected' : '' }}>Male</option>
                  <option value="Female" {{ old('celebrant_gender') == 'Female' ? 'selected' : '' }}>Female</option>
              </select>
                </div>
              </td>
              
            </tr>
            <tr>
              <td>
                <div class="input-group mb-3">
                  <div class="fs-2">Event details</div>
                </div>

              </td>
            </tr>
            <tr>
      <td>
          <div class="input-group mb-3">
              <span class="input-group-text" id="inputGroup-sizing-default">Event Theme</span>
              <select class="form-select" name="event_theme" id="eventThemeSelect" onchange="handleThemeSelection(this)">
              <option value="" disabled selected>Select Event Theme</option>
  @if($themeSelections)
  @foreach($themeSelections ?? '' as $theme)
  <option value="{{ $theme->theme_name }}" {{ old('event_theme') == $theme->theme_name ? 'selected' : '' }}>{{ $theme->theme_name }}</option>
  @endforeach
  @endif
  <option value="other">Other</option>
              </select>
          </div>
      </td>
  </tr>
  
  <tr id="otherThemeRow" style="display: none;">
      <td>
          <div class="input-group mb-3">
              <span class="input-group-text" id="inputGroup-sizing-default">Other Theme</span>
              <input type="text" class="form-control" name="event_theme" id="otherThemeInput" value="{{ old('event_theme') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
          </div>
      </td>
  </tr>
            
            <tr>
              <td>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Event Address</span>
                  <input type="text" class="form-control"  name="venue_address" value="{{ old('venue_address') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                </div>
              </td>
              
            </tr>
            <tr>
              <td>
              <div class="input-group mb-3">
              <span class="input-group-text" id="inputGroup-sizing-default">Date of the event</span>
              <input type="date" class="form-control" id="event_date" name="event_date" value="{{ old('event_date') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
          </div>
          <span id="availability-message" style="color:red; font-size:12px;"></span>
              </td>
              
            </tr>
  
            <tr>
              <td>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Time of the event</span>
                  <input type="time" class="form-control"  name="event_time" value="{{ old('event_time') }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                </div>
              </td>
              
            </tr>
            <tr>
              <td>
                <div class="input-group mb-3">
                  <div class="fs-2">Other details</div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Allergies <i class="fs-6">(Optional)</i></label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Please specify allergies."></textarea>
                </div>
              </td>
            </tr>
          </tr>
          <tr>
            <td>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Special request <i class="fs-6">(Optional)</i></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Please specify special request"></textarea>
              </div>
            </td>
          </tr>
            <tr>
              <td>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Other concern <i class="fs-6">(Optional)</i></label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Please specify other concern."></textarea>
                </div>
              </td>
            </tr>
            
            
          </table>
</div>
<!-- Menu -->
        <div class="menu-selection">

          <table>
            <tr>
              <div class="input-group mb-3" style="width: 90%">
                <div class="fs-2">Menu</div>
              </div>
            </tr>
            <tr>
              <td>
                <div class="fs-5">Please choose only one (Pork or Beef)</div>
              </td>
            </tr>
            <tr>
              <td>
                
              <div class="input-group mb-3">
                
              <select id="menuCategory" name="menu_category" class="input-group-text" aria-label="Default select example" required>
                                <option selected value="pork">Pork</option>
                                <option value="beef">Beef</option>
                            </select>

                            <select id="porkMenuOptions" name="pork_menu" class="form-select" aria-label="Default select example" required>
                                <option selected disabled>Select Pork Menu</option>
                                @foreach($menus['pork'] as $menu)
                                    <option value="{{ $menu->id }}" {{ old('pork_menu') == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
                                @endforeach
                            </select>
                     

             
                            <select  id="beefMenuOptions" style="display: none;" name="beef_menu" class="form-select" aria-label="Default select example" required>
                                <option selected disabled>Select Beef Menu</option>
                                @foreach($menus['beef'] as $menu)
                                    <option value="{{ $menu->id }}" {{ old('beef_menu') == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
                                @endforeach
                            </select>
                       
              </td>
            </tr>

            <!-- <tr>
              <td>
              <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Beef</span>
                <select class="form-select" aria-label="Default select example">
                  <option selected></option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
              </td>
            </tr> -->
            <tr>
              <td>
                <div class="fs-5">Please choose only one (Chicken or Fish)</div>
              <div class="input-group mb-3">
              <select id="menuCategory_1" name="menu_category" class="input-group-text" aria-label="Default select example" required>
                                <option selected value="chicken">Chicken</option>
                                <option value="fish">Fish</option>
                            </select>

                            <select id="chickenMenuOptions" name="chicken_menu" class="form-select" aria-label="Default select example" required>
                                <option selected disabled>Select Chicken Menu</option>
                                @foreach($menus['chicken'] as $menu)
                                    <option value="{{ $menu->id }}" {{ old('chicken_menu') == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
                                @endforeach
                            </select>
                     

             
                            <select  id="fishMenuOptions" style="display: none;" name="fish_menu" class="form-select" aria-label="Default select example" required>
                                <option selected disabled>Select Fish Menu</option>
                                @foreach($menus['fish'] as $menu)
                                    <option value="{{ $menu->id }}" {{ old('fish_menu') == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
                                @endforeach
                            </select>
              </td>
            </tr>
            <tr>
              <td>
              <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Seafood</span>
                <select id="seafoodMenuOptions" class="form-select" name="seafood_menu" aria-label="Default select example">
                <option value="" selected disabled>Select Seafood Menu</option>
                @foreach($menus['seafood'] as $menu)
                <option value="{{ $menu->id }}" {{ old('seafood_menu') == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
                @endforeach
                </select>
              </td>
            </tr>
           
            <tr>
              <td>
              <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Vegetable</span>
                <select id="vegetablesMenuOptions" class="form-select" name="vegetable_menu" aria-label="Default select example">
                <option value="" selected disabled>Select Vegetable Menu</option>
                @foreach($menus['vegetable'] as $menu)
                <option value="{{ $menu->id }}" {{ old('vegetable_menu') == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
                @endforeach
                </select>
              </td>
            </tr>
            <tr>
              <td>
              <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Pasta</span>
                <select id="pastaMenuOptions" class="form-select" name="pasta_menu" aria-label="Default select example">
                <option value="" selected disabled>Select Pasta Menu</option>
                @foreach($menus['pasta'] as $menu)
                <option value="{{ $menu->id }}" {{ old('pasta_menu') == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
                @endforeach
                </select>
              </td>
            </tr>
            <tr>
              <td>
              <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Dessert</span>
                <select id="dessertMenuOptions" class="form-select" name="dessert_menu" aria-label="Default select example">
                <option value="" selected disabled>Select Dessert Menu</option>
                @foreach($menus['dessert'] as $menu)
                <option value="{{ $menu->id }}" {{ old('dessert_menu') == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
                @endforeach
                </select>
              </td>
            </tr>
            <tr>
              <td>
              <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Drink</span>
                <select id="drinkMenuOptions" class="form-select" name="drink_menu" aria-label="Default select example">
                <option value="" selected disabled>Select Drink Menu</option>

                @foreach($menus['drink'] as $menu)
                <option value="{{ $menu->id }}" {{ old('drink_menu') == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
                @endforeach
                </select>
              </td>
            </tr>
      

          </table>
          <table>
            <tr>
              <td>
                <div class="input-group mb-3">
                  <div class="fs-2">Additional services</div>
                </div>
              </td>
              <tr>
                <td>
                  <div class="fs-6 fst-italic">Select your desire additional services (Optional): </div>
                </td>
              </tr>
            </tr>

            <tr>
              <td>
              <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Party Entertainers</span>
                <select class="form-select" name="pe_menu" aria-label="Default select example">
                <option value="" selected >Select Party Entertainers</option>
                @foreach($additionals['pe'] as $menu)
                <option value="{{ $menu->id }}" {{ old('pe_menu') == $menu->id ? 'selected' : '' }}>{{ $menu->name }} - {{ $menu->price }}</option>
                @endforeach
                </select>
              </td>
            </tr>

            <tr>
              <td>
              <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Photo Booth</span>
                <select class="form-select" name="pb_menu" aria-label="Default select example">
                <option value="" selected >Select Photo Booth</option>
                @foreach($additionals['pb'] as $menu)
                <option value="{{ $menu->id }}" {{ old('pb_menu') == $menu->id ? 'selected' : '' }}>{{ $menu->name }} - {{ $menu->price }}</option>
                @endforeach
                </select>
              </td>
            </tr>
            <tr>
              <td>
              <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Chocolate Fountain Booth</span>
                <select class="form-select" name="cf_menu" aria-label="Default select example">
                <option value="" selected >Select Chocolate Fountain Booth</option>
                @foreach($additionals['cf'] as $menu)
                <option value="{{ $menu->id }}" {{ old('cf_menu') == $menu->id ? 'selected' : '' }}>{{ $menu->name }} - {{ $menu->price }}</option>
                @endforeach
                </select>
              </td>
            </tr>

            <tr>
              <td>
              <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Face Painting Booth</span>
                <select class="form-select" name="fp_menu" aria-label="Default select example">
                <option value="" selected >Select Face Painting Booth</option>
                @foreach($additionals['fp'] as $menu)
                <option value="{{ $menu->id }}" {{ old('fp_menu') == $menu->id ? 'selected' : '' }}>{{ $menu->name }} - {{ $menu->price }}</option>
                @endforeach
                </select>
              </td>
            </tr>

            <tr>
              <td>
              <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Cupcake Tower Booth</span>
                <select class="form-select" name="ct_menu" aria-label="Default select example">
                <option value="" selected >Select Cupcake Tower Booth</option>
                @foreach($additionals['ct'] as $menu)
                <option value="{{ $menu->id }}" {{ old('ct_menu') == $menu->id ? 'selected' : '' }}>{{ $menu->name }} - {{ $menu->price }}</option>
                @endforeach
                </select>
              </td>
            </tr>

            <tr>
              <td>
              <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Fruits Booth</span>
                <select class="form-select" name="f_menu" aria-label="Default select example">
                <option value="" selected >Select Fruits Booth</option>
                @foreach($additionals['f'] as $menu)
                <option value="{{ $menu->id }}" {{ old('f_menu') == $menu->id ? 'selected' : '' }}>{{ $menu->name }} - {{ $menu->price }}</option>
                @endforeach
                </select>
              </td>
            </tr>


              
              
</table>
  
        
        <div class="fs-5  start-100 mb-2" style="width: 90%;" style="margin-bottom: 100px">
            <div class="input-group justify-content-center"> 
            <input type="checkbox" name="agree_terms" value="1" {{ old('agree_terms') ? 'checked' : '' }}>
            
               <p class=" ms-1 mx-1"> I have read and agree to the</p><a href="" data-bs-toggle="modal" data-bs-target="#Termsandcondition" style="color: blue;"  class=" "> Terms and Condition </a> <p class="ms-1">  of Mihanz Catering</p>
          </div>
        </div>
        <div class="btn-position justify-content-center mb-3">
            <!-- Remove the modal and use a regular submit button -->
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#Submit">Submit</button>
        </div>
      </div>
      <div class="stickytotal">
      <div class="m-5" >
        Total Amount: <a class="" id="totalAmountDisplay" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            {{ number_format((session('budget'))) }}
        </a>
    </div>
        <div>
          
        </div>
      </div>
      
      
    {{-- Off CANVAS RECEIPT --}}
    <div class="offcanvas offcanvas-start " tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">RECEIPT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div>
          <table  class="table">
            <tr>
              <th>
                <p>Package type:</p>
              </th>
              <td>Cuztomize</td>
            </tr>
            <tr>
    <th>
        <p>Option Selected:</p>
    </th>
    <td id="selectedOptionDisplay">
        Option 1
    </td>
</tr>
            <tr>
              <th>
                <p>Number of guest:</p>
              </th>
              <td>{{number_format((session('pax')))}}</td>
            </tr>
            <tr>
              <th>
                <p>
                  Buffer:
                </p>
              </th>
              <td>10</td>
            </tr>
            <tr>
              <th>
               <p> Budget:</p>
              </th>
              <td>
                {{ number_format((session('budget'))) }}
              </td>
            </tr>
            <tr>
              <th>
                <p>Charge:</p>
              </th>
              <td>
                {{ number_format(((session('pax') - floor(session('budget') / 350)) * 350)) }}
              </td>
            </tr>

            <tr>
                  <th>
                    Menu
                  </th>
                  <td>
        <!-- Empty div to display selected menu items -->
        <div id="selectedMenuItems"></div>
    </td>
                </tr>

                
                <tr>
                  <th>
                    Additional Services
                  </th>
                  <td><div id="selectedServices"></div> </td>
                </tr>

            <tr class="mb-1">
              <th>
                Total Additional Services:
              </th>
            <td class=" text-decoration-underline"><div id="totalAdditionalServices">Total Additional Services: $0.00</div></td>
            </tr>
          </table>
        </div>
        
      </div>
      <div class=" position-sticky bottom-0 d-flex justify-content-center fs-4" style="background: white; height:200px" >
        Total Amount:
        
        <div id="totalAmount">Total Amount: $0.00</div>
          
      </div>
    </div>
        <!-- Submit -->
<div class="modal fade" id="Submit" tabindex="-1" aria-labelledby="SubmitLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class=" fs-5 fw-semibold">
          <table  class="table">
            <tr>
              <th>
                <p>Package type:</p>
              </th>
              <td>Cuztomize</td>
            </tr>
            <tr>
    <th>
        <p>Option Selected:</p>
    </th>
    <td id="selectedOptionDisplay_summary">
        Option 1
    </td>
</tr>
            <tr>
              <th>
                <p>Number of guest:</p>
              </th>
              <td>{{number_format((session('pax')))}}</td>
            </tr>
            <tr>
              <th>
                <p>
                  Buffer:
                </p>
              </th>
              <td>10</td>
            </tr>
            <tr>
              <th>
               <p> Budget:</p>
              </th>
              <td>
                {{ number_format((session('budget'))) }}
              </td>
            </tr>
            <tr>
              <th>
                <p>Charge:</p>
              </th>
              <td>
                {{ number_format(((session('pax') - floor(session('budget') / 350)) * 350)) }}
              </td>
            </tr>

            <tr>
                  <th>
                    Menu
                  </th>
                  <td>
        <!-- Empty div to display selected menu items -->
        <div id="selectedMenuItems_summary"></div>
    </td>
                </tr>


                <tr>
                  <th>
                    Additional Servces
                  </th>
                  <td> <p><div id="selectedServices_summary"></div></p> </td>
                </tr>

            <tr class="mb-1">
              <th>
                Total Additional Services:
              </th>
            <td class=" text-decoration-underline"><div id="totalAdditionalServices_summary">Total Additional Services: $0.00</div></td>
            </tr>

            <tr>
              <th>
                Total amount
              </th>
              <td class=" text-decoration-underline"><div id="totalAmount_summary">Total Amount: $0.00</div></td>
            </tr>
          </table>
          Are you sure to submit this form?
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>

          </form>

<!-- Terms And Condition -->
<div class="modal fade" id="Termsandcondition" tabindex="-1" aria-labelledby="TermsandconditionLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1>Terms and Condition</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
          <h2>1.RESERVATION.</h2>
          <p> Non-refundable reservation fee of 1000php is required to block your desired date. Must be made personally by the CLIENT or any authorized person. Endorsement letter may also be honored in behalf of the CLIENT <i> Ang non-refundable reservation fee na 1000php ay kinakailangan para ma-block ang iyong gustong petsa. Dapat gawin ng personal ng CLIENT o sinumang awtorisadong tao. Ang liham ng pag-endorso ay maaari ding parangalan sa ngalan ng CLIENT.</i></p>
          <h2>2.TERMS OF PAYMENT.</h2>
          <p>The client is required to settle fifty percent (50%) of the total contract cost 3 weeks before the event. CLIENT should pay cash, bank deposit or bank transfer. To : bank details and account number.<i>Kinakailangang bayaran ng kliyente ang limampung porsyento (50%) ng kabuuang halaga ng kontrata 3 linggo bago ang kaganapan. Ang CLIENT ay dapat magbayad ng cash, bank deposit o bank transfer. Para sa : mga detalye ng bangko at account number.</i></p>
              <ol type="a">
                  <li>
                      <p>Full payment must be paid on or right after the event. CLIENT should only pay in cash (for any balance and additionals made). CLIENTS who wish to pay full amount are highly encouraged to avoid hassles during and after the event.<i> Dapat bayaran ang buong bayad sa mismong araw o pagkatapos ng kaganapan. Ang CLIENT ay dapat magbayad lamang ng cash (para sa anumang balanse at mga karagdagang ginawa). Lubos na hinihikayat ang mga kliyente na gustong magbayad ng buong halaga na upang maiwasan ang mga abala sa panahon at pagkatapos ng kaganapan
                      </i></p>
                  </li>
              </ol>
          <h2>3.ACTUAL CATERING.</h2>
          <p>Inclusive of 4 hours service time. Mihanz Catering reserves the right to charge an extra amount equivalent to 10% per hour of extension of the contracted amount if the agreed end time of service is exceeded unreasonably. CLIENT will be billed for additional staff hours (100php/staff/hr) for any time extension beyond the prior agreed time.<i>Sakop ang 4 na oras na serbisyo. Inilalaan ng Mihanz Catering ang karapatang maningil ng dagdag na halaga na katumbas ng 10% kada oras ng pagpapalawig ng kinontratang halaga kung ang napagkasunduang oras ng pagtatapos ng serbisyo ay lumampas nang hindi makatwiran. Sisingilin ang CLIENT para sa karagdagang oras ng staff (100php/staff/hr) para sa anumang pagpapalawig ng oras na lampas sa naunang napagkasunduan na oras.</i></p>
          <h2>4.GUEST COUNT.</h2>
          <p> Final guest count, not subject to reduction, is due five (5) days before the event. Any additional guest after the stated period is subject to extra charges as may be imposed by Mihanz Catering. </p>
              <ol type="a">
                  <li>
                      <p> Should there be any changes to the number of guests specified in the CLIENTS original booking; the CLIENT shall notify Mihanz in advance thru the following: phone call or in person. <i>Ang panghuling bilang ng bisita, hindi napapailalim sa pagbabawas, ay dapat bayaran limang (5) araw bago ang kaganapan. Ang sinumang karagdagang bisita pagkatapos ng nakasaad na panahon ay napapailalim sa mga dagdag na singil na maaaring ipataw ng Mihanz Catering. Kung mayroong anumang mga pagbabago sa bilang ng mga bisita na tinukoy sa orihinal na booking ng CLIENTS; aabisuhan ng CLIENT si Mihanz nang maaga sa pamamagitan ng sumusunod: tawag sa telepono o nang personal.</i></p>
                  </li>
                  <li>
                      <p>Should the CLIENT failed to disclose to notify Mihanz with additional number of guests, Mihanz is not to be held liable for the insufficiency of food and any complaint that might occur. <i>Kung nabigo ang CLIENT na ipaalam kay Mihanz ang karagdagang bilang ng mga bisita, hindi mananagot si Mihanz para sa kakulangan ng pagkain at anumang reklamo na maaaring mangyari.</i></p>
                  </li>
              </ol>
              <h2>5.RENTALS.</h2>
              <p>Mihanz Catering may provide all or part the rental items for the event. However, certain items may incur restocking & cancellation fees. If Mihanz Catering arranges rentals, for the CLIENT, through a rental company, CLIENT will have to pay the rental company directly. Any loss or damage to any rentals will be billed to CLIENT after the event.<i> Maaaring ibigay ng Mihanz Catering ang lahat o bahagi ng mga paupahang bagay para sa kaganapan. Gayunpaman, maaaring magkaroon ng mga bayarin sa pag-restock at pagkansela ang ilang partikular na item. Kung ang Mihanz Catering ay nag-aayos ng mga rental, para sa CLIENT, sa pamamagitan ng isang kumpanya ng pag-upa, ang CLIENT ay kailangang magbayad nang direkta sa kumpanya ng pag-upa. Ang anumang pagkawala o pinsala sa anumang mga rental ay sisingilin sa CLIENT pagkatapos ng kaganapan.</i></p>
              <ol type="A">
                  <li>
                      <p>We encourage CLIENT to make sure that all equipment used will be packed and returned after the event. Any MIHANANZ property that will be left at the venue is a CLIENT'S responsibility. Should MIHANZ need to arrange pickup for any left equipment, it is in expense of the CLIENT or additional bill will be made. Any loss or damage will be charged to the CLIENT. <i> Hinihikayat namin ang CLIENT na tiyakin na ang lahat ng kagamitang ginamit ay maiimpake at ibabalik pagkatapos ng kaganapan. Ang anumang property ng MIHANANZ na maiiwan sa venue ay responsibilidad ng CLIENT. Kung kailangang ayusin ng MIHANZ ang pickup para sa anumang natitirang kagamitan, ito ay nasa gastos ng CLIENT o karagdagang singil ay gagawin. Ang anumang pagkawala o pinsala ay sisingilin sa CLIENT.</i></p>
                  </li>
              </ol>
              <h2>6.OTHER CHARGES.</h2>
              <p> Corkage, bond and other fees required by venues and other 3rd party suppliers are charged to client.<i>Ang corkage, bond at iba pang mga bayarin na kinakailangan ng mga venue at iba pang 3rd party na supplier ay sinisingil sa kliyente.</i></p>
              <ol type="A">
                  <li>
                      <p>Any <b>MIHANZ</b> equipment left at the venue should be returned the next day or else it will be subject to additional fee of ____ per day. Any loss or damage to MIHANZ’s property will be billed accordingly<i> Ang anumang kagamitan ng MIHANZ na naiwan sa venue ay dapat ibalik sa susunod na araw o kung hindi, ito ay sasailalim sa karagdagang bayad na ____ bawat araw. Ang anumang pagkawala o pinsala sa ari-arian ng MIHANZ ay sisingilin nang naaayon.</i></p>
                  </li>
                  <li>
                      <p><b>LEFTOVERS.</b>  All leftovers will be given to the CLIENT or authorized representative available at the time of turnover.<i>Lahat ng natirang pagkain ay ibibigay sa CLIENT o awtorisadong kinatawan na available sa oras ng turnover.</i></p>
                  </li>
                  <li>
                      <p> <b> GIFTS.</b>   CLIENT shall oversee all gifts and other personal belongings at all times.In the event of loss and/or damage,MIHANZ shall not be held liable. <i> Pangasiwaan ng CLIENT ang lahat ng regalo at iba pang personal na pag-aari sa lahat ng oras. Kung sakaling mawala at/o masira, hindi mananagot si Mihanz.</i></p>
                  </li>
                  <li>
                      <p><b>CANCELLATION BY: CLIENT / VENUE / ACTS OF GOD</b></p>
                      <p>All prepayments and deposits are returned in full, if the event is cancelled by CLIENT, the venue or by an act of God, 30 days or more, from the event date. <i>Ang lahat ng mga prepayment at deposito ay ibinabalik nang buo, kung ang kaganapan ay kinansela ng CLIENT, ang lugar o sa pamamagitan ng pagkilos ng Diyos, 30 araw o higit pa, mula sa petsa ng kaganapan.</i></p>
                      <ol type="a">
                          <li>
                              <p>If the event is canceled, fifteen (15) days or more from the event date, all prepayments and deposits are returned to CLIENT in full (less Fifty percent (50%) of the prepayment or deposit amount.)<i>Kung kinansela ang kaganapan, labinlimang (15) araw o higit pa mula sa petsa ng kaganapan, lahat ng prepayment at deposito ay ibabalik sa CLIENT nang buo (mas mababa sa Limampung porsyento (50%) ng halaga ng prepayment o deposito.)</i></p>
                          </li>
                          <li>
                              <p>If the event is canceled, less than fifteen (15) days of the event date, all deposits and prepayments are not refundable.<i> Kung kinansela ang kaganapan, wala pang labinlimang (15) araw ng petsa ng kaganapan, ang lahat ng mga deposito at prepayment ay hindi maibabalik.</i></p>
                          </li>
                          <li>
                              <p>If CATERER is able to re-book the date with a similar event, all prepayments and deposits are returned in full (less Php_________ service fee).<i>Kung ang CATERER ay makakapag-book muli ng petsa na may katulad na kaganapan, ang lahat ng mga prepayment at deposito ay ibinabalik nang buo (mas mababa ang Php_________ na bayad sa serbisyo).</i></p>
                          </li>
                      </ol>
                  </li>
                  <li>
                      <p> <b>CANCELLATION BY CATERER.</b>  CATERER reserves the right to terminate this contract for any valid reason.<i> Inilalaan ng CATERER ang karapatang wakasan ang kontratang ito para sa anumang wastong dahilan.</i></p>
                      <ol type="a">
                          <li>
                              <p>IF Mihanz Catering terminates this contract before thirty (30) day period prior to the event date, all deposits and prepayments will be returned in full within ten (10) days.<i> Kung wakasan ng Mihanz Catering ang kontratang ito bago ang tatlumpung (30) araw bago ang petsa ng kaganapan, lahat ng deposito at prepayment ay ibabalik nang buo sa loob ng sampung (10) araw.</i></p>
                          </li>
                          <li>
                              <p>IF Mihanz Catering terminates this contract within the thirty (30) day period prior to the event date, all deposits and prepayments will be returned in full within ten (10) days as well as an additional PHP____________ as penalty.<i> KUNG tatapusin ng Mihanz Catering ang kontratang ito sa loob ng tatlumpung (30) araw bago ang petsa ng kaganapan, lahat ng deposito at prepayment ay ibabalik nang buo sa loob ng sampung (10) araw pati na rin ang karagdagang PHP____________ bilang multa.</i></p>
                          </li>
                      </ol>
                  </li>
                  <li>
                      <p> <b>CHANGES. </b> This contract may not be modified orally. Any changes must be in writing and signed by all parties.<i>Ang kontratang ito ay hindi maaaring baguhin nang pasalita. Ang anumang mga pagbabago ay dapat nakasulat at nilagdaan ng lahat ng partido.</i></p>
                  </li>
              </ol>





              <div>
                
              </div>

      
      </div>
      <div class="modal-footer">
          
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Continue</button>
      </div>
    </div>
  </div>
</div>
        </div>
        
      </div>


<script>
   document.getElementById('menuCategory').addEventListener('change', function () {
    var selectedMenuCategory = this.value;

    // Hide all menu options initially
    document.getElementById('porkMenuOptions').style.display = 'none';
    document.getElementById('beefMenuOptions').style.display = 'none';

    // Show the relevant menu options based on the user's selection
    if (selectedMenuCategory === 'pork') {
        document.getElementById('beefMenuOptions').selectedIndex = 0;
        document.getElementById('porkMenuOptions').style.display = 'table-row';
    } else if (selectedMenuCategory === 'beef') {
      document.getElementById('porkMenuOptions').selectedIndex = 0;
        document.getElementById('beefMenuOptions').style.display = 'table-row';
    }
});

document.getElementById('menuCategory_1').addEventListener('change', function () {
    var selectedMenuCategory = this.value;

    // Hide all menu options initially
    document.getElementById('chickenMenuOptions').style.display = 'none';
    document.getElementById('fishMenuOptions').style.display = 'none';

    // Show the relevant menu options based on the user's selection
    if (selectedMenuCategory === 'chicken') {
      document.getElementById('fishMenuOptions').selectedIndex = 0;
        document.getElementById('chickenMenuOptions').style.display = 'table-row';
    } else if (selectedMenuCategory === 'fish') {
      document.getElementById('chickenMenuOptions').selectedIndex = 0;
        document.getElementById('fishMenuOptions').style.display = 'table-row';
    }
});
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var eventDateInput = document.getElementById('event_date');

        // Set the minimum date to today
        var today = new Date().toISOString().split('T')[0];
        eventDateInput.setAttribute('min', today);

        // Set the minimum date to 7 days from today
        var sevenDaysLater = new Date();
        sevenDaysLater.setDate(sevenDaysLater.getDate() + 5);
        var minDate = sevenDaysLater.toISOString().split('T')[0];
        eventDateInput.setAttribute('min', minDate);

        // Add an event listener to the date input
        eventDateInput.addEventListener('change', function () {
            // Additional logic can be added here if needed
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
    $('#event_date').on('change', function () {
        var selectedDate = $(this).val();

        $.ajax({
            url: "{{ route('check.date.availability') }}",
            method: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "event_date": selectedDate,
            },
            success: function (response) {
                if (response.available) {
                    // The date is available, remove the error message
                    $('#availability-message').text('');
                } else {
                    // The date is not available, display the error message
                    $('#availability-message').text('Date is not available. Please choose another date.');
                }
            },
            error: function (error) {
                console.error('Error checking date availability:', error);
                // Display a generic error message if there's an issue with the request
                $('#availability-message').text('Error checking date availability. Please try again.');
            }
        });
    });
});
</script>
            
<script>
    function handleThemeSelection(select) {
        var otherThemeInput = document.getElementById('otherThemeInput');
        var otherThemeRow = document.getElementById('otherThemeRow');

        if (select.value === 'other') {
            otherThemeInput.required = true;
            otherThemeRow.style.display = 'table-row';
        } else {
            otherThemeInput.required = false;
            otherThemeInput.value = '';  // Clear the input field
            otherThemeRow.style.display = 'none';
        }
        
        // If the selected value is not "other", update the input with the selected theme
        if (select.value !== 'other') {
            otherThemeInput.value = select.value;
        }
    }
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Set the initial value of the hidden input field based on the default checked radio button
    var selectedOption = document.querySelector('input[name="selected_option"]:checked');
    document.getElementById('selected_option').value = selectedOption ? selectedOption.value : '';

    // Add event listeners to update the hidden input field when the radio buttons are clicked
    document.querySelectorAll('input[name="selected_option"]').forEach(function (radio) {
        radio.addEventListener('change', function () {
            document.getElementById('selected_option').value = this.value;
        });
    });
});
</script>


<script>
  function updateSelectedMenu() {
    var selectedMenu = "";

    // Get selected values and text from dropdowns
    var porkMenuValue = $("#porkMenuOptions").val();
    var beefMenuValue = $("#beefMenuOptions").val();
    var chickenMenuValue = $("#chickenMenuOptions").val();
    var seafoodMenuValue = $("#seafoodMenuOptions").val();
    var fishMenuValue = $("#fishMenuOptions").val();
    var vegetablesMenuValue = $("#vegetablesMenuOptions").val();
    var pastaMenuValue = $("#pastaMenuOptions").val();
    var dessertMenuValue = $("#dessertMenuOptions").val();
    var drinkMenuValue = $("#drinkMenuOptions").val();

    // Check if a menu is selected in each category before adding it to the selected menu string
    if (porkMenuValue && porkMenuValue !== "") {
        selectedMenu += "<b>Pork:</b> <br> " + $("#porkMenuOptions option:selected").text() + "<br> <br>";
    }
    if (beefMenuValue && beefMenuValue !== "") {
        selectedMenu += "<b>Beef:</b> <br> " + $("#beefMenuOptions option:selected").text() + "<br> <br>";
    }
    if (chickenMenuValue && chickenMenuValue !== "") {
        selectedMenu += "<b>Chicken:</b> <br> " + $("#chickenMenuOptions option:selected").text() + "<br> <br>";
    }
    if (seafoodMenuValue && seafoodMenuValue !== "") {
        selectedMenu += "<b>Seafood:</b> <br> " + $("#seafoodMenuOptions option:selected").text() + "<br> <br>";
    }
    if (fishMenuValue && fishMenuValue !== "") {
        selectedMenu += "<b>Fish:</b> <br> " + $("#fishMenuOptions option:selected").text() + "<br> <br>";
    }
    if (vegetablesMenuValue && vegetablesMenuValue !== "") {
        selectedMenu += "<b>Vegetable:</b> <br> " + $("#vegetablesMenuOptions option:selected").text() + "<br> <br>";
    }
    if (pastaMenuValue && pastaMenuValue !== "") {
        selectedMenu += "<b>Pasta:</b> <br> " + $("#pastaMenuOptions option:selected").text() + "<br> <br>";
    }
    if (dessertMenuValue && dessertMenuValue !== "") {
        selectedMenu += "<b>Dessert:</b> <br> " + $("#dessertMenuOptions option:selected").text() + "<br> <br>";
    }
    if (drinkMenuValue && drinkMenuValue !== "") {
        selectedMenu += "<b>Drink:</b> <br> " + $("#drinkMenuOptions option:selected").text() + "<br> <br>";
    }
    // Append other menu items as needed

    // Update the content of the selected menu div
    $("#selectedMenuItems").html(selectedMenu);
    $("#selectedMenuItems_summary").html(selectedMenu);
}

// Call the updateSelectedMenu function whenever a menu dropdown value changes
$("#porkMenuOptions, #beefMenuOptions, #chickenMenuOptions, #seafoodMenuOptions, #fishMenuOptions, #vegetablesMenuOptions, #pastaMenuOptions, #dessertMenuOptions, #drinkMenuOptions").change(function () {
    updateSelectedMenu();
});

// Call the function initially to display any pre-selected menu items
updateSelectedMenu();

</script>


<script>
 function updateSelectedServices() {
    var selectedServices = "";

    // Get selected values and text from additional service dropdowns
    var partyEntertainersValue = $("select[name='pe_menu']").val();
    var photoBoothValue = $("select[name='pb_menu']").val();
    var chocolateFountainValue = $("select[name='cf_menu']").val();
    var facePaintingValue = $("select[name='fp_menu']").val();
    var cupcakeTowerValue = $("select[name='ct_menu']").val();
    var fruitsValue = $("select[name='f_menu']").val();

    // Append selected additional services to the string
    if (partyEntertainersValue && partyEntertainersValue !== "") {
        selectedServices += "<b>Party Entertainers:</b> <br> " + $("select[name='pe_menu'] option:selected").text() + "<br> <br>";
    } 
    if (photoBoothValue && photoBoothValue !== "") {
        selectedServices += "<b>Photo Booth:</b> <br> " + $("select[name='pb_menu'] option:selected").text() + "<br> <br>";
    }
    if (chocolateFountainValue && chocolateFountainValue !== "") {
        selectedServices += "<b>Chocolate Fountain:</b> <br> " + $("select[name='cf_menu'] option:selected").text() + "<br> <br>";
    }
    if (facePaintingValue && facePaintingValue !== "") {
        selectedServices += "<b>Face Painting:</b> <br> " + $("select[name='fp_menu'] option:selected").text() + "<br> <br>";
    }
    if (cupcakeTowerValue && cupcakeTowerValue !== "") {
        selectedServices += "<b>Cupcake Tower:</b> <br> " + $("select[name='ct_menu'] option:selected").text() + "<br> <br>";
    }
    if (fruitsValue && fruitsValue !== "") {
        selectedServices += "<b>Fruits:</b> <br> " + $("select[name='f_menu'] option:selected").text() + "<br> <br>";
    }
    // Append other additional services as needed

    // Update the content of the selected services div
    $("#selectedServices").html(selectedServices);
    $("#selectedServices_summary").html(selectedServices);

    // Calculate the total additional services price
    var totalAdditionalServicesPrice = 0;
    $('select[name^="pe_menu"], select[name^="pb_menu"], select[name^="cf_menu"], select[name^="fp_menu"], select[name^="ct_menu"], select[name^="f_menu"]').each(function () {
        var optionText = $(this).find('option:selected').text();
        var priceIndex = optionText.lastIndexOf('-'); // Find the position of the price in the option text
        var priceText = optionText.slice(priceIndex + 1).trim(); // Extract the price part of the text
        var price = parseFloat(priceText.replace(/[^\d.-]/g, '')); // Remove non-numeric characters except '.' and '-' and convert to float
        if (!isNaN(price)) {
            totalAdditionalServicesPrice += price;
        }
    });

    // Update the total additional services display
    $('#totalAdditionalServices').html('₱' + totalAdditionalServicesPrice.toFixed(2));
    $('#totalAdditionalServices_summary').html('₱' + totalAdditionalServicesPrice.toFixed(2));

    // Calculate the total amount including reservation amount and additional services
    updateTotalAmount();
}

function updateTotalAmount() {
    var selectedOption = $("input[name='selected_option']:checked").val();
    var packagePrice = 0;

    // Determine the package price based on the selected option
    if (selectedOption === "option 1") {
      packagePrice = parseFloat('{{ number_format(session("budget"), 2, '.', '') }}');
    } else if (selectedOption === "option 2") {
      packagePrice = parseFloat('{{ number_format(ceil((session("pax") - floor(session("budget") / 350)) * 350) + session("budget"), 2, '.', '') }}');
    }
    

    // Calculate the total amount including reservation amount and additional services
    var totalAdditionalServicesPrice = parseFloat($('#totalAdditionalServices').html().replace(/[^\d.-]/g, ''));

    var totalAmount = packagePrice + totalAdditionalServicesPrice;

    // Update the total amount in totalAmountDisplay and totalAmount
    $('#totalAmount').html('₱' + totalAmount.toFixed(2));
    $('#totalAmount_summary').html('₱' + totalAmount.toFixed(2));
    $('#totalAmountDisplay').html('₱' + totalAmount.toFixed(2));
}

// Call the updateSelectedServices function whenever an additional service dropdown value changes
$("select[name='pe_menu'], select[name='pb_menu'], select[name='cf_menu'], select[name='fp_menu'], select[name='ct_menu'], select[name='f_menu']").change(function () {
    updateSelectedServices();
});

// Call the function initially to display any pre-selected additional services
updateSelectedServices();

// Call the updateTotalAmount function whenever the selected option changes
$("input[name='selected_option']").change(function () {
    updateTotalAmount();
});

</script>

<script>
  function updateSelectedOptionDisplay() {
    var selectedOption = $("input[name='selected_option']:checked").val();
    $("#selectedOptionDisplay").text(selectedOption);
    $("#selectedOptionDisplay_summary").text(selectedOption);
}

// Call the updateSelectedOptionDisplay function whenever the selected option changes
$("input[name='selected_option']").change(function () {
    updateSelectedOptionDisplay();
});

// Call the function initially to display the default selected option
updateSelectedOptionDisplay();
</script>
@endsection
