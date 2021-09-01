@extends('base.index')

@section('content')
    <section class="content-header">
        <h1>
            Edit Order {{$order->order_id}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Orders</li>
        </ol>
    </section>

    <div class="box box-danger mt-3">
        <div class="box-header with-border">
            <h3 class="box-title"><a class="btn btn-sm btn-danger" href="{{ route('orders.index') }}">Back</a></h3>
        </div>
        <form action="{{ route('orders.update',$order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="box-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="order_id" class="form-label">Order Id</label>
                        <input type="text" name="order_id" value="{{ $order->order_id}}" class="form-control" placeholder="enter order id" disabled>
{{--                        @if ($errors->has('order_id'))--}}
{{--                            <div class="text-danger form-text">{{ $errors->first('order_id') }}</div>--}}
{{--                        @endif--}}
                    </div>
                    <div class="col-md-4">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="number" name="phone_number" value="{{ $order->phone_number}}" class="form-control" placeholder="enter Phone Number" id="phonenumber">
                        @if ($errors->has('phone_number'))
                            <div class="text-danger form-text">{{ $errors->first('phone_number') }}</div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" name="location" value="{{ $order->location}}" class="form-control" placeholder="enter Location" id="location">
                        @if ($errors->has('location'))
                            <div class="text-danger form-text">{{ $errors->first('location') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-4 mt-3">
                        <label for="inputordertype" class="form-label">Order Status</label>
                        <select name="order_status" id="orderstatus" class="form-select form-control" aria-label="Default select example" autofocus>
                            @if($order->order_status)
                                <option value="{{ $order->order_status }}" selected>{{ $order->order_status }}</option>
                            @endif
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="delivered">Delivered</option>
                        </select>
                        @if ($errors->has('order_status'))
                            <div class="text-danger form-text">{{ $errors->first('order_status') }}</div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <label for="total_price" class="form-label">Total Price</label>
                        <input type="text" name="total_price" value="{{ $order->total_price}}" class="form-control" placeholder="enter total price" id="totalprice">
                        @if ($errors->has('total_price'))
                            <div class="text-danger form-text">{{ $errors->first('total_price') }}</div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <label for="payment_method" class="form-label">Payment Method</label>
                        <input type="text" name="payment_method" value="{{ $order->payment_method}}" class="form-control" placeholder="enter payment method" id="paymentmethod">
                        @if ($errors->has('payment_method'))
                            <div class="text-danger form-text">{{ $errors->first('payment_method') }}</div>
                        @endif
                    </div>
                </div>

                <br>

                <div>
                    <label for="drinks" class="form-label">Drinks Ordered</label>
                    <textarea class="form-control" name="drinks" placeholder="enter orders" id="drinks" rows="4">{{ $order->drinks}}</textarea>
                    @if ($errors->has('drinks'))
                        <div class="text-danger form-text">{{ $errors->first('drinks') }}</div>
                    @endif
                </div>
            </div>
            <div class="box-footer">
                <input type="submit" id="update_button" value="Update order" name="update_orders" class="btn btn-danger" >
            </div>

        </form>
    </div>

@endsection
