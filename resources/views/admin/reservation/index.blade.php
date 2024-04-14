@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<h1 class="display-1 ">{{ ucwords($status) }} Reservation</h1>
        
    <section class="section-pending" >
          <table class="table">
          @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
        @endif

          @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Contact No.</th>
                <th scope="col">Date of Event</th>
                <th scope="col">Time of Event</th>
                <th scope="col">Type of Event</th>
                <th scope="col">Package Type</th>
                <th scope="col">Reservation Status</th>
                <th scope="col"></th>
              </tr>
            </thead>
            
            <tbody>
            @foreach($events as $event)
              <tr>
                <th scope="row">{{ $event['id'] }}</th>
                <td>{{ $event['name'] }}</td>
                <td>{{ $event['contact_number'] }}</td>
                <td>{{ $event['event_date'] }} </td>
                <td>{{ $event['event_time'] }} </td>
                <td>@if ($event['choice'] == 'premade' && $event['service_category'])
                        {{ $event['service_category'] }}
                        @elseif ($event['choice'] == 'customize' && $event['category_name'])
                        {{ $event['category_name'] }}
                        @endif</td>
                <td>@if ($event['choice'] == 'premade' && $event['premade_package'])
                        {{ $event['premade_package'] }}
                        @elseif ($event['choice'] == 'customize')
                        Customized
                        @endif</td>
                <td>{{ $event['reservation_status'] }}</td>
                <td>
                  <button type="button" class="btn btn-primary"><a href="{{ route('call-status.index', ['id' => $event['id']]) }}" class="">Status</a> </button>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Viewreservation{{ $event['id'] }}">
                            View
                        </button>
                  <!-- <button type="button" class="btn btn-secondary"><a href="edit.html">Edit</a></button> -->
                  <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#Editreservation{{ $event['id'] }}">
                Edit
            </button>
            <form action="{{ route('reservation.destroy', $event['id']) }}" method="post" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this reservation?')">Delete</button>
            </form>
                </td>
              </tr>


              @endforeach
            </tbody>
          </table>

        </section>
        @foreach($events as $event)
        
        @include('admin.reservation.viewreservation', ['event' => $event])
        @include('admin.reservation.editreservation', ['event' => $event])
    @endforeach

        @endsection