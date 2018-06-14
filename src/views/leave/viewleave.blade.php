@php
    if($leave->leavetype == 1){
        $type = 'Casual';
    }else{
        $type = 'Medical';
    }
    if($leave->leavecategory == 1){
        $category = 'Full Day';
    }else{
        $category = 'Half Day';
    }
    if($leave->leavesubcategory == 1){
        $subcategory = 'First Half';
    }else{
        $subcategory = 'Second Half';
    }
    if($leave->status == 0){
        $status = 'Pending';
    }elseif($leave->status == 1){
        $status = 'Approved';
    }else{
        $status = 'Rejeceted';
    }
@endphp
@extends('leave::index')
@push('title')
    Leave
@endpush
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 order-md-1 offset-md-2">
            <div class="card bg-secondary text-white">
                <div class="card-header">
                    <h5 class="text-white">View Leave</h5>
                </div>
                <div class="card-body">
                {{-- {{dd($leave)}} --}}
                    <form class="needs-validation" novalidate action="{{route('updateleave')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="leavestatus">Status</label>
                                <div class="input-group">
                                    <select class="custom-select" id="leavestatus" name="leavestatus" required>
                                        <option value="">Pending</option>
                                        <option value="1">Approved</option>
                                        <option value="2">Rejected</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select valid leave type
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="duration">Duration</label>
                                <input type="text" class="form-control" id="duration" readonly value="{{$leave->startdate.' - '.$leave->enddate}}">
                                <input type="hidden" name="startdate" value="{{$leave->startdate}}">
                                <input type="hidden" name="enddate" value="{{$leave->enddate}}">
                                <input type="hidden" name="leaveid" value="{{$leave->id}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="applyTo">Apply To</label>
                                <input type="text" class="form-control" readonly id="applyTo" value="{{Auth::user()->firstname .' '.Auth::user()->lastname}}">
                                <input type="hidden" name="applyto" value="{{Auth::id()}}">
                                <input type="hidden" name="userid" value="{{$leave->userid}}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="leavetype">Leave Type</label>
                                <div class="input-group">
                                <input class="form-control" readonly id="leavetype" type="text" value="{{$type}}">
                                <input type="hidden" name="leavetype" value="{{$leave->leavetype}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="leavecategory">Leave Category</label>
                                <div class="input-group">
                                    <input class="form-control" readonly id="leavecategory" type="text" value="{{$category}}">
                                    <input type="hidden" name="leavecategory" value="{{$leave->leavecategory}}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="leavesubcategory">Leave Subcategory</label>
                                <div class="input-group">
                                    <input class="form-control" readonly id="leavesubcategory" type="text" value="{{$subcategory}}">
                                    <input type="hidden" name="leavesubcategory" value="{{$leave->leavesubcategory}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="reason">Reason</label>
                                <textarea class="form-control" id="reason" placeholder="Reason" readonly name="reason" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-lg float-right" type="submit">Submit</button>
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
