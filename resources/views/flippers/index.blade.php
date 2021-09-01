@extends('base.index')

@section('content')
    <section class="content-header">
        <h1>
            Flippers
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Flippers</li>
        </ol>
    </section>
{{--    @if ($message = Session::get('success'))--}}
{{--        <p class="alert alert-success">{{ $message }}</p>--}}
{{--    @endif--}}
    @if($flippers->isEmpty())
        <p class="text-center text-danger">No posters found!</p>
    @else
        <div class="row">
            <div class="col-xs-12 mt-3">
                <div class="box box-primary">
                    <div class="box-header">
                        <a class="btn btn-sm btn-primary" href="{{ route('flippers.create') }}"> Create New Flipper</a>
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
                        <table class="table table-striped table-hover mt-3">
                            <tr>
                                <th>No</th>
                                <th>Poster Name</th>
                                <th>Poster Image</th>
                                <th class="hide-data">Poster Url</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($flippers as $flipper)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td><a href="{{ route('flippers.show',$flipper->id) }}">{{ $flipper->poster_name }}</a></td>
                                    <td><img src="/posters/{{ $flipper->poster_name }}" alt="" width="40px" height="40px"></td>
                                    <td class="hide-data">{{ $flipper->poster_url }}</td>
                                    <td>
                                        <form action="{{ route('flippers.destroy',$flipper->id) }}" method="POST">

                                            <a class="btn btn-info" href="{{ route('flippers.show',$flipper->id) }}">Show</a>

                                            <a class="btn btn-primary" href="{{ route('flippers.edit',$flipper->id) }}">Edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {!! $flippers->links() !!}

@endsection
