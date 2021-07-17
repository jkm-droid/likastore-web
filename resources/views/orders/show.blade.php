@extends('base.index')

@section('content')
    <div class="">
        <h2> Order {{ $order->order_id}}</h2>
        <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
        <a class="btn btn-warning" href="{{ route('orders.edit', $order->id) }}"> Edit</a>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $order->order_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone Number:</strong>
                {{ $order->phone_number }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location:</strong>
                {{ $order->location }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total Price:</strong>
                {{ $order->total_price }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Drinks Ordered:</strong>
                {{ $order->drinks }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Order Status:</strong>
                {{ $order->order_status }}
            </div>
        </div>
    </div>
@endsection
