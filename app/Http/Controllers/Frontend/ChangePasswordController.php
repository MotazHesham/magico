<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use Gate; 
use Symfony\Component\HttpFoundation\Response;

class ChangePasswordController extends Controller
{
    public function edit()
    {
        abort_if(Gate::denies('profile_password_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.auth.passwords.edit');
    }

    public function update(UpdatePasswordRequest $request)
    {
        auth()->user()->update($request->validated());

        return redirect()->route('frontend.profile.password.edit')->with('message', __('global.change_password_success'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $user->update($request->validated());

        return redirect()->route('frontend.profile.password.edit')->with('message', __('global.update_profile_success'));
    }

    public function destroy()
    {
        $user = auth()->user();

        $user->update([
            'email' => time() . '_' . $user->email,
        ]);

        $user->delete();

        return redirect()->route('login')->with('message', __('global.delete_account_success'));
    }
}
