@extends('base.index')

@section('content')

    <div class="ml-2 mb-3">
        <h2>Orders</h2>
    </div>
    @if ($message = Session::get('success'))
        <p class="alert alert-success">{{ $message }}</p>
    @endif

{{--    @if ($message = Session::get('success'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ $message }}</strong>--}}
{{--            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--        </div>--}}
{{--    @endif--}}
    @if($orders->isEmpty())
        <p class="text-danger text-center">No orders found!</p>
    @else

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                    <div class="box-tools">
                        <div class="input-group" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search" />
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                            <tr>
                                <th class="hide-data">No</th>
                                <th>Order Id</th>
                                <th>Phone Number</th>
                                <th>Location</th>
                                <th>Payment Method</th>
                                <th>Total Price</th>
                                <th>Paid</th>
                                <th>Transaction Code</th>
                                <th>Drinks Ordered </th>
                                <th>Order Status </th>
                                <th style="width: 180px;" class="text-center">Action</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th class="text-center">Delivered</th>
                            </tr>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $order->order_id }}</td>
                                    <td>{{ $order->phone_number }}</td>
                                    <td>{{ $order->location }}</td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>
                                        @if (($order->paid) == 1)
                                            <span><i class="fa fa-check-circle fa-lg text-green text-center ml-3"></i></span>
                                        @else
                                            <span><i class="fa fa-close fa-lg text-danger text-center ml-3"></i></span>
                                        @endif
                                    </td>
                                    <td>{{ $order->payment_code }}</td>
                                    <td>{{ $order->drinks }}</td>
                                    @if($order->order_status == "pending")
                                        <td><span class="label label-warning">{{ $order->order_status }}</span></td>
                                    @elseif($order->order_status == "confirmed")
                                        <td><span class="label label-info">{{ $order->order_status }}</span></td>
                                    @else
                                        <td><span class="label label-success">{{ $order->order_status }}</span></td>
                                    @endif
                                    <td>
                                        <form action="{{ route('orders.destroy',$order->id) }}" method="POST">

                                            <a class="btn btn-info btn-sm" href="{{ route('orders.edit',$order->id) }}">Edit</a>

                                            <a class="btn btn-primary btn-sm" href="{{ route('orders.show',$order->id) }}">View</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                                        </form>
                                    </td>
                                    <td>
                                        @if (($order->paid) == 0)
                                            <form action="{{ route('orders.pay',$order->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <button type="submit" class="btn btn-warning btn-sm" value="">Pay</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        @if (($order->order_status) == 'pending')
                                            <form action="{{ route('orders.confirm',$order->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <button type="submit" class="btn btn-primary btn-sm" value="">Confirm</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td class="hide-data">
                                        @if (($order->order_status) == 'confirmed')
                                            <form action="{{ route('orders.deliver',$order->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-success btn-sm" value="">Deliver</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        @if (($order->order_status) == 'delivered')
                                            <span><i class="fa fa-check-circle fa-lg text-green text-center ml-3"></i></span>
                                        @else
                                            <span><i class="fa fa-close fa-lg text-danger text-center ml-3"></i></span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
    @endif
    {!! $orders->links() !!}

@endsection
