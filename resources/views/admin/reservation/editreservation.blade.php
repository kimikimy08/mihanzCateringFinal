<!-- Edit Request detail -->
<div class="modal fade" id="Editreservation{{ $event['id'] }}" tabindex="-1" aria-labelledby="EditreservationLabel{{ $event['id'] }}" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditreservationLabel{{ $event['id'] }}">Edit Request Detail</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('/admin/reservation/' . $event['id']) }}" method="post" style="overflow: scroll" >
        @csrf
        @method('PUT')
        <div class="modal-body ">
          {{-- start table --}}
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
                  <td><input type="text" name="name" value="{{ $event['name'] }}" class="form-control" readonly></td>
                  <td></td>
                  <td></td>
                </tr>
                
                <tr>
                  <th scope="row">Email:</th>
                  <td><input type="email" name="email" value="{{ $event['email'] }}" class="form-control" readonly></td>
                  <td></td>
                  <td></td>
                </tr>

                <tr>
                  <th scope="row">Contact No.:</th>
                  <td><input type="tel" name="contact" value="" class="form-control" readonly></td>
                  <td></td>
                  <td></td> 
                </tr>
               
{{-- Celebrant Information  --}}
                <tr>
                  <th scope="row" class=" fs-1" style="font-weight: 500;">Celebrant Information</th>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <th scope="row">Name:</th>
                  <td><input type="text" name="celebrant_name" value="{{ $event['celebrant_name'] }}" class="form-control"></td>
                  <td></td>
                  <td></td>
                 
                </tr>
                <tr>
                  <th scope="row">Age:</th>
                  <td><input type="text" name="celebrant_age" value="{{ $event['celebrant_age'] }}" class="form-control"></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <th scope="row">Gender:</th>
                  <td>
                    <select name="celebrant_gender" class="form-select">
                      <option value="" @if($event['celebrant_gender']=="" ) selected @endif></option>
                      <option value="Male" @if($event['celebrant_gender']=="Male" ) selected @endif>Male</option>
                      <option value="Female" @if($event['celebrant_gender']=="Female" ) selected @endif>Female</option>
                    </select>
                  </td>
                  <td></td>
                  <td></td>
                </tr>
{{-- Event Information --}}
                <tr>
                  <th scope="row" class=" fs-1" style="font-weight: 500;"> Event Information</th>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <th scope="row">Event Theme:</th>
                  <td><input type="text" name="event_theme" value="{{ $event['event_theme'] }}" class="input-group input-group-text"></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <th scope="row">Event Location:</th>
                  <td><input type="text" name="venue_address" value="{{ $event['venue_address'] }}" class="form-control"></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <th scope="row">Date:</th>
                  <td><input type="date" name="event_date" value="{{ $event['event_date'] }}" class="form-control"></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <th scope="row">Time:</th>
                  <td><input type="time" name="event_time" value="{{ $event['event_time'] }}" class="form-control"></td>
                  <td></td>
                  <td></td>
                </tr>
                
                <tr>
                  <th scope="row">Package Type:</th>
                  @if ($event['choice'] == 'premade' && $event['premade_package'])
                  <td>
                    <input type="text" name="categoryName" value="{{ $event['premade_package'] }}" class="input-group input-group-text"></td>
                    @elseif ($event['choice'] == 'customize')
                  <td>
                    <input type="text" name="categoryName" value="Customized" class="input-group input-group-text" readonly></td>
                    @endif
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <th scope="row">Pax:</th>
                 @if ($event['choice'] == 'premade' && $event['premade_pax'])
                  <td>
                    <input type="text" name="premade_pax" value="{{ $event['premade_pax'] }}" class="input-group input-group-text" disabled></td>
                    @elseif ($event['choice'] == 'customize' && $event['customize_pax'])
                  <td><input type="text" name="premade_pax" value="{{ $event['customize_pax'] }}" class="input-group input-group-text"></td>
                    @endif
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <th scope="row">Budget:</th>
                  @if ($event['choice'] == 'premade' && $event['premade_price'])
                  <td>
                    <input type="number" name="premade_price" value="{{ $event['premade_price'] }}" class="input-group input-group-text" disabled></td>
                    @elseif ($event['choice'] == 'customize' && $event['customize_price'])
                  <td>
                    <input type="number" name="premade_price" value="{{ $event['customize_price'] }}" class="input-group input-group-text"></td>
                    @endif
                  <td></td>
                  <td></td>
                </tr>
{{-- Other Information --}}

                <tr>
                  <th scope="row" class=" fs-1" style="font-weight: 500;"> Other Information</th>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              
              <tr>
                <td colspan="3">
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Allergies <i class="fs-6">(Optional)</i></label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Please specify allergies."></textarea>
                  </div>
                </td>
              </tr>
            </tr>
            <tr>
              <td colspan="3">
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Special request <i class="fs-6">(Optional)</i></label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Please specify special request"></textarea>
                </div>
              </td>
            </tr>
              <tr>
                <td colspan="3">
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Other concern <i class="fs-6">(Optional)</i></label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Please specify other concern."></textarea>
                  </div>
                </td>
              </tr>
                
