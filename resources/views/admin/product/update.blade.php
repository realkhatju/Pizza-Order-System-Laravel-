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
                                <i class="fa-solid fa-arrow-left text-dark" onclick="history.back()"></i>
                            </div>
                            {{-- <div class="ms-5">
                                <a href="{{ route('product#list') }}">
                                    <i class="fa-solid fa-arrow-left text-dark"></i>
                                </a>
                            </div> --}}
                            <div class="card-title">
                                <h3 class="text-center title-2">Update Pizza</h3>
                            </div>
                            <hr>
                            <form action="{{ route('product#update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-4 offset-1">
                                        <input type="hidden" name="pizzaId" value="{{ $pizza->id }}">
                                            <img src="{{ asset('storage/'.$pizza->image) }}" class="img-thumbnail shadow-sm">
                                        <div class="mt-3">
                                            <input type="file" name="pizzaImage" class="form-control @error('pizzaImage') is-invalid @enderror" >
                                            @error('pizzaImage')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mt-3">
                                            <button class="btn bg-info text-white col-12"><i class="fa-solid fa-pen-to-square ms-1"></i>Update</button>
                                        </div>
                                    </div>
                                    <div class="row col-6">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">pizzaName</label>
                                            <input id="cc-pament" name="pizzaName" value="{{ old('pizzaName',$pizza->name) }}" type="text"  class="form-control @error('pizzaName') is-invalid @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Your pizzaName">
                                            @error('pizzaName')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">pizzaDescription</label>
                                            <textarea id="cc-pament" name="pizzaDescription" value="" type="text"  class="form-control @error('pizzaDescription') is-invalid @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Your pizzaDescription">{{ old('pizzaDescription',$pizza->description) }}
                                            </textarea>
                                            @error('pizzaDescription')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">pizzaCategory</label>
                                            <select name="pizzaCategory" class="form-control @error('pizzaCategory') is-invalid @enderror">
                                                <option >Choose pizzaCategory...</option>
                                                @foreach($category as $c)
                                                    <option value="{{ $c->id }}" @if($pizza->category_id == $c->id) selected @endif >{{ $c->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('pizzaCategory')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        {{-- <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">pizzaImage</label>
                                            <input id="cc-pament" name="pizzaImage" value="{{ old('pizzaImage',$pizza->image) }}" type="text"  class="form-control @error('pizzaImage') is-invalid @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Your pizzaImage">
                                            @error('pizzaImage')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div> --}}

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">pizzaPrice</label>
                                            <input id="cc-pament" name="pizzaPrice" value="{{ old('pizzaPrice',$pizza->price) }}" type="number"  class="form-control @error('pizzaPrice') is-invalid @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Your pizzaPrice">
                                            @error('pizzaPrice')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Waiting Time</label>
                                            <input id="cc-pament" name="pizzaWaitingTime" value="{{ old('pizzaWaitingTime',$pizza->waiting_time) }}" type="number"  class="form-control @error('pizzaWaitingTime') is-invalid @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Your Wating Time...">
                                            @error('pizzaWaitingTime')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">viewCount</label>
                                            <input id="cc-pament" name="viewCount" value="{{ old('viewCount',$pizza->view_count) }}" type="number" disabled  class="form-control" aria-required="true" aria-invalid="false">
                                        </div>


                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Created Time</label>
                                            <input id="cc-pament" name="created_at" value="{{ $pizza->created_at->format('j-F-Y') }}" type="text"  class="form-control @error('created_at') is-invalid @enderror " aria-required="true" aria-invalid="false" disabled>
                                            @error('created_at')
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
