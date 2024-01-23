<!-- Edit -->
<div class="modal fade" id="Editservice{{ $service->id }}" tabindex="-1" aria-labelledby="EditserviceLabel{{ $service->id }}" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="EditserviceLabel{{ $service->id }}">Category</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/admin/service/' . $service->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                  <table class="table">
                    <tr>
                     <th scope="col">Image</th>
                     <td>
                      <input type="file" class="form-control" name="image" id="inputGroupFile01">
                    
                      </td>
                      <th scope="col">Category</th>
                      <td>
                          <input type="text" name="services_category" value="{{ $service->services_category }}" id="" class="input-group-text">
                      </td>
                      
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