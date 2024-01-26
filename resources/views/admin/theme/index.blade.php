@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<div>
          <h1 class="display-1 mb-5">Themes</h1>
          <div class="btn-position"> 
            <!-- <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#Addthemes"><a href="add.html">Add</a></button> -->
            <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#Addthemes">Add</button>
          </div>
          <table class="table">
            <thead>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Theme Name</th>
                <th scope="col">Event</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            @foreach ($themes as $key => $theme)
              <tr>
                <th scope="row">{{ $theme->id }}</th>
                <td><img src="{{ asset('images/themes/' . $theme->theme_image) }}" alt="" id="Theme Image" class="img-thumbnail"></td>
                <td>{{ $theme->theme_name }}</td>
                <td>{{ $theme->serviceSelection->services_category }}</td>
                <td>
                    <!-- <button type="button" class="btn btn-primary" ><a href="edit.html">Edit</a></button></td> -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Viewtheme{{ $theme->id }}">View</button>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#Edittheme{{ $theme->id }}" >Edit</button>
                    <form action="{{ route('admin.theme.destroy', $theme->id) }}" method="post" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this theme?')">Delete</button>
            </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- Add Theme Modal -->
        <div class="modal fade" id="Addthemes" tabindex="-1" aria-labelledby="AddthemesLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="AddthemesLabel">Add theme</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ route('admin.theme.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
              <div class="modal-body">
              
                <table class="table">
            
                  <tr>
                    
                    <th scope="col">Image</th>
                    <td><input type="file" name="image" class="form-control" id="inputGroupFile01"></td>
                  </tr>

                  <tr>
                    
                    <th scope="col">Theme Name</th>
                    <td> <input type="text" name="theme_name" class="form-control"></td>
                  </tr>
    
                    <tr>
                    <th scope="col">Event</th>
                    <td>
                      <select name="service_selection_id" class="form-select">
                                            <option selected></option>
                                            @foreach($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->services_category }}</option>
                                            @endforeach
                                        </select>
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
        
      
        @foreach($themes as $theme)
        
        @include('admin.theme.viewtheme', ['theme' => $theme])
        @include('admin.theme.edittheme', ['theme' => $theme])
    @endforeach
@endsection