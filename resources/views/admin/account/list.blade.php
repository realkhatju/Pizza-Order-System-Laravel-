@extends('admin.layouts.master')

@section('title', 'Category List Page')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->

                    @if (session('createSuccess'))
                        <div class="col-4 offset-8">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa-regular fa-circle-check me-2"></i>{{ session('createSuccess') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    @if (session('deleteSuccess'))
                        <div class="col-4 offset-8">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fa-sharp fa-solid fa-circle-xmark me-2"></i>{{ session('deleteSuccess') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-3">
                            <h4 class="text-secondary">Search Key : <span class="text-danger">{{ request('key') }}</span>
                            </h4>
                        </div>
                        <div class="col-3 offset-6">
                            <form action="{{ route('admin#list') }}" method="get">
                                @csrf
                                <div class="d-flex">
                                    <input type="text" name="key" value="{{ request('key') }}" class="form-control"
                                        placeholder="Search...">
                                    <button class="btn bg-dark text-white" type="submit">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-1 offset-10 bg-white shadow-sm p-2 text-center">
                            <h3> <i class="fa-solid fa-database mr-2"></i> {{ $admin->total()}} </h3>
                        </div>
                    </div>

                    {{-- @if (count($categories) != 0) --}}
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admin as $a)
                                    <tr class="tr-shadow my-1">
                                        <td class="col-1">
                                            @if ($a->image == null)
                                                @if ($a->gender == 'male')
                                                    <img src="{{ asset('image/male.png') }}"
                                                        class="img-thumbnail shadow-sm">
                                                @else
                                                    <img src="{{ asset('image/female.png') }}"
                                                        class="img-thumbnail shadow-sm">
                                                @endif
                                            @else
                                                <img src="{{ asset('storage/' . $a->image) }}"
                                                    class="img-thumbnail shadow-sm">
                                            @endif
                                        </td>
                                        <td>{{ $a->name }}</td>
                                        <td>{{ $a->email }}</td>
                                        <td>{{ $a->gender }}</td>
                                        <td>{{ $a->phone }}</td>
                                        <td>{{ $a->address }}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                @if (Auth::user()->id == $a->id)

                                                @else
                                                <a href="{{ route('admin#changeRole',$a->id)}}">
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Change Admin Role">
                                                        <i class="fa-solid fa-person-circle-minus"></i>
                                                </a>
                                                <a href="{{ route('admin#delete',$a->id)}}">
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Delete">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $admin->links()}}
                            {{-- {{ $categories->appends(request()->query())->links()}} --}}
                        </div>
                    </div>
                    {{-- @else
                    <h3 class="text-secondary text-center mt-5">There is no Category Here!</h3>
                    @endif --}}
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
