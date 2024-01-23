<!-- resources/views/admin/menu/addmenu.blade.php -->

@extends('layouts.admin')

@section('content')
    <div class="modal fade" id="Addmenu" tabindex="-1" aria-labelledby="AddmenuLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="AddmenuLabel">Add Menu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('menu.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="col">Image</th>
                                    <td><input type="file" class="form-control" name="menus_image" id="inputGroupFile01"></td>
                                </tr>
                                <tr>
                                    <th scope="col">Name</th>
                                    <td><input type="text" name="name" class="form-control" placeholder="Dish Name"></td>
                                </tr>
                                <tr>
                                    <th scope="col">Type of Dish</th>
                                    <td>
                                        <select name="menu_selection_id" class="form-select">
                                            <option selected></option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->menu_category }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Description</th>
                                    <td><textarea name="description" class="form-control" aria-label="With textarea"></textarea></td>
                                </tr>
                                <tr>
                                    <th scope="col">Price</th>
                                    <td><input type="number" name="price" class="form-control" placeholder="Price"></td>
                                </tr>
                                <tr>
                                    <th scope="col">Status</th>
                                    <td>
                                        <select name="status" class="form-select" aria-placeholder="Status of Dish">
                                            <option selected></option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Serving</th>
                                    <td><input type="number" name="serving" class="form-control" placeholder="No. of serving"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-position">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
