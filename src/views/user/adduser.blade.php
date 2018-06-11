@extends('leave::index') @push('title') Leave @endpush @section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card bg-secondary text-white">
                <div class="card-header">
                    <div class="card-title">
                        <h5 class="text-white pt-2">Add User</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form novalidate class="needs-validation" action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" id="firstName" required name="firstname" placeholder="First Name">
                                <div class="invalid-feedback">
                                    Required valid.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" id="lastName" required name="lastname" placeholder="Last Name">
                                <div class="invalid-feedback">
                                    Required valid.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" required name="email" placeholder="Email">
                                <div class="invalid-feedback">
                                    Required valid.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="userRole">Role</label>
                                <select name="role" required class="form-control" style="width: 100%;">
                                    <option value="">Choose...</option>
                                    <option value="divorced">Admin</option>
                                    <option value="widowed">Employee</option>
                                </select>
                                <div class="invalid-feedback">
                                    Required valid.
                                </div>
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
@endsection
