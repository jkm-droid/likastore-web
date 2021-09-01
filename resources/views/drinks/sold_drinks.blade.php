@extends('base.index')

@section('content')
    <section class="content-header">
        <h1>
            Drinks Sold
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Drinks Sold</li>
        </ol>
    </section>

    @if ($message = Session::get('success'))
        <div class="alert alert-success  col-md-4 col-md-offset-8" role="alert">
            {{ $message }}
        </div>
    @endif

    @if(count($drinks) <= 0)
        <p class="text-center text-danger">No drinks found!</p>
    @else
        <div class="row">
            <div class="col-xs-12 mt-3">
                <div class="box box-success">
                    <div class="box-header">
                        <a class="btn btn-sm btn-success" href="{{ route('drinks.create') }}"> Add New drink</a>
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
                                <th>No</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Sold On</th>
                                <th>Status</th>
                            </tr>
                            @for ($i = 0;$i < count($drinks);$i++)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{$drinks[$i]->drink_name}}</td>
                                    <td>{{ $drinks[$i]->drink_price }}</td>
                                    <td><img src="/dimages/{{ $drinks[$i]->image_name }}" alt="" width="40px" height="40px"/></td>
                                    <td>{{ $drinks[$i]->drink_category }}</td>
                                    
                                    <td>{{ $sold_drinks[$i]->drink_date }}</td>
                                    <td><span class="text-success"><i class="fa fa-check-circle"></i></span></td>
                                </tr>
                            @endfor
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    @endif

    {!! $drinks->links() !!}

@endsection