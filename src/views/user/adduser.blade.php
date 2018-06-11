@extends('leave::index') @push('title') Leave @endpush @section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card bg-secondary text-white">
                @if (Session::has('success'))
                    <div class="bd-example">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ Session::get('success') }}
                        </div>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="bd-example">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="card-header">
                    <div class="card-title">
                        <img data-src="holder.js/32x32?theme=thumb&amp;bg=e83e8c&amp;fg=e83e8c&amp;size=1" alt="32x32" class="rounded-circle img-thumbnail float-right"
                            src="https://cdn1.iconfinder.com/data/icons/business-charts/512/customer-512.png" data-holder-rendered="true"
                            style="width: 42px; height: 42px;color:white">
                        <h5 class="text-white pt-2">Profile</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form novalidate class="needs-validation" action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" id="firstName" required name="firstname" placeholder="First Name">
                                <div class="invalid-feedback">
                                    Required valid.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" id="lastName" required name="lastname" placeholder="Last Name">
                                <div class="invalid-feedback">
                                    Required valid.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" required name="email" placeholder="Email">
                                <div class="invalid-feedback">
                                    Required valid.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
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