{{-- Menu --}}
                <tr>        
                    <th scope="row" class=" fs-1" style="font-weight: 500;">Menu</th>
                </tr>
                <tr>
                  <th scope="row">Pork:</th>
                  <td>
                    <select name="pork_menu" class="form-select">
                      <option value="" @if($event['pork_menu']==NULL) selected @endif></option>
                      @foreach($menus['pork'] as $menu)
                      <option value="{{ $menu->id}}" @if($event['pork_menu']==$menu->name) selected @endif>{{ $menu->name }}</option>
                      @endforeach
                    </select>
                  </td>
                  <td></td>
                  <td></td>
                </tr>
                
                <tr>
                  <th scope="row">Beef:</th>
                  <td>
                    <select name="beef_menu" class="form-select">
                      <option value="" @if($event['beef_menu']==NULL) selected @endif></option>
                      @foreach($menus['beef'] as $menu)
                      <option value="{{ $menu->id}}" @if($event['beef_menu']==$menu->name) selected @endif>{{ $menu->name }}</option>
                      @endforeach
                    </select>
                  </td>
                  <td></td>
                  <td></td>
                </tr>

                <tr>
                  <th scope="row">Chicken:</th>
                  <td>
                    <select name="chicken_menu" class="form-select">
                      <option value="" @if($event['chicken_menu']==NULL) selected @endif></option>
                      @foreach($menus['chicken'] as $menu)
                      <option value="{{ $menu->id}}" @if($event['chicken_menu']==$menu->name) selected @endif>{{ $menu->name }}</option>
                      @endforeach
                    </select>
                  </td>
                  <td></td>
                  <td></td>
                </tr>

                <tr>
                  <th scope="row">Fish:</th>
                  <td>
                    <select name="fish_menu" class="form-select">
                      <option value="" @if($event['fish_menu']==NULL) selected @endif></option>
                      @foreach($menus['fish'] as $menu)
                      <option value="{{ $menu->id}}" @if($event['fish_menu']==$menu->name) selected @endif>{{ $menu->name }}</option>
                      @endforeach
                    </select>
                  </td>
                  <td></td>
                  <td></td>
                </tr>

                <tr>
                  <th scope="row">Seafood:</th>
                  <td>
                    <select name="seafood_menu" class="form-select">
                      @foreach($menus['seafood'] as $menu)
                      <option value="{{ $menu->id}}" @if($event['seafood_menu']==$menu->name) selected @endif>{{ $menu->name }}</option>
                      @endforeach
                    </select>
                  </td>
                  <td></td>
                  <td></td>
                </tr>

                <tr>
                  <th scope="row">Vegetables:</th>
                  <td>
                    <select name="vegetable_menu" class="form-select">
                      @foreach($menus['vegetable'] as $menu)
                      <option value="{{ $menu->id}}" @if($event['vegetable_menu']==$menu->name) selected @endif>{{ $menu->name }}</option>
                      @endforeach
                    </select>
                  </td>
                  <td></td>
                  <td></td>
                </tr>

                <tr>
                  <th scope="row">Pasta:</th>
                  <td>
                    <select name="pasta_menu" class="form-select">
                      @foreach($menus['pasta'] as $menu)
                      <option value="{{ $menu->id}}" @if($event['pasta_menu']==$menu->name) selected @endif>{{ $menu->name }}</option>
                      @endforeach
                    </select>
                  </td>
                  <td></td>
                  <td></td>
                </tr>

                <tr>
                  <th scope="row">Dessert:</th>
                  <td>
                    <select name="dessert_menu" class="form-select">
                      @foreach($menus['dessert'] as $menu)
                      <option value="{{ $menu->id}}" @if($event['dessert_menu']==$menu->name) selected @endif>{{ $menu->name }}</option>
                      @endforeach
                    </select>
                  </td>
                  <td></td>
                  <td></td>
                </tr>

                <tr>
                  <th scope="row">Drink:</th>
                  <td>
                    <select name="drink_menu" class="form-select">
                      @foreach($menus['drink'] as $menu)
                      <option value="{{ $menu->id}}" @if($event['drink_menu']==$menu->name) selected @endif>{{ $menu->name }}</option>
                      @endforeach
                    </select>
                    </td>  
                    <td></td>
                    <td></td>
                </tr>

