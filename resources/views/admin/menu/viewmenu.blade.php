<!-- viewmenu.blade.php -->


<div class="modal fade" id="Viewmenu{{ $menu->id }}" tabindex="-1" aria-labelledby="ViewmenuLabel{{ $menu->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="ViewmenuLabel{{ $menu->id }}">Menu</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="view">
          <table class="table">
          <img src="{{ asset('images/menu/' . $menu->menus_image) }}" alt="Menu Image" class="img-thumbnail img-menu">
              <tr>
                <th scope="row">Menu ID:</th>
                <td>{{$menu->id}}</td>
              </tr>  
                
                <tr>
                  <th scope="row">Name:</th>
                  <td>{{$menu->name}}</td>
                </tr>
                <tr>
                  <th scope="row">Description:</th>
                  <td>{{$menu->description}}</td>
                </tr>
                
                <tr>
                  <th scope="row">Price:</th>
                  <td>{{$menu->price}}</td>
                </tr>
                <tr>
                  <th scope="row">Status:</th>
                  <td>{{$menu->status}}</td>
                </tr>
                <tr>
                  <th scope="row">Serving:</th>
                  <td>8</td>
                </tr>
                <tr>
                  <th scope="row">Type of Dish:</th>
                  <td>{{ $menu->category_name }}</td>
                </tr>
          </table>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
