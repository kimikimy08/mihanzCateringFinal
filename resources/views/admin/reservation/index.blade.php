@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<h1 class="display-1 ">Pending</h1>
        
        <section class="section-pending" >
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Contact No.</th>
                <th scope="col">Date of Event</th>
                <th scope="col">Time of Event</th>
                <th scope="col">Type of Event</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col"></th>
              </tr>
            </thead>
            
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td></td>
                <td></td>
                <td> </td>
                <td> </td>
                <td>Birthday</td>
                <td>11/23/23 </td>
                <td>11:05</td>
                <td>
                  <button type="button" class="btn btn-primary"><a href="status/index.html" class="">Status</a> </button>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Viewrequestdetail">View</button>
                  <!-- <button type="button" class="btn btn-secondary"><a href="edit.html" class="">Edit</a> </button> -->
                  <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#Editrequestdetail">Edit </button>
                  <button type="button" class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#Deleterequestdetail" >Delete</button>
                </td>
              </tr>


              
            </tbody>
          </table>

        </section>
        <!-- View Request detail -->
        <div class="modal fade" id="Viewrequestdetail" tabindex="-1" aria-labelledby="ViewrequestdetailLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="ViewrequestdetailLabel">Request Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
               <div>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="row">Name:</th>
                      <td></td>
                      <th scope="row">Date of Event:</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row">Email:</th>
                      <td></td>
                      <th scope="row">Time of Event:</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row" >Event Location:</th>
                      <td colspan="4"></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row" colspan="4"  class=" fs-2">Details</th> 
                    </tr>
                    <tr>
                      <th scope="row">Event:</th>
                      <td></td>
                      <th scope="row">Theme</th>
                      <td></td>
                      
                    </tr>
                    <tr>
                      <th scope="row">Pax:</th>
                      <td></td>
                      <th scope="row">Budget:</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row">Celebrant Name:</th>
                      <td></td>
                      <th scope="row">Celebrant Age:</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row">Celebrant Gender:</th>
                      <td></td>
                      <th scope="row">Package Type:</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row" colspan="4"  class="fs-2 ">Menu</th> 
                    </tr>
                    <tr>
                      <th scope="row">Pork:</th>
                      <td></td>
                      <th scope="row">Beef:</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row">Chicken:</th>
                      <td></td>
                      <th scope="row">Fish:</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row">Seafood:</th>
                      <td></td>
                      <th scope="row">Vegetables:</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row">Pasta:</th>
                      <td></td>
                      <th scope="row">Dessert:</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th scope="row">Drink:</th>
                      <td></td>
                    </tr>
                    
                  </tbody>
                </table>
                
               </div>
              </div>
              <div class="modal-footer">
                
                <button type="submit" class="btn btn-primary">Accept</button>
                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Decline</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Edit Request detail -->
        <div class="modal fade" id="Editrequestdetail" tabindex="-1" aria-labelledby="EditrequestdetailLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="EditrequestdetailLabel">Edit Request Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
               <div>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="row">Name:</th>
                      <td><input type="text" class="input-group input-group-text" readonly></td>
                      <th scope="row">Date:</th>
                      <td><input type="date" class="input-group input-group-text" ></td>
                    </tr>
                    <tr>
                      <th scope="row">Email:</th>
                      <td><input type="email" class="input-group input-group-text" readonly></td>
                      <th scope="row">Time:</th>
                      <td><input type="time" class="input-group input-group-text" ></td>
                    </tr>
                    <tr>
                      <th scope="row" >Event Location:</th>
                      <td colspan="4"><input type="text" class="input-group input-group-text" ></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td scope="row" colspan="4" ><h1>Details</h1></td> 
                    </tr>
                    <tr>
                      <th scope="row">Event:</th>
                      <td><input type="text" class="input-group input-group-text" ></td>
                      <th scope="row">Package Type:</th>
                      <td><input type="text" class="input-group input-group-text" ></td>
                    </tr>
                    <tr>
                      <th scope="row">Pax:</th>
                      <td><input type="text" class="input-group input-group-text" ></td>
                      <th scope="row">Budget:</th>
                      <td><input type="number" class="input-group input-group-text" ></td>
                    </tr>
                    <tr>
                      <th scope="row">Celebrant Name:</th>
                      <td><input type="text" class="input-group input-group-text" ></td>
                      <th scope="row">Celebrant Age:</th>
                      <td><input type="text" class="input-group input-group-text" ></td>
                    </tr>
                    <tr>
                      <th scope="row">Celebrant Gender:</th>
                      <td>
                        <select name="" id=""  class="form-select">
                          <option value=""></option>
                          <option value="">Male</option>
                          <option value="">Female</option>
                        </select>
                    </td>
                    </tr>
                    <tr>
                      <td scope="row" colspan="4" ><h1>Menu</h1></td> 
                    </tr>
                    <tr>
                      <th scope="row">Pork:</th>
                      <td>
                        <select name="" id="" class="form-select">
                            <option value="" selected></option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                      </td>
                      <th scope="row">Beef:</th>
                      <td>
                        <select name="" id="" class="form-select">
                            <option value="" selected></option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Chicken:</th>
                      <td>
                        <select name="" id="" class="form-select">
                            <option value="" selected></option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                      </td>
                      <th scope="row">Fish:</th>
                      <td>
                        <select name="" id="" class="form-select">
                            <option value="" selected></option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Seafood:</th>
                      <td>
                        <select name="" id="" class="form-select">
                            <option value="" selected></option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                      </td>
                      <th scope="row">Vegetables:</th>
                      <td>
                        <select name="" id="" class="form-select">
                            <option value="" selected></option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Pasta:</th>
                      <td>
                        <select name="" id="" class="form-select">
                            <option value="" selected></option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                      </td>
                      <th scope="row">Dessert:</th>
                      <td>
                        <select name="" id="" class="form-select">
                            <option value="" selected></option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">Drink:</th>
                      <td>
                        <select name="" id="" class="form-select">
                            <option value="" selected></option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                      </td>
                      
                    </tr>
                    
                  </tbody>
                </table>
                
               </div>
              </div>
              <div class="modal-footer">
                
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Delete Request detail -->
        <div class="modal fade" id="Deleterequestdetail" tabindex="-1" aria-labelledby="DeleterequestdetailLabel" aria-hidden="true">
          <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="DeleterequestdetailLabel">Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="fs-5">
                  Are you sure you want to delete this package?
                </div>
                
              </div>
              <div class="modal-footer">
                
                <button class=" btn btn-primary">Yes</button>
                <button class="btn btn-secondary">No</button>
              </div>
            </div>
          </div>
        </div>

        @endsection