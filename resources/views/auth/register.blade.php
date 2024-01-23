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
            <a href="./Themes.html"><FaBrush/> Theme</a>
        </li>
    </ul>


</nav>
<body>
    <div class="SignUp-Container">
        
    <form  class="SignUp-Form" method="POST" action="{{ route('register') }}">
                        @csrf

        <div><h1>SignUp</h1></div>
            <label>{{ __('Name') }}</label>

             <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">

                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    
            <label>{{ __('Address') }}</label>

            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autofocus placeholder="Address">

                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    
            <label>{{ __('Contact Number') }}</label>
            
            <input id="contact_number" type="text" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ old('contact_number') }}" required autofocus placeholder="Contact Number">

                    @error('contact_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    
            <label>{{ __('Email') }}</label>
    
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus  autocomplete="email" placeholder="Email">

                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    
            <label>{{ __('Password') }}</label>

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
            

                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    
            <label>{{ __('Confirm Password') }}</label>

            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
    
            <div class="btn-Login"><button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button> </div> 
        </form>
        
            
            
            
            
            
            </div>
    
</body>

</html>


@endsection
