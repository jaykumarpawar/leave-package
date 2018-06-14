<?php

namespace Crazyboy\Leave\Http\Controllers;

use Crazyboy\Leave\Mail\PasswordSendMailable;
use Crazyboy\Leave\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use \Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $users = User::paginate(10);
            return view('leave::user.listuser')->with('users', $users);
        } else {
            return redirect()->route('user.edit', Auth::id());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leave::user.adduser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $user = new User();
            $user->fill($request->all());
            $user->password = "";
            $user->remember_token = str_random(10);
            $user->save();
            Mail::to($user->email)->send(new PasswordSendMailable($user));
            return redirect()->back();
        } else {
            return redirect()->route('user.edit', Auth::id());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->role == 'admin') {
            return View::make('leave::user.deleteuser')->with('user', $id);
        } else {
            return redirect()->route('user.edit', Auth::id());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->role == 'admin' or Auth::id() == $id) {
            $user = User::find($id);
            return view('leave::user.viewuser')->with(['user' => $user]);
        } else {
            return redirect()->route('user.edit', Auth::id());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->role == 'admin' or Auth::id() == $id) {
            $user = User::find($id);
            $user->fill($request->all());
            $user->save();
            return redirect()->back();
        } else {
            return redirect()->route('user.edit', Auth::id());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->role == 'admin' or Auth::id() == $id) {
            $user = User::destroy($id);
            return redirect()->back();
        } else {
            return redirect()->route('user.edit', Auth::id());
        }
    }

    public function getUser(Request $request)
    {
        if ($request->ajax()) {
            $users = User::paginate(10);
            $view = view('leave::user.usersearchlist', compact('users'))->render();
            return response($view);
        }
    }

    public function data($search)
    {
        return $users = User::where('id', $search)
            ->orWhere('firstname', 'LIKE', '%' . $search . '%')
            ->orWhere('middlename', 'LIKE', '%' . $search . '%')
            ->orWhere('lastname', 'LIKE', '%' . $search . '%')
            ->orWhere('gender', 'LIKE', '%' . $search . '%')
            ->orWhere('country', 'LIKE', '%' . $search . '%')
            ->orWhere('city', 'LIKE', '%' . $search . '%')
            ->orWhere('state', 'LIKE', '%' . $search . '%')
            ->paginate(10);
    }
    public function searchUser(Request $request)
    {
        if ($request->ajax()) {
            $users = $this->data($request['search']);
            if (!(empty($request['search']))) {
                $search = $request['search'];
                $view = view('leave::user.usersearchlist', compact('users', 'search'))->render();
                return response($view);
            }
        }
    }

    public function searchUserPage(Request $request)
    {
        if ($request->ajax()) {
            $users = $this->data($request['search']);
            return view('leave::user.usersearchlist', compact('users'))->render();
        }
    }
}
