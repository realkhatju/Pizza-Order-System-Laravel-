@extends('user.layouts.master')

@section('content')
    <!-- Cart Start -->
    <div class="container-fluid">
        @if (session('deleteSuccess'))
            <div class="col-4 offset-8">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa-sharp fa-solid fa-circle-xmark me-2"></i>{{ session('deleteSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0" id="dataTable">
                    <thead class="thead-dark">
                        <tr>
                            <th></th>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($cartList as $c)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/'.$c->pizza_image) }}" style="width:50px; height:50px;">
                                </td>
                                {{-- <input type="hidden" value="{{ $c->pizza_price }}"> --}}
                                <td class="align-middle">
                                    {{ $c->pizza_name }}
                                    <input type="hidden" class="orderId" value="{{ $c->id }}">
                                    <input type="hidden" name="productId" value="{{ $c->product_id }}">
                                    <input type="hidden" name="userId" value="{{ $c->user_id }}">

                                </td>
                                <td class="align-middle"  id="price">
                                    {{ $c->pizza_price }}<i class="fa-solid fa-k ms-1 text-warning"></i><i
                                        class="fa-sharp fa-solid fa-s ms-1 fs-6 text-warning">
                                </td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text"
                                            class="form-control form-control-sm bg-secondary border-0 text-center"
                                            value="{{ $c->qty }}" id="qty">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle" id="total">{{ $c->pizza_price * $c->qty }}<i
                                        class="fa-solid fa-k ms-1 text-warning"></i><i
                                        class="fa-sharp fa-solid fa-s ms-1 fs-6 text-warning"></td>
                                <td class="align-middle">
                                    {{-- <a href="{{ route('cartList#delete', $c->id) }}"> --}}
                                        <button class="btn btn-sm btn-danger btnRemove"><i class="fa fa-times"></i></button>
                                </td>
                                {{-- </a> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart
                        Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Total Price</h6>
                            <h6 id="subTotalPrice">{{ $totalPrice }} Ks</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Delivery</h6>
                            <h6 class="font-weight-medium">2000 <i class="fa-solid fa-k ms-1 text-warning"></i></h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <p id="finalPrice">{{ $totalPrice + 2000 }} <i class="fa-solid fa-k ms-1 text-warning"></i></p>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3" id="orderBtn">Proceed To Checkout</button>
                        <button class="btn btn-block btn-danger font-weight-bold my-3 py-3" id="clearBtn">Clear Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection

@section('scriptSource')
    <script src="{{ asset('js/cart.js') }}"></script>
    <script>
        $('#orderBtn').click(function(){
            $orderList = [];

            $random = Math.floor(Math.random() * 1000000000001);

            $('#dataTable tbody tr').each(function(index,row){
                $orderList.push({
                    'userId' : $(row).find('.userId').val() ,
                    'productId' : $(row).find('.productId').val() ,
                    'qty' : $(row).find('#qty').val(),
                    'total' : $(row).find('#total').text().replace('Ks',''*1),
                    'order_code' : 'POS' + $random
                });
            });
            $.ajax({
                type : 'get' ,
                url : 'http://localhost:8000/user/ajax/order',
                data : Object.assign({},$orderList),
                dataType : 'json' ,
                success : function(response){
                    if(response.status == "true"){
                        window.location.href = "http://localhost:8000/user/homePage";
                    }
                }
            })
        })

        // when clear button click
        $('#clearBtn').click(function(){
            $.ajax({
                type : 'get' ,
                url : 'http://localhost:8000/user/ajax/clear/cart' ,
                dataType : 'json' ,
            })

            $('#dataTable tbody tr').remove();
            $('#subTotalPrice').html("0 kyats");
            $('#finalPrice').html("3000 kyats");
        })

        // remove current product
        // when cross button click
        $('.btnRemove').click(function(){
            $parentNode = $(this).parents("tr");
            $productId = $parentNode.find(".productId").val();
            $orderId = $parentNode.find(".orderId").val();

            $.ajax({
                type : 'get' ,
                url : 'http://localhost:8000/user/ajax/clear/current/product' ,
                data : {'productId' : $productId} ,
                dataType : 'json' ,
            })

            $parentNode.remove();
            $totalPrice = 0;
            $('#dataTable tbody tr').each(function(index,row){
                $totalPrice += Number($(row).find('#total').text().replace("Ks",""));
            });

            $("#subTotalPrice").html(`${$totalPrice} Ks`);
            $("#finalPrice").html( `${$totalPrice+2000} Ks`);
        })

    </script>
@endsection
