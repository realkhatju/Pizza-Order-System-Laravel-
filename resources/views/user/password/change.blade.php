@extends('user.layouts.master')

@section('content')

    <div class="row mt-3">
        <div class="col-6 offset-3">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="">
                            @if(session('changeSuccess'))
                            <div class="col-8 offset-4">
                                <div class="alert alert-info text-success alert-dismissible fade show" role="alert">
                                    <i class="fa-regular fa-circle-check me-2"></i>{{session('changeSuccess')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                            </div>
                            @endif

                            @if(session('notMatch'))
                            <div class="col-8 offset-4">
                                <div class="alert alert-warning text-danger alert-dismissible fade show" role="alert">
                                    <i class="fa-regular fa-circle-check me-2"></i>{{session('notMatch')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                            </div>
                            @endif
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Change Password</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('user#changePassword') }}" method="post" novalidate="novalidate">
                                        @csrf
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Old Password</label>
                                            <input id="cc-pament" name="oldPassword" type="password"  class="form-control @error('oldPassword') is-invalid @enderror mb-3" aria-required="true" aria-invalid="false" placeholder="Enter Old Password">
                                            @error('oldPassword')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">New Password</label>
                                            <input id="cc-pament" name="newPassword" type="password"  class="form-control @error('newPassword') is-invalid @enderror mb-3" aria-required="true" aria-invalid="false" placeholder="Enter New Password">
                                            @error('newPassword')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Confirm Password</label>
                                            <input id="cc-pament" name="confirmPassword" type="password"  class="form-control @error('confirmPassword') is-invalid @enderror mb-3" aria-required="true" aria-invalid="false" placeholder="Enter Confirm Password">
                                            @error('confirmPassword')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-dark btn-block  w-100 text-white">
                                                <i class="fa-solid fa-key"></i>
                                                <span id="payment-button-amount">Change Password</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
