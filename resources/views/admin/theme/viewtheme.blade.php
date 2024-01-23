 <!-- View Theme Modal -->
 <div class="modal fade" id="Viewtheme{{ $theme->id }}" tabindex="-1" aria-labelledby="ViewthemeLabel{{ $theme->id }}" aria-hidden="true">
          <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="ViewthemeLabel{{ $theme->id }}">Edit theme</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <div class="viewpackage">
                <table class="table">
            
                  <tr>
                  <img src="{{ asset('images/themes/' . $theme->theme_image) }}" alt="Theme Image" class="img-thumbnail img-menu">
                  </tr>
                    <tr>
                    <th scope="col">Event:</th>
                    <td>{{ $theme->serviceSelection->services_category }}</td>                 
                  </tr>                
              </table>
              </div>
                

                
               </div>
              
              <div class="modal-footer">
               
              </div>
            </div>
          </div>
        </div>