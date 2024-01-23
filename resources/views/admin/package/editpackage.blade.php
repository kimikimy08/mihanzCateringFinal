<div class="modal fade" id="Editpackage{{ $package->id }}" tabindex="-1" aria-labelledby="EditpackageLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="EditpackageLabel">Edit Package</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.package.update', ['id' => $services->id, 'p_id' => $package->id]) }}" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th scope="col">Image</th>
                            <td><input type="file" class="form-control" name="image" id="inputGroupFile01"></td>
                        </tr>
                        <tr>
                            <th scope="col">Name</th>
                            <td><input type="text" name="name" value="{{ $package->name }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <th scope="col">Pax</th>
                            <td>
                                <select name="pax" class="form-select" aria-placeholder="Status of Dish">
                                    <option selected>{{ $package->pax }}</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="150">150</option>
                                    <option value="200">200</option>
                                    <option value="250">250</option>
                                    <option value="300">300</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Price</th>
                            <td><input type="number" name="price" value="{{ $package->price }}" class="form-control" placeholder="Price"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>