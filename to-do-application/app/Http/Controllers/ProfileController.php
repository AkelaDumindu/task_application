<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Termwind\Components\Dd;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        // dd("assa");
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
{
    $user = $request->user();

    $validatedData = $request->validated();

    // Handle avatar upload
    if ($request->hasFile('avatar')) {
        $avatarFile = $request->file('avatar');
        $avatarName = time() . '.' . $avatarFile->getClientOriginalExtension();
        $avatarFile->move(public_path('avatars'), $avatarName);

        
        if ($user->avatar && $user->avatar !== 'avatars/default.png') {
            $oldAvatarPath = public_path($user->avatar);
            if (file_exists($oldAvatarPath)) {
                unlink($oldAvatarPath);
            }
        }

        $validatedData['avatar'] = 'avatars/' . $avatarName;
    }

    // Check if email is updated and reset verification
    if ($user->email !== $validatedData['email']) {
        $user->email_verified_at = null;
    }

    $user->update($validatedData);

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
}
