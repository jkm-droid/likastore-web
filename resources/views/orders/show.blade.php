@extends('base.index')

@section('content')
    <section class="content-header">
        <h1>
            Order {{ $order->order_id}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li>Orders</li>
            <li class="active">View</li>
        </ol>
    </section>

    <div class="row text-center">
        <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
        <a class="btn btn-warning" href="{{ route('orders.edit', $order->id) }}"> Edit</a>
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
                @for($i = 0;$i < count(explode('/', $order->drinks)) - 1;$i++)
                    <br><span class="label label-success">{{ explode('/', $order->drinks)[$i] }}</span><br>
                @endfor
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
