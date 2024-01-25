
        <!-- Edit Request detail -->
        <div class="modal fade" id="Editreservation{{ $event['id'] }}" tabindex="-1" aria-labelledby="EditreservationLabel{{ $event['id'] }}" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="EditreservationLabel{{ $event['id'] }}">Edit Request Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
               <div>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="row">Name:</th>
                      <td><input type="text" name="name" value="{{ $event['name'] }}" class="form-control" readonly></td>
                      <th scope="row">Date:</th>
                      <td><input type="date" name="event_date" value="{{ $event['event_date'] }}" class="form-control"></td>
                    </tr>
                    <tr>
                      <th scope="row">Email:</th>
                      <td><input type="email" name="email" value="{{ $event['email'] }}" class="form-control" readonly></td>
                      <th scope="row">Time:</th>
                      <td><input type="time" name="event_time" value="{{ $event['event_time'] }}" class="form-control"></td>
                    </tr>
                    <tr>
                      <th scope="row" >Event Location:</th>
                      <td><input type="text" name="venue_address" value="{{ $event['venue_address'] }}" class="form-control"></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td scope="row" colspan="4" ><h1>Details</h1></td> 
                    </tr>
                    <tr>
                      <th scope="row">Event:</th>
                      <td><input type="text" name="event_theme" value="{{ $event['event_theme'] }}" class="input-group input-group-text"></td>
                      <th scope="row">Package Type:</th>
                      <td><input type="text" name="premade_package" value="{{ $event['premade_package'] }}" class="input-group input-group-text"></td>
                    </tr>
                    <tr>
                      <th scope="row">Pax:</th>
                      <td><input type="text" name="premade_pax" value="{{ $event['premade_pax'] }}" class="input-group input-group-text"></td>
                      <th scope="row">Budget:</th>
                      <td><input type="number" name="premade_price" value="{{ $event['premade_price'] }}" class="input-group input-group-text"></td>
                    </tr>
                    <tr>
                      <th scope="row">Celebrant Name:</th>
                      <td><input type="text" name="celebrant_name" value="{{ $event['celebrant_name'] }}" class="form-control"></td>
                      <th scope="row">Celebrant Age:</th>
                      <td><input type="text" name="celebrant_age" value="{{ $event['celebrant_age'] }}" class="form-control"></td>
                    </tr>
                    <tr>
                      <th scope="row">Celebrant Gender:</th>
                      <td>
                      <select name="celebrant_gender" class="form-select">
                                        <option value="" @if($event['celebrant_gender'] == "") selected @endif></option>
                                        <option value="Male" @if($event['celebrant_gender'] == "Male") selected @endif>Male</option>
                                        <option value="Female" @if($event['celebrant_gender'] == "Female") selected @endif>Female</option>
                                    </select>
                    </td>
                    </tr>
                    <tr>
                      <td scope="row" colspan="4" ><h1>Menu</h1></td> 
                    </tr>
                    <tr>
                    <th scope="row">Pork:</th>
    <td>
        <select name="pork_menu" class="form-select">
        <option value="" @if($event['pork_menu'] == NULL) selected @endif></option>
            @foreach($menus['pork'] as $menu)
            <option value="{{ $menu->name}}" @if($event['pork_menu'] == $menu->name) selected @endif>{{ $menu->name }}</option>
                                @endforeach
        </select>
    </td>
    <th scope="row">Beef:</th>
    <td>
    <select name="beef_menu" class="form-select">
    <option value="" @if($event['beef_menu'] == NULL) selected @endif></option>
            @foreach($menus['beef'] as $menu)
            <option value="{{ $menu->name}}" @if($event['beef_menu'] == $menu->name) selected @endif>{{ $menu->name }}</option>
                                @endforeach
        </select>
    </td>
                    </tr>
                    <tr>
                      <th scope="row">Chicken:</th>
                     
                      <td>
                      <select name="chicken_menu" class="form-select">
                      <option value="" @if($event['chicken_menu'] == NULL) selected @endif></option>
            @foreach($menus['chicken'] as $menu)
            <option value="{{ $menu->name}}" @if($event['chicken_menu'] == $menu->name) selected @endif>{{ $menu->name }}</option>
                                @endforeach
        </select>
                      </td>
                      <th scope="row">Fish:</th>
                     
                      <td>
                      <select name="fish_menu" class="form-select">
                      <option value="" @if($event['fish_menu'] == NULL) selected @endif></option>
            @foreach($menus['fish'] as $menu)
            <option value="{{ $menu->name}}" @if($event['fish_menu'] == $menu->name) selected @endif>{{ $menu->name }}</option>
                                @endforeach
        </select>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Seafood:</th>
                      <td>
                      <select name="seafood_menu" class="form-select">
            @foreach($menus['seafood'] as $menu)
            <option value="{{ $menu->name}}" @if($event['seafood_menu'] == $menu->name) selected @endif>{{ $menu->name }}</option>
                                @endforeach
        </select>
                      </td>
                      <th scope="row">Vegetables:</th>
                      <td>
                      <select name="vegetable_menu" class="form-select">
            @foreach($menus['vegetable'] as $menu)
            <option value="{{ $menu->name}}" @if($event['vegetable_menu'] == $menu->name) selected @endif>{{ $menu->name }}</option>
                                @endforeach
        </select>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Pasta:</th>
                      <td>
                      <select name="pasta_menu" class="form-select">
            @foreach($menus['pasta'] as $menu)
            <option value="{{ $menu->name}}" @if($event['pasta_menu'] == $menu->name) selected @endif>{{ $menu->name }}</option>
                                @endforeach
        </select>
                      </td>
                      <th scope="row">Dessert:</th>
                      <td>
                      <select name="dessert_menu" class="form-select">
            @foreach($menus['dessert'] as $menu)
            <option value="{{ $menu->name}}" @if($event['dessert_menu'] == $menu->name) selected @endif>{{ $menu->name }}</option>
                                @endforeach
        </select>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Drink:</th>
                      <td>
                      <select name="drink_menu" class="form-select">
            @foreach($menus['drink'] as $menu)
            <option value="{{ $menu->name}}" @if($event['drink_menu'] == $menu->name) selected @endif>{{ $menu->name }}</option>
                                @endforeach
        </select>
                      </td>
                      
                    </tr>
                    
                  </tbody>
                </table>
                
               </div>
              </div>
              <div class="modal-footer">
                
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </div>