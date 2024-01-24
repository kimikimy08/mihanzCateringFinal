@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/User-Dashboard.css') }}">
<div class="User-container">
            <div class="con1">
                <h1 style=" font-family: 'Playfair Display', serif;">Profile</h1>
                <div class="con1-container">
                  
                  
                    <table class="table">
                      <tr>
                        <th scope="col" colspan="2"><img src="sample.jpg" alt="" class=" img-thumbnail icon-container"></th>
                      </tr>
                        <tr>
                          <th scope="row">Name:</th>
                          <td>Joji Sta Maria</td>
                        </tr>
                        <tr>
                          <th scope="row">Address:</th>
                          <td><p></p></td>
                        </tr>
                        <tr>
                          <th scope="row">Email:</th>
                          <td><p></p></td>
                        </tr>
                        <tr>
                          <th scope="row">Contact No.:</th>
                          <td><p></p></td>
                        </tr>
                        
                      
                      
                        
                      </tbody>
                    </table>
                    <!-- <div><button type="button" class="btn btn-primary">Edit</a> </button></div> -->
                    <div><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Edit">Edit</button></div>
                </div>
                <div class="modal fade" id="Edit" tabindex="-1" aria-labelledby="EditLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="EditLabel">Edit Information</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div>
                          <table class="table">
                        
                            <tr>
                              <th scope="col">Image</th>
                              <td>
                                  <div class="input-group mb-3">
                                      
                                      <input type="file" class="form-control" id="inputGroupFile01">
                                      
                                    </div>
                              </td>
                            </tr>
                              <tr>
                                <th scope="col">Name:</th>
                                <td ><input type="text" name="" id="" class="input-group-text form-control"></td>
                              </tr>
                              <tr>
                                <th scope="col">Address:</th>
                                <td><input type="text" name="" id="" class="input-group-text form-control"></td>
                              </tr>
                              <tr>
                                <th scope="col">Email:</th>
                                <td><input type="email" name="" id="" class="input-group-text form-control"></td>
                              </tr>
                              <tr>
                                <th scope="col">Contact No.:</th>
                                <td><input type="tel" name="" id="" class="input-group-text form-control "></td>
                              </tr>
                              
                            
                            
                              
                            </tbody>
                          </table>
                          <div><button type="submit" class="btn btn-primary"> Save</button></div>
                          
                         </div>
                      </div>
                      <div class="modal-footer">
                       
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="con2" >
                <div class="con-A">
                    <h1 style=" font-family: 'Playfair Display', serif;">Latest Reservation</h1>
                    <section>
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Reservation ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestinformation">View</button></td>
                          </tr>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestinformation">View</button></td>
                          </tr>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestinformation">View</button></td>
                          </tr>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestinformation">View</button></td>
                          </tr>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestinformation">View</button></td>
                          </tr>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestinformation">View</button></td>
                          </tr>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestinformation">View</button></td>
                          </tr>
                        </tbody>
                      </table>
                    </section>
                    <div> <button type="button" class="btn btn-primary"><a href="../Services.html">New Reservation</a></button>
                      <button type="button" class="btn btn-primary"><a href="../Menu.html">Check Our Menu</a></button>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancellation">Cancellation</button>
                      </div>
                      
                </div>
                <div class="con-B">
                    <h1 style=" font-family: 'Playfair Display', serif;">History</h1>
                    <section>
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Reservation ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestinformation">View</button></td>
                          </tr>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestinformation">View</button></td>
                          </tr>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestinformation">View</button></td>
                          </tr>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestinformation">View</button></td>
                          </tr>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestinformation">View</button></td>
                          </tr>
                          
                        </tbody>
                      </table>
                      
                    </section>
                    
                </div>

<!-- Request Modal -->
<div class="modal fade" id="requestinformation" tabindex="-1" aria-labelledby="requestinformationLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered  modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="requestinformationLabel">Reservation Details</h1>
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
                <td scope="row" colspan="4" ><h1>Details</h1></td> 
              </tr>
              <tr>
                <th scope="row">Event:</th>
                <td></td>
                <th scope="row">Package Type:</th>
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
                <th scope="row">Theme</th>
                <td></td>
              </tr>
              <tr>
                <td scope="row" colspan="4" ><h1>Menu</h1></td> 
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
       
      </div>
    </div>
  </div>
</div>
<!-- Cancellation Modal -->
<div class="modal fade" id="cancellation" tabindex="-1" aria-labelledby="cancellationLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="cancellationLabel">Cancellation</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <p class="">Kindly contact Mihanz Catering for cancellation of reservation</p>
          
         </div>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="Edit" tabindex="-1" aria-labelledby="EditLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditLabel">For Edit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <p>Kindly contact the Mihanz Catering for Edit of reservation</p>
          
         </div>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
            </div>







        </div>

@endsection
