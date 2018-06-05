@extends('leave::index') @push('title') Leave @endpush @section('content')
<nav class="navbar navbar-expand navbar-dark bg-secondary">
    <a class="navbar-brand" href="#">Leave Package</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('signout')}}">Signout</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row py-5">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-white">Your Leaves</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Leave</h6>
                        <small class="text-muted">Leave Message</small>
                    </div>
                    <span class="text-muted">1</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total Leaves</span>
                    <strong>1</strong>
                </li>
            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <div class="card bg-secondary text-white">
                <div class="card-header">
                    <h5 class="text-white">Apply Leave</h5>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate action="{{route('leave')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="applyTo">Apply To</label>
                                <input type="text" class="form-control" readonly id="applyTo" value="Admin" required name="applyto">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="duration">Duration</label>
                                <input type="text" class="form-control" id="duration" required name="duration" />
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="leavetype">Leave Type</label>
                                <div class="input-group">
                                    <select class="custom-select" id="leavetype" name="leavetype">
                                        <option selected hidden>Choose...</option>
                                        <option value="1">Casual</option>
                                        <option value="2">Medical</option>
                                    </select>
                                </div>
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="leavecategory">Leave Category</label>
                                <div class="input-group">
                                    <select class="custom-select" id="leavecategory" name="leavecategory">
                                        <option selected hidden>Choose...</option>
                                        <option value="1">Full Day</option>
                                        <option value="2">Half Day</option>
                                    </select>
                                </div>
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
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
                            <div class="col-md-12 mb-3">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Apply</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
