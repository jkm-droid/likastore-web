@extends('base.index')

@section('content')
    <section class="content-header mb-3">
        <h1>
            {{ $flipper->poster_name }}
        </h1>
        <ol class="breadcrumb text-black">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class=""><a href="{{ route('flippers.index') }}">Flippers</a></li>
            <li>View</li>
            <li class="active"> {{ $flipper->poster_name }}</li>
        </ol>
    </section>

    <div class="row text-center">
        <a class="btn btn-primary" href="{{ route('flippers.index') }}"> Back</a>
        <a class="btn btn-warning" href="{{ route('flippers.edit', $flipper->id) }}"> Edit</a>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Poster Name:</strong>
                {{ $flipper->poster_name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Poster Url:</strong>
                {{ $flipper->poster_url }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong style="margin-left:10px;">Image</strong><br>
                <img style="height: 200px; width: 400px;" src="/posters/{{ $flipper->poster_name }}" alt="">
            </div>
        </div>
    </div>
@endsection
