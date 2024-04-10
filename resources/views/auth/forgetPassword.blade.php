@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fw-bolder"><b>Reset Password</b></div>

                <div class="card-body">
                    
                    <form method="POST" action="{{ route('forget.password.post') }}">
                    @csrf
                        <input type="hidden" name="_token" value="XFZcyCTyNLKOiqsmDjqBHbhPiFv2ZrcNL1kmiwJh">
                        <div class="row mb-3">
                            <label for="email_address" class="col-md-4 col-form-label text-md-end">Email Address</label>

                            <div class="col-md-6">
                                <input id="email_address" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus>

                                                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
