<!-- Edit User Details -->
<div class="modal fade" id="Edituser{{ $user->id }}" tabindex="-1" aria-labelledby="EdituserLabel{{ $user->id }}" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="EdituserLabel{{ $user->id }}">Edit User Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ url('/admin/user/' . $user->id) }}" method="post">
                @csrf
                @method('PUT')
              <div class="modal-body">
               <div class="view">
                <table class="table">
                  <tbody>
      
            
                  <tr>
                    <th scope="col">Name</th>
                    <td> <input type="text" name="name" value="{{ $user->name }}" class="form-control"></td>
                  </tr>
                  <tr>
                    <th scope="col">Email</th>
                    <td> <input type="email" name="email" value="{{ $user->email }}" class="form-control"></td>
                  </tr>
                  
                  <tr>
                    <th scope="col">Address</th>
                    <td> <input type="text" name="address" value="{{ $user->address }}" class="form-control"></td>
                  </tr>
      
                  <tr>
                    <th scope="col">Contact No.</th>
                    <td> <input type="tel" name="contact_number" value="{{ $user->contact_number }}" class="form-control"></td>
                  </tr>
                  <tr>
                    <th scope="col">Type of user</th>
                    <td> 
                    <select name="role_id" class="form-select">
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div>
        </div>