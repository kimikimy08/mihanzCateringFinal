<!-- resources/views/admin/menu/editmenu.blade.php -->

<div class="modal fade" id="Editmenu{{ $menu->id }}" tabindex="-1" aria-labelledby="EditmenuLabel{{ $menu->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="EditmenuLabel{{ $menu->id }}">Edit Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/menu/' . $menu->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="col">Image</th>
                                <td><input type="file" class="form-control" name="menus_image" id="inputGroupFile01"></td>
                            </tr>
                            <tr>
                                <th scope="col">Name</th>
                                <td><input type="text" name="name" value="{{ $menu->name }}" class="form-control"></td>
                            </tr>
                            <tr>
                                <th scope="col">Type of Dish</th>
                                <td>
                                    <select name="menu_selection_id" class="form-select">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $menu->menu_selection_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->menu_category }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">Description</th>
                                <td><textarea name="description" class="form-control" rows="3">{{ $menu->description }}</textarea></td>
                            </tr>
                            <tr>
                                <th scope="col">Price</th>
                                <td><input type="number" name="price" value="{{ $menu->price }}" class="form-control"></td>
                            </tr>
                            <tr>
                                <th scope="col">Status</th>
                                <td>
                                    <select name="status" class="form-select">
                                        <option value="active" {{ $menu->status === 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $menu->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">Serving</th>
                                <td><input type="text" name="serving" value="{{ $menu->serving }}" class="form-control"></td>
                            </tr>
                        </tbody>
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
