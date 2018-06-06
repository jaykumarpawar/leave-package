<?php

namespace Crazyboy\Leave\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class SigninController extends Controller
{

    public function index()
    {
        return view('leave::signin');
    }

    public function signin(Request $request)
    {
        $rules = array(
            'email' => 'required|email',
            'password' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back();
        } else {
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password'),
            );
            if (Auth::attempt($userdata)) {
                return redirect()->route('user.index');
            } else {
                return redirect()->back()->with('errors', 'Your credential not match to our records');
            }
        }
    }

    public function signout(Request $request)
    {
        $request->session()->flush();
        Auth::logout(); // logging out user
        return redirect()->route('signin');
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
