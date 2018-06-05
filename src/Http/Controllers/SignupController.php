<?php

namespace Crazyboy\Leave\Http\Controllers;

use App\Http\Controllers\Controller;
use Crazyboy\Leave\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class SignupController extends Controller
{
    public function index()
    {
        return view('leave::signup');
    }

    public function signup(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back();
        } else {
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);
            return redirect()->route('signin');
        }
    }
}
