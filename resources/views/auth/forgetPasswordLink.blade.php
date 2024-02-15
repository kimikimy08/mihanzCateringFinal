@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Create New Password</b></div>

                <div class="card-body">
                    
                    <form method="POST" action="{{ route('reset.password.post') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                        <div class="row mb-3">
                            <label for="newPassword" class="col-md-4 col-form-label text-md-end">New Password</label>

                            <div class="col-md-6">
                                <input id="newPassword" type="password" class="form-control " name="newPassword" value="" required placeholder="Type new password..." autofocus>

                                
                                                            </div>
                                                            
                        </div>
                        <div class="row mb-3">
                            <label for="confirmPassword" class="col-md-4 col-form-label text-md-end">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="newPassword" type="password" class="form-control " name="confirmPassword" value="" required  placeholder="Type confirm password..." autofocus>

                                
                                                            </div>
                                                            
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Reset Password
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
