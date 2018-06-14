@extends('leave::index') @push('title') Leave @endpush @section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-secondary text-white">
                <div class="card-header">
                    <div class="card-title">
                        <img data-src="holder.js/32x32?theme=thumb&amp;bg=e83e8c&amp;fg=e83e8c&amp;size=1" alt="32x32" class="rounded-circle img-thumbnail float-right"
                            src="https://cdn1.iconfinder.com/data/icons/business-charts/512/customer-512.png" data-holder-rendered="true"
                            style="width: 42px; height: 42px;color:white">
                        <h5 class="text-white pt-2">Profile</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form novalidate class="needs-validation" action="{{route('user.update',Auth::id())}}" method="post" enctype="multipart/form-data">
                        @method('put') @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" id="firstName" required name="firstname" placeholder="First Name" value="{{$user->firstname or ''}}">
                                <div class="invalid-feedback">
                                    Required valid.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="middleName">Middle Name</label>
                                <input type="text" class="form-control" id="middleName" required name="middlename" placeholder="Middle Name" value="{{$user->middlename or ''}}">
                                <div class="invalid-feedback">
                                    Required valid.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" id="lastName" required name="lastname" placeholder="Last Name" value="{{$user->lastname or ''}}">
                                <div class="invalid-feedback">
                                    Required valid.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" required name="dob" value="{{$user->dob or ''}}">
                                <div class="invalid-feedback">
                                    Required valid.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="dob">Gender</label>
                                <div class="form-control bg-secondary text-white">
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" @if($user->gender=='male')checked @endif>
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    {{-- {{$user->gender}} --}}
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" @if($user->gender=='female')checked @endif>
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="other" value="other" @if($user->gender=='other')checked @endif>
                                        <label class="form-check-label" for="other">Other</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                @php
                                    $bg = $user->bloodgroup;
                                @endphp
                                <label for="bloogroup">Blood Group</label>
                                <select name="bloodgroup" required class="form-control" style="width: 100%;">
                                    <option value="" >Choose...</option>
                                    <option value="A+" @if($bg=='A+') selected @endif>A+</option>
                                    <option value="A-" @if($bg=='A-') selected @endif>A-</option>
                                    <option value="B+" @if($bg=='B+') selected @endif>B+</option>
                                    <option value="B-" @if($bg=='B-') selected @endif>B-</option>
                                    <option value="AB+" @if($bg=='AB+') selected @endif>AB+</option>
                                    <option value="AB-" @if($bg=='AB-') selected @endif>AB-</option>
                                    <option value="O+" @if($bg=='O+') selected @endif>O+</option>
                                    <option value="O-" @if($bg=='O-') selected @endif>O-</option>
                                </select>
                                <div class="invalid-feedback">
                                    Required valid.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="image">Image</label>
                                <div class="custom-file">
                                @php
                                    $image = $user->image;
                                @endphp
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" @empty($image) required @endempty name="image" accept="image/*">
                                    <label class="custom-file-label" for="validatedCustomFile">{{$image or 'Choose file...'}}</label>
                                    <div class="invalid-feedback">Required valid.</div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="contact">Mobile Number</label>
                                <input type="text" class="form-control" id="contact" required name="contact" placeholder="Contact Number" pattern="[1-9]{1}[0-9]{9}" value="{{$user->contact}}"/>
                                <div class="invalid-feedback">
                                    Required valid.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                            @php
                              $ms = $user->maritalstatus
                            @endphp
                                <label for="bloogroup">Marital Status</label>
                                <select name="maritalstatus" required class="form-control" style="width: 100%;">
                                    <option value="" >Choose...</option>
                                    <option value="single" @if($ms=='single')selected @endif>Single</option>
                                    <option value="married" @if($ms=='married')selected @endif>Married</option>
                                    <option value="divorced" @if($ms=='divorced')selected @endif>Divorced</option>
                                    <option value="widowed" @if($ms=='widowed')selected @endif>Widowed</option>
                                </select>
                                <div class="invalid-feedback">
                                    Required valid.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="addresss" placeholder="Address" required name="address" rows="2">{{$user->address or ''}}</textarea>
                                <div class="invalid-feedback">
                                    Required valid.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="country">Country</label>
                                <input class="form-control" type="text" name="country" id="country" required value="{{$user->country}}">
                                <div class="invalid-feedback">
                                    Required valid.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">State</label>
                                <input class="form-control" type="text" name="state" id="state" required value="{{$user->state}}">
                                <div class="invalid-feedback">
                                    Required valid.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="city">City</label>
                                <input class="form-control" type="text" name="city" id="city" required value="{{$user->city}}">
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
