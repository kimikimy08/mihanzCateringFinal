@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<h1 class="display-1">Packages</h1>
          <div class="btn-position"> 
            <!-- <button class="btn btn-primary "><a href="package/add.html">Add</a></button> -->
            <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#Addpackage">Add</button>
          </div>
        <section class="Package-section">
          
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Package Name </th>
                <th scope="col">Package type </th>
                <th scope="col">Pax No.</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            @foreach($packages as $package)
              <tr>
                <th scope="row">{{ $package->id }}</th>
                <td><img src="{{ asset('images/services/packages/' . $package->service_pckg_image) }}" alt="Package Image" class="img-thumbnail"></td>
                <td>{{ $package->name }}</td>
                <td>{{ $package->serviceSelection->services_category }}</td>
                <td>{{ $package->pax }}</td>
                <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Viewpackage{{ $package->id }}">
                            View
                        </button>
                  <!-- <button type="button" class="btn btn-primary" ><a href="package/edit.html">Edit</a></button> -->
                  <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#Editpackage{{ $package->id }}">Edit</button>
                  <form action="{{ route('admin.package.destroy', ['id' => $services->id, 'p_id' => $package->id]) }}" method="post" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this package item?')">Delete</button>
            </form>
                </td>
              </tr>
              @endforeach
            </tbody>
            
          </table>
        </section>
        <!-- Add Package -->
        <div class="modal fade" id="Addpackage" tabindex="-1" aria-labelledby="AddpackageLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="AddpackageLabel">Add Package</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="POST" action="{{ route('admin.package.store', ['id' => $services->id]) }}" enctype="multipart/form-data">
        @csrf
              <div class="modal-body">
                <table class="table">
                <tr>
                                    <th scope="col">Image</th>
                                    <td><input type="file" class="form-control" name="image" id="inputGroupFile01"></td>
                                </tr>
                                <tr>
                                    <th scope="col">Name</th>
                                    <td><input type="text" name="name" class="form-control" ></td>
                                </tr>
                                <tr>
                                    <th scope="col">Pax</th>
                                    <td>
                                        <select name="pax" class="form-select" aria-placeholder="Status of Dish">
                                            <option selected></option>
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
                                    <td><input type="number" name="price" class="form-control" placeholder="Price"></td>
                                </tr>
                                
                              
                </tbody>
                
              </table>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
              </form>
            </div>
          </div>
        </div>
       <!-- Edit Package Modal -->
       @foreach($packages as $package)
       @include('admin.package.viewpackage', ['package' => $package])
       @include('admin.package.editpackage', ['package' => $package])
@endforeach
        @endsection