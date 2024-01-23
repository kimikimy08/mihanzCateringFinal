@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        <h1 class="display-1" >Dashboard</h1>
        <div class="Dashboard-container">
          
          <div class="Dashboard">
          <ul >
            <li><a href="reservation/Pending/index.html">Pending Request <p class="mt-4 fs-1">1</p></a></li>
            <li><a href="reservation/Approved/">Approved Request <p class="mt-4 fs-1">1</p></a></li>
            <li><a href="">Incoming Events <p class="mt-4 fs-1">1</p></a></li>
            <li><a href="reservation/History/index.html">Past Events <p class="mt-4 fs-1">1</p></a></li>
            <li><a href="user/index.html">Users <p class="mt-4 fs-1">1</p></a></li>
          </ul>
        </div > 
        <div class="calendar-container">
          <div class="calendar">
            
            <table class="table text-center">
              <tr>
                <th colspan="7">Month/Year</th>
                
              </tr>
              <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
              </tr>
              <tr>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
              </tr>
              <tr>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
                <td>19</td>
                <td>20</td>
                <td>21</td>
              </tr>
              <tr>
                <td>22</td>
                <td>23</td>
                <td>24</td>
                <td>25</td>
                <td>26</td>
                <td>27</td>
                <td>28</td>
              </tr>
              <tr>
                <td>29</td>
                <td>30</td>
                <td>31</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
              </tr>
              
            </table>
          </div>
          <div class="calendar-event">
            <div class="h5">Calendar Events Info</div>
            <section>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Reservation ID </th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Event</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Viewreservation">View</button>
                    </td>
                  </tr>
                 
    
                </tbody>
              </table>


<!-- Modal -->

            </section>
            <div class="modal fade" id="Viewreservation" tabindex="-1" aria-labelledby="ViewreservationLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ViewreservationLabel">Event Information</h1>
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
                            <td><input type="date" class="input-group input-group-text" readonly></td>
                          </tr>
                          <tr>
                            <th scope="row">Email:</th>
                            <td><input type="email" class="input-group input-group-text" readonly></td>
                            <th scope="row">Time:</th>
                            <td><input type="time" class="input-group input-group-text" readonly></td>
                          </tr>
                          <tr>
                            <th scope="row" >Event Location:</th>
                            <td colspan="4"><input type="text" class="input-group input-group-text" readonly></td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td scope="row" colspan="4" ><h1>Details</h1></td> 
                          </tr>
                          <tr>
                            <th scope="row">Event:</th>
                            <td><input type="text" class="input-group input-group-text" readonly></td>
                            <th scope="row">Package Type:</th>
                            <td><input type="text" class="input-group input-group-text" readonly></td>
                          </tr>
                          <tr>
                            <th scope="row">Pax:</th>
                            <td><input type="text" class="input-group input-group-text" readonly></td>
                            <th scope="row">Budget:</th>
                            <td><input type="number" class="input-group input-group-text" readonly></td>
                          </tr>
                          <tr>
                            <th scope="row">Celebrant Name:</th>
                            <td><input type="text" class="input-group input-group-text" readonly></td>
                            <th scope="row">Celebrant Age:</th>
                            <td><input type="text" class="input-group input-group-text" readonly></td>
                          </tr>
                          <tr>
                            <td scope="row" colspan="4" ><h1>Menu</h1></td> 
                          </tr>
                          <tr>
                            <th scope="row">Pork:</th>
                            <td><input type="text" class="input-group input-group-text" readonly></td>
                            <th scope="row">Beef:</th>
                            <td><input type="text" class="input-group input-group-text" readonly></td>
                          </tr>
                          <tr>
                            <th scope="row">Chicken:</th>
                            <td><input type="text" class="input-group input-group-text" readonly></td>
                            <th scope="row">Fish:</th>
                            <td><input type="text" class="input-group input-group-text" readonly></td>
                          </tr>
                          <tr>
                            <th scope="row">Seafood:</th>
                            <td><input type="text" class="input-group input-group-text" readonly></td>
                            <th scope="row">Vegetables:</th>
                            <td><input type="text" class="input-group input-group-text" readonly></td>
                          </tr>
                          <tr>
                            <th scope="row">Pasta:</th>
                            <td><input type="text" class="input-group input-group-text" readonly></td>
                            <th scope="row">Dessert:</th>
                            <td><input type="text" class="input-group input-group-text" readonly></td>
                          </tr>
                          <tr>
                            <th scope="row">Drink:</th>
                            <td><input type="text" class="input-group input-group-text" readonly></td>
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
            <div class="section-footer"></div>
            
          </div>
        </div>
        </div>
        @endsection