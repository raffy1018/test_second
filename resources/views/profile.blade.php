@extends('layouts.app')

@section('title', 'Profile')

{{--@section('content')
    <!-- <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 border-bottom">
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
        </div>

        {{-- Alert Messages --//}}
        @include('common.alert')

        {{-- Page Content --//}}
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="{{ asset('admin/img/undraw_profile.svg') }}">
                    <span class="font-weight-bold">{{ auth()->user()->full_name }}</span>
                    <span class="text-black-50"><i>Role:
                            {{ auth()->user()->roles
                                ? auth()->user()->roles->pluck('name')->first()
                                : 'N/A' }}</i></span>
                    <span class="text-black-50">{{ auth()->user()->email }}</span>
                </div>
            </div>
            <div class="col-md-9 border-right">
                {{-- Profile --//}}
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile</h4>
                    </div>
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label class="labels">First Name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                    name="first_name" placeholder="First Name"
                                    value="{{ old('first_name') ? old('first_name') : auth()->user()->first_name }}">

                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="labels">Last Name</label>
                                <input type="text" name="last_name"
                                    class="form-control @error('last_name') is-invalid @enderror"
                                    value="{{ old('last_name') ? old('last_name') : auth()->user()->last_name }}"
                                    placeholder="Last Name">

                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="labels">Mobile Number</label>
                                <input type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number"
                                    value="{{ old('mobile_number') ? old('mobile_number') : auth()->user()->mobile_number }}"
                                    placeholder="Mobile Number">
                                @error('mobile_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Update Profile</button>
                        </div>
                    </form>
                </div>

                <hr>
                {{-- Change Password --//}}
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Change Password</h4>
                    </div>

                    <form action="{{ route('profile.change-password') }}" method="POST">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label class="labels">Current Password</label>
                                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Current Password" required>
                                @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="labels">New Password</label>
                                <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" required placeholder="New Password">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="labels">Confirm Password</label>
                                <input type="password" name="new_confirm_password" class="form-control @error('new_confirm_password') is-invalid @enderror" required placeholder="Confirm Password">
                                @error('new_confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-success profile-button" type="submit">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>



    </div>
@endsection --}}
@section('content')
    <div class="container-fluid"><div class="d-flex justify-content-center">
            <div class="card shadow w-auto d-flex">
                <div class="card-header pt-3 d-flex flex-row align-items-center justify-content-between">
                    <h5>Account Profile</h5>
                    <a class="text-decoration-none mx-1" href="#" data-toggle="modal" data-target="#editModal801"><button class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></button></a>
                </div>
                <div class="card-body">
                    <div class="border p-3">
                        <center><img class="mb-3" src="{{asset("admin/img/logos/mikrotik.png")}}" alt="NO LOGO" style="width:200px;">
                        </center>
                        <div class="mb-3">
                            <p>Company Name:</p>
                            <input type="text" class="form-control rounded-pill" value="" readonly="">
                        </div>
                        <div class="row mb-3">
                            <div class=" col-lg-6 col-md-12">
                                <p>First Name:</p>
                                <input type="text" class="form-control rounded-pill" value="" readonly="">
                            </div>
                            <div class=" col-lg-6 col-md-12">
                                <p>Last Name:</p>
                                <input type="text" class="form-control rounded-pill" value="" readonly="">
                            </div>
                        </div>
                        <div class="mb-3">
                            <p>Address:</p>
                            <input type="text" class="form-control rounded-pill" value="" readonly="">
                        </div>
                        <div class="row mb-3">
                            <div class=" col-lg-6 col-md-12">
                                <p>Contact No.:</p>
                                <input type="text" class="form-control rounded-pill" value="" readonly="">
                            </div>
                            <div class=" col-lg-6 col-md-12">
                                <p>Email:</p>
                                <input type="text" class="form-control rounded-pill" value="" readonly="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class=" col-lg-8 col-md-12">
                                <div class="d-flex justify-content-start">Banner:</div>
                                <textarea type="text" style="font-size:0.7rem;resize:none;" class="form-control" name="banner" rows="5" cols="50" readonly=""></textarea>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="d-flex justify-content-start">Image:</div>

                                <textarea type="text" style="font-size:0.7rem;resize:none;" class="form-control" name="banner" rows="5" cols="" readonly=""></textarea>
                            </div>
                        </div>

                        <hr class="sidebar-divider d-none d-md-block">
                        <div class="row mb-3">
                            <div class=" col-lg-6 col-md-12">
                                <p>Username:</p>
                                <input type="text" class="form-control rounded-pill" value="admin" readonly="">
                            </div>
                            <div class=" col-lg-6 col-md-12">
                                <p>Password:</p>
                                <input type="password" class="form-control rounded-pill" value="admin" readonly="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editModal801" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Account Profile</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form class="user" action="actions/editProfile.php?id=801" enctype="multipart/form-data" method="POST">
                        <div class="p-4">
                            <div class="row mb-3">
                                <div class=" col-lg-12 col-md-12">
                                    Select Logo to upload:
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                    <div class="text-info" style="font-size:0.8rem;">Image Size: Less than 500KB</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <p>Company Name:</p>
                                <input type="text" class="form-control rounded-pill" name="company" value="" placeholder="Enter Company Name" autocomplete="off">
                            </div>
                            <div class="row mb-3">
                                <div class=" col-lg-6 col-md-12">
                                    <p>First Name:</p>
                                    <input type="text" class="form-control rounded-pill" name="fname" value="" placeholder="Enter First Name" autocomplete="off">
                                </div>
                                <div class=" col-lg-6 col-md-12">
                                    <p>Last Name:</p>
                                    <input type="text" class="form-control rounded-pill" name="lname" value="" placeholder="Enter Last Name" autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-3">
                                <p>Address:</p>
                                <input type="text" class="form-control rounded-pill" name="address" value="" placeholder="Enter Address Address" autocomplete="off">
                            </div>
                            <div class="row mb-3">
                                <div class=" col-lg-6 col-md-12">
                                    <p>Contact No.:</p>
                                    <input type="text" class="form-control rounded-pill" name="phone" value="" placeholder="Enter Contact Number" autocomplete="off">
                                </div>
                                <div class=" col-lg-6 col-md-12">
                                    <p>Email:</p>
                                    <input type="text" class="form-control rounded-pill" name="email" value="" placeholder="Enter Email" autocomplete="off">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-start">Banner:</div>
                                <textarea type="text" style="font-size:0.7rem;resize:none;" class="form-control" placeholder="Enter Banner Message" name="banner" rows="5" cols="50" maxlength="215" autocomplete="off"></textarea>
                            </div>
                            <div class="row mb-3">
                                <div class=" col-lg-12 col-md-12">
                                    Select an image to upload:
                                    <input type="file" name="bannerToUpload" id="bannerToUpload">
                                    <div class="text-info" style="font-size:0.8rem;">Image Size: Less than 500KB</div>
                                </div>
                            </div>

                            <hr class="sidebar-divider d-none d-md-block">
                            <div class="row mb-3">
                                <div class=" col-lg-6 col-md-12 mb-3">
                                    <p>Username:</p>
                                    <input type="text" class="form-control rounded-pill" value="admin" autocomplete="off" readonly="">
                                </div>
                                <div class=" col-lg-6 col-md-12">
                                    <p>Password:</p>
                                    <div class="d-flex justify-content-center">
                                        <input type="password" class="form-control rounded-pill" name="cpassword" value="admin" autocomplete="off" placeholder="Enter Password" id="myPassword">
                                        <i id="eyeStatus" class="fas fa-fw fa-eye" style="margin-left:-30px;margin-top:11px;z-index:2;" onclick="showPassword()"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button type="submit" onclick="displayLoader()" class="btn btn-primary" name="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function showPassword() {
                var x = document.getElementById("myPassword");
                var y = document.getElementById("eyeStatus");
                if (x.type === "password") {
                    x.type = "text";
                    y.className = "fas fa-fw fa-eye-slash";
                } else {
                    x.type = "password";
                    y.className = "fas fa-fw fa-eye";
                }
            }
        </script>
    </div>
@endsection
