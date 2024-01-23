@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<h1 class="display-1">Services</h1>
        <div class="btn-position"> 
          <!-- <button class="btn btn-primary "><a href="add.html">Add</a></button> -->
          <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#Addservices">Add</button>
        </div>
        <section class="Services-section">
          
          
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Type of Service</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            @foreach($services as $service)
              <tr>
                <th scope="row">{{ $service->id }}</th>
                <td><img src="{{ asset('images/services/service_selection/' . $service->services_image) }}" alt="Service Image" class="img-thumbnail"></td>
                <td>{{ $service->services_category }}</td>
                <td>
                  <button type="button" class="btn btn-primary"><a href="{{ route('admin.service.viewservice', ['id' => $service->id]) }}">View</a></button>
                  <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#Editservice{{ $service->id }}">Edit</button>
                  <form action="{{ route('admin.service.destroy', $service->id) }}" method="post" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this service item?')">Delete</button>
            </form>
                </td>
                
              </tr>
              @endforeach
            </tbody>
            
          </table>
          <div class="modal fade" id="Addservices" tabindex="-1" aria-labelledby="AddservicesLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="AddservicesLabel">Category</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.service.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                  <table class="table">
                    <tr>
                     <th scope="col">Image</th>
                     <td>
                      <input type="file" name="image" class="form-control" id="inputGroupFile01">
                    
                      </td>
                      <th scope="col">Category</th>
                      <td>
                                    <input type="text" name="services_category" class="form-control" placeholder="Dish Name">
                      </td>
                      
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
        </section>

        @foreach($services as $service)
        @include('admin.service.editservice', ['service' => $service])
    @endforeach

        @endsection