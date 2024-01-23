<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>Mihan'z Catering | Admin</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg " >
        <div class="container-fluid">
          <a class="navbar-brand" href="/Index.html">Mihan'z Catering</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="nav nav-tabs ">
                <li class="nav-item">
                  <a class="nav-link active " aria-current="page" href="/admin-dashboard">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Reservation
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="reservation/Pending/index.html">Pending</a></li>
                      <li><a class="dropdown-item" href="reservation/Approved/index.html">Approved</a></li>
                      <li><a class="dropdown-item" href="reservation/History/index.html">History</a></li>
                    </ul>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/admin/service') }}">Services</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle  " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Menu
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item " href="{{ url('/admin/menu/all') }}">All</a></li>
                    @foreach($categories as $category)
    <li><a class="dropdown-item" href="{{ url('/admin/menu/' . $category->menu_category) }}">{{ $category->menu_category }}</a></li>
@endforeach
                  </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ url('/admin/theme') }}">Themes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/user') }}">User</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="../Index.html">Logout</a>
                </li>
                            
                
            </ul>
          </div>
        </div>
      </nav>
      <main>

      
    @yield('content')

</main>



</body>

</html>