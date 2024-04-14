{{-- <!-- View Request detail -->
<div class="modal fade" id="Viewreservation{{ $event['id'] }}" tabindex="-1" aria-labelledby="ViewreservationLabel{{ $event['id'] }}" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="ViewreservationLabel{{ $event['id'] }}">Request Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
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
                    <tr>
                      <th>
                        Contact Number:
                      </th>
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
                      <th scope="row"> Name:</th>
                      <td>{{ $event['celebrant_name'] }}</td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row"> Age:</th>
                      <td>{{ $event['celebrant_age'] }}</td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row"> Gender:</th>
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
                        @endif</td>
                        <td></td>
                        <td></td>
                      
                    </tr>
                    <tr>
                      <th scope="row" >Event Location:</th>
                      <td>{{ $event['venue_address'] }}</td>
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
                      <th scope="row">Date of Event:</th>
                      <td>{{ $event['event_date'] }}</td>
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
                    <tr class="mt-10">
                      <th scope="row"  class="fs-6 ">Reservation Status</th> 
                      <th scope="row"  class="fs-6 ">{{ $event['reservation_status'] }}</th>
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
              </div>
          </div>
        </div> --}}
        <!-- View Request detail -->
<div class="modal fade" id="Viewreservation{{ $event['id'] }}" tabindex="-1" aria-labelledby="ViewreservationLabel{{ $event['id'] }}" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="ViewreservationLabel{{ $event['id'] }}">Request Detail</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div>
        <table class="table">
{{-- Client Information --}}
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

            <tr>
              <th>Allergies:</th>
              <td>
                  {{-- Info goes here --}}
              </td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th>Special Request:</th>
              <td>
                  {{-- Info goes here --}}
              </td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th>
                Other Concern
              </th>
              <td>
                {{-- Info goes here --}}
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

{{-- Additional services --}}
            <tr>
              <th scope="row" class=" fs-1" style="font-weight: 500;">Additional services</th>
              <td scope="row" class=" fs-3" style="font-weight: 500;"></td>
              <td></td>
              <td scope="row" class=" fs-3" style="font-weight: 500;"> Price</td>
            </tr>

            <tr>
              <th>Party Entertainers:</th>
              <td>2 Clowns with funny hosting, game handler and magic show</td>
              <td></td>
              <td>1350.00</td>
            </tr>

            <tr>
              <th>Photo Booth:</th>
              <td>Unlimited picture for 2 hours with frame and customized template</td>
              <td></td>
              <td>1350.00</td>
            </tr>

            <tr>
              <th>Chocolate Fountain Booth:</th>
              <td>Chocolate fountain only</td>
              <td></td>
              <td>1350.00</td>
            </tr>

            <tr>
              <th>Face Painting Booth:</th>
              <td>1 Face Painter + Unlimited Paint for 2 hrs with your chosen design</td>
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
  <td>100.00</td>
  <td></td>
  </tr>
  <tr>
  
    <td></td>
    <th>Budget:</th>
    <td>100.00</td>
    <td></td>
    </tr>
    <tr>
     
      <td></td>
      <th class=" border-black">Charge:</th>
      <td class=" border-black">100.00</td>
      <td></td>
      </tr>
      <tr>
    
        <td></td>
        <th >Total Amount:</th>
        <td >100.00</td>
        <td></td>
        </tr>
        <tr>
          <td></td>
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


          </tbody>
        </table>
        
       </div>
      </div>
      <div class="modal-footer">
        
        <!-- <button type="submit" class="btn btn-primary">Accept</button>
        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Decline</button> -->
      </div>
    </div>
  </div>
</div>