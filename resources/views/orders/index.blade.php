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

    <table class="table table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Order Id</th>
            <th>Phone Number</th>
            <th>Location</th>
            <th>Payment Method</th>
            <th>Total Price</th>
            <th>Drinks Ordered </th>
            <th>Order Status </th>
            <th style="width: 180px;" class="text-center">Action</th>
            <th class="text-center">Confirm</th>
            <th class="text-center">Approve</th>
            <th class="text-center">Delivered</th>
        </tr>
        @foreach ($orders as $order)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $order->order_id }}</td>
                <td>{{ $order->phonenumber }}</td>
                <td>{{ $order->location }}</td>
                <td>{{ $order->paymentmethod }}</td>
                <td>{{ $order->totalprice }}</td>
                <td>{{ $order->drinks }}</td>
                @if($order->orderstatus == "pending")
                    <td><span class="label label-warning">{{ $order->orderstatus }}</span></td>
                @elseif($order->orderstatus == "confirmed")
                    <td><span class="label label-info">{{ $order->orderstatus }}</span></td>
                @else
                    <td><span class="label label-success">{{ $order->orderstatus }}</span></td>
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
                    @if (($order->orderstatus) == 'pending')
                        <form action="{{ route('orders.confirm',$order->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <button type="submit" class="btn btn-primary btn-sm" value="">Confirm</button>
                        </form>
                    @endif
                </td>
                <td>
                    @if (($order->orderstatus) == 'confirmed')
                        <form action="{{ route('orders.deliver',$order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success btn-sm" value="">Deliver</button>
                        </form>
                    @endif
                </td>
                <td>
                    @if (($order->orderstatus) == 'delivered')
                        <span><i class="fa fa-check-circle fa-lg text-green text-center ml-3"></i></span>
                    @else
                        <span><i class="fa fa-close fa-lg text-danger text-center ml-3"></i></span>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>

    {!! $orders->links() !!}

@endsection
