@extends('base.index')

@section('content')
    <div class="ml-3">
        <h2>Edit Order {{$order->order_id}}</h2>
        <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.update',$order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-4">
                <label for="inputordername" class="form-label">Order Id</label>
                <input type="text" name="order_id" value="{{ $order->order_id}}" class="form-control" placeholder="enter order id" id="order_id">
            </div>
            <div class="col-md-4">
                <label for="inputphonenumber" class="form-label">Phone Number</label>
                <input type="number" name="phone_number" value="{{ $order->phone_number}}" class="form-control" placeholder="enter Phone Number" id="phonenumber">
            </div>
            <div class="col-md-4">
                <label for="inputorderlocation" class="form-label">Location</label>
                <input type="text" name="location" value="{{ $order->location}}" class="form-control" placeholder="enter Location" id="location">
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
            </div>
            <div class="col-md-4">
                <label for="inputtotalprice" class="form-label">Total Price</label>
                <input type="text" name="total_price" value="{{ $order->total_price}}" class="form-control" placeholder="enter total price" id="totalprice">
            </div>
            <div class="col-md-4">
                <label for="inputpaymentmethod" class="form-label">Payment Method</label>
                <input type="text" name="payment_method" value="{{ $order->payment_method}}" class="form-control" placeholder="enter payment method" id="paymentmethod">
            </div>
            <!-- <input type="hidden" name="order_id" class="form-control" id="order_id"> -->
        </div>

        <br>

        <div>
            <label for="orders" class="form-label">Drinks Ordered</label>
            <textarea class="form-control" name="drinks" placeholder="enter orders" id="drinks" rows="4">{{ $order->drinks}}</textarea>
        </div>

        <br>

        <div class="col-md-6 offset-md-3 d-grid">
            <input type="submit" id="update_button" value="Update order" name="update_orders" class="btn btn-primary" >
        </div>

    </form>
@endsection
