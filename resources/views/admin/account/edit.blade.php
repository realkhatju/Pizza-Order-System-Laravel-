@extends('admin.layouts.master')

@section('title', 'Category Create Page')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Admin Profile</h3>
                            </div>
                            <hr>
                            <form action="{{ route('admin#update', Auth::user()->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-4 offset-1">
                                        @if (Auth::user()->image == null)
                                            @if (Auth::user()->gender == 'male')
                                                <img src="{{ asset('image/male.png') }}" class="img-thumbnail shadow-sm">
                                            @else
                                                <img src="{{ asset('image/female.png') }}" class="img-thumbnail shadow-sm">
                                            @endif
                                        @else
                                            <img src="{{ asset('storage/' . Auth::user()->image) }}" class="img-thumbnail shadow-sm" />
                                        @endif
                                        <div class="mt-3">
                                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                                name="image">
                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mt-3">
                                            <button class="btn bg-info text-white col-12"><i
                                                    class="fa-solid fa-pen-to-square ms-1"></i>Update</button>
                                        </div>
                                    </div>
                                    <div class="row col-6">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Name</label>
                                            <input id="cc-pament" name="name"
                                                value="{{ old('name', Auth::user()->name) }}" type="text"
                                                class="form-control @error('name') is-invalid @enderror "
                                                aria-required="true" aria-invalid="false" placeholder="Enter Your Name">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Email</label>
                                            <input id="cc-pament" name="email"
                                                value="{{ old('name', Auth::user()->email) }}" type="email"
                                                class="form-control @error('email') is-invalid @enderror "
                                                aria-required="true" aria-invalid="false" placeholder="Enter Your Email">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Phone</label>
                                            <input id="cc-pament" name="phone"
                                                value="{{ old('phone', Auth::user()->phone) }}" type="text"
                                                class="form-control @error('phone') is-invalid @enderror "
                                                aria-required="true" aria-invalid="false" placeholder="Enter Your Phone">
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Gender</label>
                                            <select name="gender"
                                                class="form-control @error('gender') is-invalid @enderror">
                                                <option value="">Choose Gender...</option>
                                                <option value="male" @if (Auth::user()->gender == 'male') selected @endif>
                                                    Male</option>
                                                <option value="female" @if (Auth::user()->gender == 'female') selected @endif>
                                                    Female</option>
                                            </select>
                                            @error('gender')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Address</label>
                                            <textarea id="cc-pament" name="address" value="" type="text"
                                                class="form-control @error('address') is-invalid @enderror " aria-required="true" aria-invalid="false"
                                                placeholder="Enter Your Address">{{ old('address', Auth::user()->address) }}
                                            </textarea>
                                            @error('address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Role</label>
                                            <input id="cc-pament" name="role"
                                                value="{{ old('role', Auth::user()->role) }}" type="password"
                                                class="form-control @error('role') is-invalid @enderror "
                                                aria-required="true" aria-invalid="false" disabled>
                                            @error('role')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
