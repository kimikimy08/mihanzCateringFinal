 <!-- Edit Theme Modal -->
 <div class="modal fade" id="Edittheme{{ $theme->id }}" tabindex="-1" aria-labelledby="EditthemeLabel{{ $theme->id }}" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="EditthemeLabel{{ $theme->id }}">Edit theme</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ url('/admin/theme/' . $theme->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="modal-body">
              
                <table class="table">
            
                  <tr>
                    
                    <th scope="col">Image</th>
                    <td><input type="file" class="form-control" name="image" id="inputGroupFile01"></td>
                  </tr>

                  <tr>
                                <th scope="col">Theme Name</th>
                                <td><input type="text" name="theme_name" value="{{ $theme->theme_name }}" class="form-control"></td>
                            </tr>
    
                    <tr>
                    <th scope="col">Event</th>
                    <td><select name="service_selection_id" class="form-select">
                                        @foreach($services as $service)
                                            <option value="{{ $service->id }}" {{ $theme->service_selection_id == $service->id ? 'selected' : '' }}>
                                                {{ $service->services_category }}
                                            </option>
                                        @endforeach
                                    </select></td>                 
                  </tr>                
              </table>

                
               </div>
              
               <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div>
        </div>