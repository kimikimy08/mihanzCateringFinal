<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\PasswordResetNotification;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomResetPassword;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    protected function sendResetLinkResponse(Request $request, $response)
    {
        return back()->with('status', trans($response));
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()->withErrors(
            ['email' => trans($response)]
        );
    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
{
    $this->validateEmail($request);

    // Use the password broker to get the user by email
    $user = $this->broker()->getUser(['email' => $request->input('email')]);

    if ($user) {
        $token = $this->broker()->createToken($user);
        $user->forceFill([
            'password_reset_token' => $token,
        ])->save();
        $user->notify(new PasswordResetNotification($token));
        Mail::to($request->email)->send(new CustomResetPassword($user, $token));
    }

    return $this->sendResetLinkResponse($request, 'passwords.sent');
}

    private function getToken($user)
    {
        return $this->broker()->createToken($user);
    }
}