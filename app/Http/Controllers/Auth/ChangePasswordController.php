<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('back.login.change_password');
    }

    public function process(Request $request)
    {
        $user = Auth::user();

        $validate = $this->validate($request, [
                'new_password'              => 'required|min:4',
                'password_confirmation' => 'required|same:new_password',
                'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        return $fail(__('Password lama salah.'));
                    }
                }]
        ]);

        $request->user()->fill([
            'password' => Hash::make($request->new_password)
        ])->save();

        session()->flash('message', 'Password berhasil diubah.');

        return redirect()->route('change_password');
    }
}
