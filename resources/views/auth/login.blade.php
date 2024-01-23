@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mihanz Catering | Home</title>
    <link rel="stylesheet" href="/USER/CSS/Form.css">
</head>
<nav>
    <h1>Mihanz Catering</h1>

    <ul>
        <li>
            <a href="./Home.html"><FaHouseChimney/> Home</a>
        </li>
        <li>
            <a href="./Menu.html"><FaBookOpen/> Menu</a>
        </li>
        <li>
            <a href="./Services.html"><MdFoodBank/> Services</a>
        </li>
        <li>
            <a href="./Themes.html"><FaBrush/> Themes</a>
        </li>
    </ul>


</nav>
<body>
    <div class="Login-Container">
            

    <form method="POST" action="{{ route('login') }}">
                        @csrf
        <h1 class="Login">{{ __('Login') }}</h1>
        <label>{{ __('Email Address') }}</label> <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">

        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
           
            <label>{{ __('Password') }}</label> <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror


           <div class="btn-Login"><button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                            <button class="btn btn-primary">    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a> </button>
 </div> 
        </form>
</div>
    
</body>
<footer>
    <h1>
        Mihanz <br/> Catering
    </h1>

    <ul>
        <li>
            <label for="getInTouch">Get in touch</label>
            <br/><a href="https://www.facebook.com/profile.php?id=100066545202436" target="_blank" rel="noreferrer"><FaFacebook/>Facebook</a>
        </li>
        <li>
            <label for="Contact">Contact</label><br/>
            <a href="#"> <FaMobileScreen/>0926-563-1143 <br/>
               <FaMobileScreen/> 0916-412-2250</a>
         </li>
         <li>
            <label for="Location">Location</label> <br/>
            <a href="https://goo.gl/maps/eYMwkLUwLh3tVrsLA" target="_blank" rel="noreferrer"><FaMapLocationDot/> Calderon St. Subic
                Baliwag, Bulacan</a>
         </li>
            <a href="/ADMIN/Index.html"> Admin</a>
    </ul>
   
</footer>
</html>

@endsection
