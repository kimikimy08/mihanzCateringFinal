@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">


<main>
    <div>
      <h1 class="display-1 mb-5">Additional Services</h1>

      <div class="btn-position mb-3"> 
        <input type="text" class="form-control w-auto" placeholder="Additional Services" aria-label="additionalServices" aria-describedby="basic-addon1"><button class="btn btn-primary">Add</button>
        <!-- <button class="btn btn-primary"><a href="add.html">Add</a></button> -->
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Additional Services ID</th>
            <th scope="col">Name</th>
            <th scope="col"></th>
            
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            
            <td rowspan="5">Chocolate Fountain Booth</td>
            
            <td>
                <button type="button" class="btn btn-danger">Delete</button>
            </td>
          </tr>

        </tbody>
      </table>
      </div>
      
  </main>
 
        

        @endsection