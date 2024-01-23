 <!-- View Package -->
 <div class="modal fade" id="Viewpackage{{ $package->id }}" tabindex="-1" aria-labelledby="ViewpackageLabel" aria-hidden="true">
          <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="ViewpackageLabel">Package</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              
              <div class="modal-body">
                <div class="viewpackage">
                  <table class="table">
                  <img src="{{ asset('images/services/packages/' . $package->service_pckg_image) }}" alt="Package Image" class="img-thumbnail img-menu">
                      <tr>
                        <th scope="col">Package Type:</th>
                        <td>{{$package->serviceSelection->services_category}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Pax No.:</th>
                        <td>{{$package->pax}}</td>
  
                      </tr>
                      <tr>
                        <th scope="col">Price:</th>
                        <td>{{$package->price}}</td>
  
                      </tr>
                      
                  </table>
                </div>
              </div>
              <div class="modal-footer">
                
              </div>
            </div>
          </div>
        </div>