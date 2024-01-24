<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/Admin.css">
    <title>Mihan'z Catering | Admin</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg  " >
        <div class="container-fluid">
          <a class="navbar-brand" href="/Index.html">Mihan'z Catering</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="nav nav-tabs ">
                <li class="nav-item">
                  <a class="nav-link " aria-current="page" href="/html/admin/index.html">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Reservation
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item active" href="">Pending</a></li>
                      <li><a class="dropdown-item" href="../Approved/index.html">Approved</a></li>
                      <li><a class="dropdown-item" href="../Approved/index.html">History</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/html/admin/services/index.html">Services</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle  " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Menu
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item " href="/html/admin/menu/index.html">All</a></li>
                      <li><a class="dropdown-item " href="/html/admin/menu/menu pages/pork.html">Pork</a></li>
                      <li><a class="dropdown-item" href="/html/admin/menu/menu pages/beef.html">Beef</a></li>
                      <li><a class="dropdown-item" href="/html/admin/menu/menu pages/chicken.html">Chicken</a></li>
                      <li><a class="dropdown-item " href="/html/admin/menu/menu pages/seafood.html">Seafood</a></li>
                      <li><a class="dropdown-item" href="/html/admin/menu/menu pages/fish.html">Fish</a></li>
                      <li><a class="dropdown-item" href="/html/admin/menu/menu pages/pasta.html">Pasta</a></li>
                      <li><a class="dropdown-item " href="/html/admin/menu/menu pages/dessert.html">Dessert</a></li>
                      <li><a class="dropdown-item" href="/html/admin/menu/menu pages/drinks.html">Drinks</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/html/admin/themes/index.html">Themes</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/html/admin/user/index.html">User</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href=".html">Logout</a>
                  </li>
                            
                
            </ul>
          </div>
        </div>
      </nav>
      <main>
        <h1 class="display-1 mb-5">Client Status</h1>
        <div class="btn-position-status mb-5"><button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">Add</button></div>
        <div class="status-container">
          <div class="status-user-info">
          
          <table class="table">
            
            <tr>
                <th scope="col">Reservation ID:</th>
                <td></td>
            </tr>
                <th scope="col">Name:</th>
                <td></td>
            <tr>

            </tr>
            <tr>
                <th scope="col">Contact No. :</th>
                <td></td>
            </tr>
            <tr>
                <th scope="col">Date of Event:</th>
                <td></td>
            </tr>
            <tr>
                <th scope="col">Type of Event:</th>
                <td></td>
            </tr>   
            
          </table>
        </div>
          <div class="status-call" >
           
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Status</th>
                    <th scope="col">Remarks</th>
                  </tr>
                </thead>

                <tbody >
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                  </tr>
                  
                </tbody>
              </table>
          </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Status</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
               <div>
                <table class="table">
                    
                    <tr>
                        <th scope="col">Date:</th>
                        <td><input type="date" class="form-control"></td>
                    </tr> 
                    <tr>
                        <th scope="col">time:</th>
                        <td><input type="time" class="form-control " ></td>
                    </tr>
                    <tr>
                        <th scope="col">Status:</th>
                        <td>
                            <select name="" id="" class="form-select">
                                <option value=""></option>
                                <option value="">Waiting</option>
                                <option value="">Contacted</option>
                                <option value="">Approved</option>
                                <option value="">Canceled</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Remarks:</th>
                        <td> <textarea class="form-control" aria-label="With textarea"></textarea></td>
                    </tr>
                  </table>
                
               </div>
              </div>
              <div class="modal-footer">
                
                <button type="submit" class="btn btn-primary">Save</button>
                
              </div>
            </div>
          </div>
        </div>
      </main>

</body>
</html>