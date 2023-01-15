<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailVerificationRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request, int $id)
    {
        $user = User::find($id);

        if ($user->hasVerifiedEmail()) {
            return to_route(RouteServiceProvider::HOME);
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return to_route(RouteServiceProvider::HOME);
    }
}
