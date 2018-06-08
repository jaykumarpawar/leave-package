<?php

namespace Crazyboy\Leave\Http\Controllers;

use App\Http\Controllers\Controller;
use Crazyboy\Leave\Mail\LeaveMailable;
use Crazyboy\Leave\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::where('');
        return view('leave::applyleave');
    }

    public function send(Request $request)
    {
        Mail::to(config('leave.send_email_to'))->send(new LeaveMailable($request->all()));
        Leave::create($request->all());
        return redirect()->back();
    }
}
