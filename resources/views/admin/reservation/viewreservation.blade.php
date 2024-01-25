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
                  <thead>
                    <tr>
                      <th scope="row">Name:</th>
                      <td>{{ $event['name'] }}</td>
                      <th scope="row">Date of Event:</th>
                      <td>{{ $event['event_date'] }}</td>
                    </tr>
                    <tr>
                      <th scope="row">Email:</th>
                      <td>{{ $event['email'] }}</td>
                      <th scope="row">Time of Event:</th>
                      <td>{{ $event['event_time'] }}</td>
                    </tr>
                    <tr>
                      <th scope="row" >Event Location:</th>
                      <td colspan="4">{{ $event['venue_address'] }}</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row" colspan="4"  class=" fs-2">Details</th> 
                    </tr>
                    <tr>
                      <th scope="row">Event:</th>
                      <td>@if ($event['choice'] == 'premade' && $event['service_category'])
                        {{ $event['service_category'] }}
                        @elseif ($event['choice'] == 'customize' && $event['category_name'])
                        {{ $event['category_name'] }}
                        @endif</td>
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
                      <th scope="row" colspan="4"  class="fs-2 ">Menu</th> 
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
                    
                    <tr class="mt-10">
                      <th scope="row"  class="fs-6 ">Reservation Status</th> 
                      <th scope="row"  class="fs-6 ">{{ $event['reservation_status'] }}</th>
                    </tr>

                    <tr>
                      
                    </tr>

                  </tbody>
                </table>
                
               </div>
              </div>
              <div class="modal-footer">
                
                <button type="submit" class="btn btn-primary">Accept</button>
                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Decline</button>
              </div>
            </div>
          </div>
        </div>