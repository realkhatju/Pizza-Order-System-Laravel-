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
                            <div class="ms-5">

                                <a href="{{ route('admin#list')}}" class="text-decoration-none">
                                    <i class="fa-solid fa-arrow-left text-dark" onclick="history.back()"></i>
                                </a>
                            </div>
                            <div class="card-title">
                                <h3 class="text-center title-2">Change Role</h3>
                            </div>
                            <hr>
                            <form action="{{ route('admin#change', $account->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-4 offset-1">
                                        @if ($account->image == null)
                                            @if ($account->gender == 'male')
                                                <img src="{{ asset('image/male.png') }}" class="img-thumbnail shadow-sm">
                                            @else
                                                <img src="{{ asset('image/female.png') }}" class="img-thumbnail shadow-sm">
                                            @endif
                                        @else
                                            <img src="{{ asset('storage/' . $account->image) }}" />
                                        @endif
                                        {{-- <div class="mt-3">
                                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                                name="image">
                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div> --}}

                                        <div class="mt-3">
                                            <button class="btn bg-info text-white col-12"><i
                                                    class="fa-solid fa-pen-to-square ms-1"></i>Update</button>
                                        </div>
                                    </div>
                                    <div class="row col-6">
                                        <div class="form-group">
                                            <label for="cc-payment"  class="control-label mb-1">Name</label>
                                            <input id="cc-pament" name="name"
                                                value="{{ old('name', $account->name) }}" type="text"
                                                class="form-control  "
                                                aria-required="true" aria-invalid="false" placeholder="Enter Your Name" disabled>
                                            {{-- @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror --}}
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Role</label>
                                            <select name="role" class="form-control">
                                                <option value="admin" @if ($account->role == 'admin') selected @endif>Admin</option>
                                                <option value="user" @if ($account->role == 'user') selected @endif>User</option>
                                            </select>
                                            {{-- @error('role')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror --}}
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment"  class="control-label mb-1">Email</label>
                                            <input id="cc-pament" name="email"
                                                value="{{ old('name', $account->email) }}" type="email"
                                                class="form-control  "
                                                aria-required="true" aria-invalid="false" placeholder="Enter Your Email" disabled>
                                            {{-- @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror --}}
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment"  class="control-label mb-1">Phone</label>
                                            <input id="cc-pament" name="phone"
                                                value="{{ old('phone', $account->phone) }}" type="text"
                                                class="form-control  "
                                                aria-required="true" aria-invalid="false" placeholder="Enter Your Phone" disabled>
                                            {{-- @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror --}}
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment"  class="control-label mb-1">Gender</label>
                                            <select name="gender"
                                                class="form-control " disabled>
                                                <option value="">Choose Gender...</option>
                                                <option value="male" @if ($account->gender == 'male') selected @endif>
                                                    Male</option>
                                                <option value="female" @if ($account->gender == 'female') selected @endif>
                                                    Female</option>
                                            </select>
                                            {{-- @error('gender')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror --}}
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Address</label>
                                            <textarea id="cc-pament" name="address" value="" type="text"
                                                class="form-control  " aria-required="true" aria-invalid="false"
                                                placeholder="Enter Your Address" disabled>{{ old('address', $account->address) }}
                                            </textarea>
                                            {{-- @error('address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror --}}
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
