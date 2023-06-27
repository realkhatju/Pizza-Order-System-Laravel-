@extends('admin.layouts.master')

@section('title', 'Category List Page')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 text-center">
                                <h3> Total - {{$users->total()}}</h3>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody id="dataList">
                                    @foreach ($users as $u)
                                    <tr class="tr-shadow" style="margin-bottom: 2px !important">
                                        <td class="col-1">

                                                @if ($u->image == null)
                                                    @if ($u->gender == 'male')
                                                        <img src="{{ asset('image/male.png') }}" class="img-thumbnail shadow-sm">
                                                    @else
                                                        <img src="{{ asset('image/female.png') }}" class="img-thumbnail shadow-sm">
                                                    @endif
                                                @else
                                                    <img src="{{ asset('storage/' . $u->image) }}" />
                                                @endif

                                        </td>
                                        <td>{{ $u->name}}</td>
                                        <td>{{ $u->email}}</td>
                                        <td>{{ $u->gender}}</td>
                                        <td>{{ $u->phone}}</td>
                                        <td>{{ $u->address}}</td>
                                        <td>
                                            <td>
                                                <select class="form-control statusChange">
                                                    <option class="btn bg-warning" value="user"
                                                        @if ($u->role == 'user') selected @endif>user</option>
                                                    <option class="btn bg-success" value="admin"
                                                        @if ($u->role == 'admin') selected @endif>admin</option>
                                                </select>
                                            </td>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{ $users->links()}}
                                {{-- {{ $categories->appends(request()->query())->links()}} --}}
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptSource')
    <script >
        $(document).ready(function(){
            // change status
            $('.statusChange').change(function(){
                $currentStatus = $(this).val();
                $parentNode = $(this).parents("tr");
                $userId = $parentNode.find('#userId').val();

                $data = {'userId' : $userId,'role' : $currentStatus};

                $.ajax({
                    type : 'get' ,
                    url : '/user/change/role' ,
                    data : $data ,
                    dataType : 'json' ,
                })
                location.reload();
            })
        })
    </script>
@endsection
