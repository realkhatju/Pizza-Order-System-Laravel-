@extends('admin.layouts.master')

@section('title', 'Category List Page')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1">Product List</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('product#createPage') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="fa-solid fa-plus"></i>Add Products
                                </button>
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>
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
                            <form action="{{ route('product#list') }}" method="get">
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
                            <h3> <i class="fa-solid fa-database mr-2"></i> {{ count($order) }} </h3>
                        </div>
                    </div>

                    <form action="{{ route('admin#changeStatus') }}" method="post" class="col-5">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-database mr-2">{{ count($order) }}</i>
                                </span>
                            </div>
                            <select name="orderStatus" class="form-control col-2">
                                <option value="">All</option>
                                <option value="0" @if (request('orderStatus') == 0) selected @endif>Pending</option>
                                <option value="1" @if (request('orderStatus') == 1) selected @endif>Accept</option>
                                <option value="2" @if (request('orderStatus') == 2) selected @endif>Reject</option>
                            </select>
                            <button type="submit" class="btn sm bg-dark text-white">Search</button>
                        </div>
                    </div>
                    </form>

                    @if (count($order) != 0)
                        <div class="table-responsive table-responsive-data2">
                            @csrf
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>User Name</th>
                                        <th>Order Date</th>
                                        <th>Order Code</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="dataList">

                                    @foreach ($order as $o)
                                        <tr class="tr-shadow" style="margin-bottom: 2px !important">
                                            <input type="hidden" class="orderId" value="{{ $o->id }}">
                                            <td class="">{{ $o->user_id }}</td>
                                            <td class="">{{ $o->user_name }}</td>
                                            <td class="">{{ $o->created_at->format('j-F-Y') }}</td>
                                            <td class="">{{ $o->order_code }}</td>
                                            <td class="amount">{{ $o->total_price }} Ks</td>
                                            <td>
                                                <select name="status" class="form-control statusChange">
                                                    <option class="btn bg-warning" value="0"
                                                        @if ($o->status == 0) selected @endif>Pending</option>
                                                    <option class="btn bg-success" value="1"
                                                        @if ($o->status == 1) selected @endif>Accept</option>
                                                    <option class="btn bg-danger" value="2"
                                                        @if ($o->status == 2) selected @endif>Reject</option>
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{-- {{ $orders->links() }} --}}
                                {{-- {{ $pizzas->appends(request()->query())->links()}} --}}
                            </div>
                        </div>
                    @else
                        <h3 class="text-secondary text-center mt-5">There is no Pizza Here!</h3>
                    @endif

                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection

@section('scriptSource')
    <script>
        $(document).ready(function() {
            $('#orderStatus').change(function() {
                $status = $('#orderStatus').val();
                console.log($status);
                // $.ajax({
                //     type : 'get' ,
                //     url : 'http://localhost:8000/order/ajax/status',
                //     data: {
                //         'status': $status ,
                //     },
                //     dataType: 'json',
                //     success: function(response) {
                //         $list = '';
                //         for ($i = 0; $i < response.length; $i++) {
                //             console.log(response[$i].created_at);
                //             $list += `
            //             <tr class="tr-shadow my-1">
            //                 <td class="">${response[$i].user_id}</td>
            //                 <td class="">${response[$i].user_name}</td>
            //                 <td class="">${response[$i].created_at}</td>
            //                 <td class="">${response[$i].order_code}</td>
            //                 <td class="">${response[$i].total_price} Ks</td>
            //                 <td>
            //                     <select name="status" class="form-control">
            //                         <option class="btn bg-warning" value="0" ${response[$i].status} >Pending</option>
            //                         <option class="btn bg-success" value="1" ${response[$i].status}>Accept</option>
            //                         <option class="btn bg-danger" value="2" ${response[$i].status}>Reject</option>
            //                     </select>
            //                 </td>
            //             </tr>
            //             `;
                //         }
                //         $('#dataList').html($list);
                //     }
                // })
            })

            // change status
            $('.statusChange').change(function() {
                // $parentNode = $(this).parents("tr");
                // $price = Number($parentNode.find('#price').text().replace("kyats",""));
                // $qty = Number($parentNode.find('#qty').val());
                // $total = $price*$qty;
                // $parentNode.find('#total').html(`${$total} kyats`);

                $currentStatus = $(this).val();
                $parentNode = $(this).parents("tr");
                $orderId = $parentNode.find('.orderId').val();

                $data = {
                    'orderId': $orderId,
                    'status': $currentStatus
                };

                console.log($data);
                $.ajax({
                    type: 'get',
                    url: 'http://localhost:8000/order/ajax/change/status',
                    data: $data,
                    dataType: 'json',
                })
                location.reload();
            })
        })
    </script>
@endsection
