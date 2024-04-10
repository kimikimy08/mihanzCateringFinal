<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- FullCalendar CSS -->
    <link rel="stylesheet" href="https://unpkg.com/@fullcalendar/core@6.1.10/main.min.css" />
    <!-- FullCalendar DayGrid plugin CSS -->
    <link rel="stylesheet" href="https://unpkg.com/@fullcalendar/daygrid@6.1.10/main.min.css" />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
    <title>Mihanz Catering | Admin</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg " >
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ url('/') }}">Mihanz Catering</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="nav nav-tabs ">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('admin-dashboard') ? 'active' : '' }} " aria-current="page" href="/admin-dashboard">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ Request::is('admin/reservation/*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Reservation
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item {{ Request::is('admin/reservation/all') ? 'active' : '' }}" href="{{ url('/admin/reservation/all') }}">All</a></li>
            <li><a class="dropdown-item {{ $status === 'pending' ? 'active' : '' }}" href="{{ url('/admin/reservation/pending') }}">Pending</a></li>
            <li><a class="dropdown-item {{ $status === 'approved' ? 'active' : '' }}" href="{{ url('/admin/reservation/approved') }}">Approved</a></li>
            <li><a class="dropdown-item" href="{{ url('/admin/reservation/history') }}">History</a></li>
        </ul>
    </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('admin/service') ? 'active' : '' }}" href="{{ url('/admin/service') }}">Services</a>
                </li>
                <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ Request::is('admin/menu*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item {{ Request::is('admin/menu/all') ? 'active' : '' }}" href="{{ url('/admin/menu/all') }}">All</a></li>
            @foreach($categories as $category)
                <li><a class="dropdown-item {{ Request::is('admin/menu/' . $category->menu_category) ? 'active' : '' }}" href="{{ url('/admin/menu/' . $category->menu_category) }}">{{ $category->menu_category }}</a></li>
            @endforeach
        </ul>
    </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/theme') ? 'active' : '' }} " href="{{ url('/admin/theme') }}">Themes</a>
                  </li>
                  <li class="nav-item">
                    {{-- Additional Services --}}
                    <a class="nav-link {{ Request::is('admin/additional') ? 'active' : '' }} " href="{{ url('/admin/additional') }}">Additional Services</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link nav-link {{ Request::is('admin/user') ? 'active' : '' }}" href="{{ url('/admin/user') }}">User</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">Logout</a>
                </li>
                            
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </ul>
          </div>
        </div>
      </nav>
      <main>

      
    @yield('content')

</main>

<script src="https://unpkg.com/moment@2.29.1/moment.min.js"></script>
    <script src="https://unpkg.com/@fullcalendar/core@6.1.10/main.min.js"></script>
    <script src="https://unpkg.com/@fullcalendar/daygrid@6.1.10/main.min.js"></script>

</body>

</html>