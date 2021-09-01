@extends('base.index')

@section('content')
    <section class="content-header mb-3">
        <h1>
           {{ $drink->drink_name}}
        </h1>
        <ol class="breadcrumb text-black">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('drinks.index') }}">Drinks</a></li>
            <li>View</li>
            <li class="active">{{ $drink->drink_name}}</li>
        </ol>
    </section>

    <div class="row text-center">
        <a class="btn btn-primary" href="{{ route('drinks.index') }}"> Back</a>
        <a class="btn btn-warning" href="{{ route('drinks.edit', $drink->id) }}"> Edit</a>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $drink->drink_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                {{ $drink->drink_category }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                {{ $drink->drink_price }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $drink->drink_description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Poster Url:</strong>
                {{ $drink->poster_url }}
            </div>
        </div>
        <div class="m-3" style="margin: 15px;">
            <img class="rounded" src="/dimages/{{ $drink->image_name }}" alt="" width="400px" height="500px"/>
        </div>

    </div>
@endsection
