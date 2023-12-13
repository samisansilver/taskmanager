<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use PharIo\Version\AbstractVersionConstraint;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function getDifTimeLogin()
    {
        $user = User::findOrFail(1)->last_login;
//        $sam = date('Y-m-d', strtotime($user->last_login));
        $now = \verta($user)->formatDate('Y-m-d');
        return Carbon::yesterday()->diffInDays($user);
//        return \verta($now)->diffDays();
//        echo verta($now)->diffDays();
//        $converttodd = Carbon::setTranslator($user);
////        $userlast = Verta::createGregorian($user);
        /*$sami = Verta::today();
        return Verta::GregorianToJalali($sami);
        die();
        $date = Verta::createGregorian($userlast);
        $date = Carbon::getHumanDiffOptions($userlast);
        return $logdate;*/
    }
}
