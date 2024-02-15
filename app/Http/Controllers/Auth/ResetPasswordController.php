<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];
    }

    public function reset(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        // Reset the password
        $response = $this->broker()->reset(
            $this->credentials($request),
            function ($user, $password) {
                $this->updatePassword($user, $password);
            }
        );

        // Check the response from the password broker
        if ($response == Password::PASSWORD_RESET) {
            // Password reset successfully, log in the user if needed
            return redirect()->route('welcome')->with('status', trans($response));
        } else {
            // Password reset failed, redirect back with an error message
            return back()->withErrors(['email' => trans($response)]);
        }
    }

    protected function updatePassword($user, $password)
{
    // Update the user's password
    $user->password = Hash::make($password);
    $user->password_reset_token = null; // Set token to null after reset
    $user->setRememberToken(Str::random(60));
    $user->save();
}
}
