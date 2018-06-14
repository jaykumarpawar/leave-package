@extends('leave::index')
@push('title')
    Leave
@endpush
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-white">Your Leaves</span>
                {{-- <span class="badge badge-secondary badge-pill"></span> --}}
            </h4>
            <ul class="list-group mb-3">
                @foreach ($leaves as $leave)
                    <li class="list-group-item d-flex justify-cont`ent-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{$leave->startdate.' - '.$leave->enddate}}</h6>
                            <small class="text-justify text-muted">{{$leave->reason}}</small>
                        </div>
                        {{-- <span class="text-muted"></span> --}}
                        @php
                            if($leave->leavestatus=='0'){
                                $color='secondary';
                                $status = 'Pending';}
                            elseif($leave->leavestatus=='1'){
                                $color='success';
                                $status = 'Approved';}
                            else{
                                $color='danger';
                                $status = 'Rejected';}
                        @endphp
                        <div>
                            {{-- <h6 class="my-0">{{$leave->startdate.' - '.$leave->enddate}}</h6> --}}
                            <span class="badge badge-{{$color}}">{{$status}}</span>
                        </div>

                    </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <span>Available Leaves</span>
                    <strong>{{$user->leavebalance.' days'}}</strong>
                </li>
                @if($user->leavebalance <= 0)
                    <li class="list-group-item d-flex justify-content-between">
                        <span class="text-danger text-bold">Paid Leaves</span>
                        <strong>{{$user->unpaidleaves.' days'}}</strong>
                    </li>
                @endif
            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <div class="card bg-secondary text-white">
                <div class="card-header">
                    <h5 class="text-white">Apply Leave</h5>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate action="{{route('sendleave')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="startdate">Start Date</label>
                                <input type="date" class="form-control" id="startdate" required name="startdate">
                                <div class="invalid-feedback">
                                    Start date required
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="enddate">End Date</label>
                                <input type="date" class="form-control" id="enddate" required name="enddate" />
                                <div class="invalid-feedback">
                                    End date required
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="applyTo">Apply To</label>
                                <input type="text" class="form-control" readonly id="applyTo" value="{{$reportto->firstname .' '.$reportto->lastname}}">
                                <input type="hidden" name="applyTo" value="{{$reportto->id}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="leavetype">Leave Type</label>
                                <div class="input-group">
                                    <select class="custom-select" id="leavetype" name="leavetype" required>
                                        <option value="">Choose...</option>
                                        <option value="1">Casual</option>
                                        <option value="2">Medical</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select valid leave type
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="leavecategory">Leave Category</label>
                                <div class="input-group">
                                    <select class="custom-select" id="leavecategory" name="leavecategory" required>
                                        <option value="">Choose...</option>
                                        <option value="1">Full Day</option>
                                        {{-- <option value="2">Half Day</option> --}}
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select valid leave category
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="leavesubcategory">Leave Subcategory</label>
                                <div class="input-group">
                                    <select class="custom-select" id="leavesubcategory" name="leavesubcategory" required disabled>
                                        <option value="1">First Half</option>
                                        <option value="2">Second Half</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select valid leave category
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="reason">Reason</label>
                                <textarea class="form-control" id="reason" placeholder="Reason" required name="reason" rows="3"></textarea>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-lg float-right" type="submit" @if($user->leavebalance <= 0) disabled @endif>Submit</button>
                                <button class="btn btn-default btn-lg float-left" type="reset">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @push('script')
<script>
    $('#startdate,#enddate').change(function () {
                Date.prototype.sameDay = function (d) {
                    return this.getFullYear() === d.getFullYear() &&
                        this.getDate() === d.getDate() &&
                        this.getMonth() === d.getMonth();
                }
                var sdate = new Date($('#startdate').val());
                var edate = new Date($('#enddate').val());
                if (sdate.sameDay(edate)) {
                    $("#leavecategory").append('<option value="2">Half Day</option>');
                } else {
                    $("#leavecategory option[value='2']").remove();
                }
    });

            $('#leavecategory').change(function () {

                if ($(this).val() == 2) {
                    event.preventDefault();
                    $('#leavesubcategory').removeAttr("disabled")
                }
                if ($(this).val() != 2) {
                    event.preventDefault();
                    $('#leavesubcategory').prop("disabled", true);
                    $('#leavesubcategory').val('');
                }
            });

</script>
@endpush
