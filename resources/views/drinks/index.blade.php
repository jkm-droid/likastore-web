@extends('base.index')

@section('content')
    <section class="content-header">
        <h1>
            Drinks
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Drinks</li>
        </ol>
    </section>

    @if($drinks->isEmpty())
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
                                <th>Description</th>
                                <th>Created On</th>
                                <th>Published</th>
                                <th></th>
                                <th class="text-center" width="180px">Action</th>
                            </tr>
                            @foreach ($drinks as $drink)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td><a href="{{ route('drinks.show',$drink->id) }}">{{$drink->drink_name}}</a></td>
                                    <td>{{ $drink->drink_price }}</td>
                                    <td><img src="/dimages/{{ $drink->image_name }}" alt="" width="40px" height="40px"/></td>
                                    <td>{{ $drink->drink_category }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($drink->drink_description, 50, $end='...') }}</td>
                                    <td>{{ $drink->created_at }}</td>
                                    <td>
                                        @if (($drink->is_published) == 1)
                                            <span><i class="fa fa-check-circle fa-lg text-green text-center ml-3"></i></span>
                                        @else
                                            <span><i class="fa fa-close fa-lg text-danger text-center ml-3"></i></span>
                                        @endif
                                    </td>
                                    <td>
                                        @if (($drink->is_published) == 1)
                                            <form action="{{ route('drinks.publish',$drink->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <button type="submit" class="btn btn-primary btn-sm" value="">Unpublish</button>
                                            </form>
                                        @else
                                            <form action="{{ route('drinks.publish',$drink->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <button type="submit" class="btn btn-success btn-sm" value="">Publish</button>
                                            </form>
                                        @endif
                                    </td>
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
