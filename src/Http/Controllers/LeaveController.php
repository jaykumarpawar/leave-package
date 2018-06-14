<?php

namespace Crazyboy\Leave\Http\Controllers;

use App\Http\Controllers\Controller;
use Crazyboy\Leave\Models\Leave;
use Crazyboy\Leave\Models\User;
use Illuminate\Http\Request;
use \Auth;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::where('userid', Auth::id())->get();
        $reportto = User::find(Auth::user()->reportto);
        $user = User::find(Auth::id());
        return view('leave::leave.applyleave')->with([
            'reportto' => $reportto,
            'leaves' => $leaves,
            'user' => $user,
        ]);
    }

    public function send(Request $request)
    {
        $mail = User::find(Auth::user()->reportto)->email;
        // Mail::to($mail)->send(new LeaveMailable($request->all()));
        $leave = new Leave();
        $leave->fill($request->all());
        $leave->userid = Auth::id();
        $leave->leavestatus = '0';
        $leave->save();
        return redirect()->back();
    }

    function list() {
        $leaves = Leave::where('applyto', Auth::id())->paginate(10);
        return view('leave::leave.listleave')->with([
            'leaves' => $leaves,
        ]);
    }

    public function view($id)
    {
        if (Auth::user()->role == 'admin') {
            $leave = Leave::find($id);
            return view('leave::leave.viewleave')->with([
                'leave' => $leave,
            ]);
        }
    }

    public function update(Request $request)
    {
        $leave = Leave::find($request->leaveid);
        $employee_mail = User::find($request->userid)->email;
        $sdate = $request->startdate;
        $edate = $request->enddate;
        $subcategory = $request->leavesubcategory;
        $status = $request->leavestatus;
        $user_leave_balance = User::find($request->userid)->leavebalance;
        $user_paid_leaves = User::find($request->userid)->unpaidleaves;

        if ($sdate == $edate and is_null($subcategory)) {
            $days = 1;
        } elseif ($sdate == $edate and $subcategory == 0 or $sdate == $edate and $subcategory == 1) {
            $days = 0.5;
        } else {
            $days = $this->dateRange($sdate, $edate, '+1 day'); //, 'Y-m-d');
        }
        if ($status == 1 and $leave->leavestatus == 0 or $status == 1 and $leave->leavestatus == 2) {

            if ($days > $user_leave_balance) {
                $paid_leaves = $days - $user_leave_balance;
                Leave::where('id', $request->leaveid)->update([
                    'leavestatus' => $request->leavestatus,
                ]);
                User::where('id', $leave->userid)->update([
                    'leavebalance' => 0.0,
                    'unpaidleaves' => $user_paid_leaves + $paid_leaves,
                ]);
            } else {
                Leave::where('id', $request->leaveid)->update([
                    'leavestatus' => $request->leavestatus,
                ]);
                User::where('id', $leave->userid)->update([
                    'leavebalance' => $user_leave_balance - $days,
                ]);
            }
        } elseif ($status == 2 and $leave->leavestatus == 0 or $status == 1 and $leave->leavestatus == 1) {
            Leave::where('id', $request->leaveid)->update([
                'leavestatus' => $request->leavestatus,
            ]);
        } elseif ($status == 2 and $leave->leavestatus == 1) {
            $paid_leaves = User::find($leave->userid)->unpaid_leaves;

            if (is_null($paid_leaves)) {
                Leave::where('id', $request->leaveid)->update([
                    'leavestatus' => $request->leavestatus,
                ]);

                User::where('id', $leave->userid)->update([
                    'leavebalance' => $user_leave_balance + $days,
                ]);
            } else {
                $debit_paid_leaves = 0.0;
                if ($paid_leaves > $days) {
                    $credit_balance = $paid_leaves - $days;
                    $debit_paid_leaves = $days;
                    Leave::where('id', $request->leaveid)->update([
                        'leavestatus' => $request->leavestatus,
                    ]);
                    User::where('id', $leave->userid)->update([
                        'leavebalance' => $user_leave_balance,
                        'unpaidleaves' => $paid_leaves - $debit_paid_leaves,
                    ]);
                } else {
                    $credit_balance = $days - $paid_leaves;
                    $debit_paid_leaves = abs($credit_balance - $days);
                    Leave::where('id', $request->leaveid)->update([
                        'leavestatus' => $request->leavestatus,
                    ]);
                    User::where('id', $leave->userid)->update([
                        'leavebalance' => $user_leave_balance + $credit_balance,
                        'unpaidleaves' => $paid_leaves - $debit_paid_leaves,
                    ]);
                }
            }
        }
        return redirect()->back()->withSuccess('Your Leave request successfully updated.');
    }

    public function dateRange($first, $last, $step)
    {
        $i = $off_days = $working_days = 0;
        $interval = date_diff(date_create($first), date_create($last));
        $total_days = $interval->format('%a') + 1;
        $current = strtotime($first);
        $last = strtotime($last);

        while ($current <= $last) {
            if (date("D", $current) == 'Sun') {
                $off_days = $off_days + 1;
            }
            $current = strtotime($step, $current);
        }

        $working_days = $total_days - $off_days;
        return $working_days;
    }
}
