@extends('leave::index') @push('title') Leave @endpush @section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-secondary rounded">
                <div class="card-header">
                    <h4 class="card-title text-white">Leaves</h4>
                </div>
                <div class="result">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover table-striped table-bordered" id="userTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Subcategory</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Reason</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaves as $leave)
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
                                    }if($leave->leavesubcategory == 1){
                                        $subcategory = 'Second Half';
                                    }else{
                                        $subcategory = 'N.A.';
                                    }
                                    if($leave->leavestatus == '0'){
                                        $status = 'Pending';
                                    }elseif($leave->leavestatus == '1'){
                                        $status = 'Approved';
                                    }else{
                                        $status = 'Rejeceted';
                                    }
                                @endphp
                                <tr>
                                    <td class="text-capitalize" scope="row">{{$leave->id}}</td>
                                    <td class="text-capitalize">{{$leave->startdate}}</td>
                                    <td class="text-capitalize">{{$leave->enddate}}</td>
                                    <td class="text-capitalize">{{$type}}</td>
                                    <td class="text-capitalize">{{$category}}</td>
                                    <td class="text-capitalize">{{$subcategory}}</td>
                                    <td class="text-capitalize">{{$status}}</td>
                                    <td class="w-25 text-capitalize">{{$leave->reason}}</td>
                                    <td class="text-capitalize">
                                        <a href="{{route('viewleave',$leave->id)}}" class="btn btn-primary">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="10">
                                        {{$leaves->render()}} Showing {{$leaves->firstItem()}} to {{$leaves->lastItem()}} of {{$leaves->total()}} entries
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
