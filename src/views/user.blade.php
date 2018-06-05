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
                <a class="nav-link" href="{{route('user')}}">Home</a>
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
    <div class="row py-2">
        <div class="col-md-12">
            <div class="card bg-secondary text-white">
                <div class="card-header">
                    <div class="card-title">
                        <img data-src="holder.js/32x32?theme=thumb&amp;bg=e83e8c&amp;fg=e83e8c&amp;size=1" alt="32x32" class="rounded-circle float-right img-thumbnail"
                            src="https://cdn1.iconfinder.com/data/icons/business-charts/512/customer-512.png" data-holder-rendered="true"
                            style="width: 42px; height: 42px;color:white">
                        <h3 class="text-white">Profile</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form novalidate action="{{route('profile')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" id="firstName" required name="firstname" placeholder="First Name">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="middleName">Middle Name</label>
                                <input type="text" class="form-control" id="middleName" required name="middlename" placeholder="Middle Name">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" id="lastName" required name="lastname" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" required name="dob" />
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="dob">Gender</label>
                                <div class="form-control bg-secondary text-white">
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="option1" checked>
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="option2">
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="bloogroup">Blood Group</label>
                                <select name="blood_group" required="" class="form-control" style="width: 100%;">
                                    <option value="A+">A+</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="image">Profile Image</label>
                                <div class="input-group mb-2">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="image">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="contact">Mobile Number</label>
                                <input type="text" class="form-control" id="contact" required name="contact" placeholder="Conatct Number" pattern="/^(\+\d{1,3}[- ]?)?\d{10}$/"
                                />
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="bloogroup">Marital Status</label>
                                <select name="marital_status" required class="form-control" style="width: 100%;">
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="country">Country</label>
                                <input class="form-control" type="text" name="country" id="country">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="state">State</label>
                                <input class="form-control" type="text" name="state" id="state">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="city">City</label>
                                <input class="form-control" type="text" name="city" id="city">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="addresss" placeholder="Address" required name="address" rows="2"></textarea>
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
