@extends('base.index')

@section('content')
    <h2 class="box-title">Drinks</h2>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if($drinks->isEmpty())
        <p class="text-center text-danger">No drinks found!</p>
    @else
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header bg-gray">
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
                            <th>Description</th>
                            <th>Poster Url</th>
                            <th class="text-center" width="180px">Action</th>
                        </tr>
                        @foreach ($drinks as $drink)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{$drink->drink_name}}</td>
                                <td>{{ $drink->drink_price }}</td>
                                <td><img src="/dimages/{{ $drink->image_name }}" alt="" width="40px" height="40px"/></td>
                                <td>{{ $drink->drink_category }}</td>
                                <td>{{ $drink->drink_description }}</td>
                                <td>{{ $drink->poster_url }}</td>
                                <td>
                                    <form action="{{ route('drinks.destroy',$drink->id) }}" method="POST">

                                        <a class="btn btn-info btn-sm" href="{{ route('drinks.show',$drink->id) }}">Show</a>

                                        <a class="btn btn-primary btn-sm" href="{{ route('drinks.edit',$drink->id) }}">Edit</a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
    @endif

    {!! $drinks->links() !!}

@endsection