{{-- Additional Services --}}
                    <tr>
                      <th scope="row" class=" fs-1" style="font-weight: 500;">Additional services</th>
                      <td scope="row" class=" fs-3" style="font-weight: 500;"></td>
                      <td></td>
                      <td scope="row" class=" fs-3" style="font-weight: 500;"></td>
                    </tr>
                    <tr>
                      <th>
                        Party Entertainers:
                      </th>
                      
                      <td>
                        <select name="" id="" class="form-select">
                          <option value="" selected disabled>Select</option>
                        </select>
                      </td>
                      <td></td>
                      <td></td>
                   
                      
                    </tr>
                    <tr>
                      <th>
                        Photo Booth:
                      </th>
                      <td>
                        <select name="" id="" class="form-select">
                          <option value="" selected disabled>Select</option>
                        </select>
                      </td>
                      <td></td>
                      <td></td>
                      
                    </tr>
                    <tr>
                      <th>
                        Chocolate Fountain Booth:
                      </th>
                      <td>
                        <select name="" id="" class="form-select">
                          <option value="" selected disabled>Select</option>
                        </select>
                      </td>
                    <td></td>
                    <td></td>
                      
                    </tr>
                    <tr>
                      <th>
                        Face Painting Booth:
                      </th>
                      <td>
                        <select name="" id="" class="form-select">
                          <option value="" selected disabled>Select</option>
                        </select>
                      </td>
                    <td></td>
                    <td></td>
                      
                    </tr>
                    <tr>
                      <th>
                        Cupcake Tower Booth:
                      </th>
                      <td>
                        <select name="" id="" class="form-select">
                          <option value="" selected disabled>Select</option>
                        </select>
                      </td>
                    <td></td>
                    <td></td>
                      
                    </tr>
                    <tr>
                      <th>
                        Fruits Booth:
                      </th>
                      <td>
                        <select name="" id="" class="form-select">
                          <option value="" selected disabled>Select</option>
                        </select>
                      </td>
                    <td></td>
                    <td></td>
                    </tr>

{{-- Total Amount --}}
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
                      <th scope="row">Reservation Status</th> 
                      <td>
                        <select name="reservation_status" class="form-select">
      
                          <option value="" @if($event['reservation_status']=="" ) selected @endif></option>
                          <option value="Pending" @if($event['reservation_status']=="Pending" ) selected @endif>Pending</option>
                          <option value="Approved" @if($event['reservation_status']=="Approved" ) selected @endif>Approved</option>
                          <option value="Decline" @if($event['reservation_status']=="Decline" ) selected @endif>Decline</option>
      
                        </select>
                      </td>
                    </tr>

            </table>

          </div>
          {{-- end table --}}
        </div>
     
        <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div>
        </div>