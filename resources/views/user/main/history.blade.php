@extends('user.layouts.master')

@section('content')
    <!-- Cart Start -->
    <div class="container-fluid" style="height: 350px;">
        <div class="row px-xl-5">
            <div class="col-lg-8 offset-2 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0" id="dataTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Date</th>
                            <th>Order ID</th>
                            <th>Total Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($orders as $o)
                            <tr>
                                <td>
                                    {{ $o->created_at->format('F-j-Y')}}
                                </td>
                                <td class="align-middle">
                                    {{ $o->user_id }}
                                </td>
                                <td class="align-middle">
                                    {{ $o->total_price }}
                                </td>
                                <td class="align-middle">
                                    @if ($o->status == 0)
                                        <span class="btn btn-sm btn-warning">Pending...</span>
                                    @elseif($o->status == 1)
                                        <span class="btn btn-sm btn-success">Success</span>
                                    @elseif($o->status == 2)
                                        <span class="btn btn-sm btn-danger">Reject</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <span>
                    {{ $orders->links() }}
                </span>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection
