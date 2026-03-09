<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
       $user = Auth::user();

        if ($user->role === "admin") {
            return redirect()->route('admin.dashboard' )->with('success', 'login successful!');
        }

        return redirect()->route('user.dashboard')->with('success', 'login successful!');

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
