@extends('base.index')

@section('content')
{{--    @if ($message = Session::get('success'))--}}
{{--        <p class="alert alert-success">{{ $message }}</p>--}}
{{--    @endif--}}
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $orders }}</h3>
                        <p>Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('orders.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $drinks }}</h3>
                        <p>Drinks</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-beer"></i>
                    </div>
                    <a href="{{ route('drinks.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{$sold_drinks}}</h3>
                        <p>Drinks Sold</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>Ksh {{ $total_revenue }}</h3>
                        <p>Total Amount Sold</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-8 connectedSortable">
                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Orders</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Location</th>
                                    <th>Item</th>
                                    <th>Progress</th>
                                    <th></th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($latest_orders as $latest)
                                    <tr>
                                        <td>{{$latest->order_id}}</td>
                                        <td>{{$latest->location}}</td>
                                        <td>{{$latest->drinks}}</td>
                                        @if($latest->order_status == 'pending')
                                            <td>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-danger" style="width: 33%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">33% Complete</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-red">33%</span></td>
                                        @endif
                                        @if($latest->order_status == 'confirmed')
                                            <td>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-info" style="width: 66%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">66% Complete</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-blue">66%</span></td>
                                        @endif
                                        @if($latest->order_status == 'delivered')
                                            <td>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-success" style="width: 100%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">100% Complete</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-green">100%</span></td>
                                        @endif

                                        @if($latest->order_status == 'pending')
                                            <td><span class="label label-danger">{{$latest->order_status}}</span></td>
                                        @elseif($latest->order_status == 'confirmed')
                                            <td><span class="label label-info">{{$latest->order_status}}</span></td>
                                        @else
                                            <td><span class="label label-success">{{$latest->order_status}}</span></td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                        <a href="{{ route('orders.index') }}" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                    </div><!-- /.box-footer -->
                </div><!-- /.box -->

                <!---TABLE: LATEST DRINKS SOLD -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Drinks Sold</h3>
                    </div><!-- /.box-header -->
                    @if($latest_drinks_sold->isEmpty())
                        <p class="text-center text-danger">No drinks found</p>
                    @else
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Drink Name</th>
                                    <th>Sold On</th>
                                    <th>Progress</th>
                                    <th style="width: 40px">Label</th>
                                </tr>
                                @foreach($latest_drinks_sold as $sold)
                                <tr>
                                    <td>{{ $sold->drink_name }}</td>
                                    <td>{{ $sold->created_at }}</td>
                                    <td>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-success" style="width: 100%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">100% Complete</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-red">100%</span></td>
                                </tr>
                                @endforeach
                            </table>
                        </div><!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <a href="{{ route('drinks.create') }}" class="btn btn-sm btn-info btn-flat pull-left">Add A New Drink</a>
                            <a href="{{ route('sold.index') }}" class="btn btn-sm btn-default btn-flat pull-right">View All Sold Drinks</a>
                        </div><!-- /.box-footer -->
                    @endif
                </div><!-- /.box -->
                <!---END--->
            </section><!-- /.Left col -->

            <!-- /.col -->
            <section class="col-lg-4 connectedSortable">
                <!-- PRODUCT LIST -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recently Added Drinks</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            @foreach($recent_drinks as $rd)
                                <li class="item">
                                    <div class="product-img">
                                        <img src="/dimages/{{$rd->image_name}}" alt="" />
                                    </div>
                                    <div class="product-info">
                                        <a href="" class="product-title">{{$rd->drink_name}} <span class="label label-primary pull-right">{{ $rd->drink_price }}</span></a>
                                        <span class="product-description">{{$rd->drink_description}}</span>
                                    </div>
                                </li><!-- /.item -->
                            @endforeach
                        </ul>
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="{{ route('drinks.index')}}" class="uppercase">View All Products</a>
                    </div><!-- /.box-footer -->
                </div><!-- /.box -->
            </section>
        </div><!-- /.row -->
    </section><!-- /.content -->
@endsection
