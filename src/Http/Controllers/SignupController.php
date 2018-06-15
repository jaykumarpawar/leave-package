<?php

namespace Crazyboy\Leave\Http\Controllers;

use App\Http\Controllers\Controller;
use Crazyboy\Leave\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class SignupController extends Controller
{
    public function index()
    {
        $id = request()->id;
        $token = request()->token;
        $var = User::where('id', '=', $id)->where('remember_token', '=', $token)->count();
        if ($var > 0) {
            return view('leave::signup');
        } else {
            return redirect()->route('signin');
        }
    }

    public function signup(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);
        $user = User::find($request->id);
        dd($user);
        $user->password = Hash::make($request->password);
        $user->remember_token = '';
        $user->save();
        return redirect()->route('signin');
        // }
    }
}
