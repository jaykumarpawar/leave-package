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
        dd($var);
        if ($var > 0) {
            dd(request()->id);
            return view('leave::signup');
        } else {
            return redirect()->route('signin');
        }
    }

    public function signup(Request $request)
    {
        $items = $request->validate([
            'password' => 'required|confirmed',
        ]);

        // if ($validator) {
        // Session::flash('success', "User Credential do not match our records");
        // return redirect()->back();
        // } else {
        $user = User::find($request->id);
        $user->password = Hash::make($request->password);
        $user->remember_token = '';
        $user->save();
        return redirect()->route('signin');
        // }
    }
}
