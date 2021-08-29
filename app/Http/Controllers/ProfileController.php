<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('front.user.profile.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('front.user.profile.edit', compact('user'));

    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
            'avatar' => 'nullable|image',
        ]);

        $user = Auth::user();
        $data = $request->all();
        if ($file = User::uploadImage($request, $user->avatar)) {
            $data['avatar'] = $file;
        }

        $data['password'] = User::getPassword($data['password'], $user);

        $user->update($data);

        return redirect()->route('profile')->with('success', 'Профиль обновлён');

    }
}
