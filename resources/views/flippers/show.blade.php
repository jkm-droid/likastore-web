@extends('base.index')

@section('content')
    <h2> Show Flipper</h2>
    <a class="btn btn-primary" href="{{ route('flippers.index') }}"> Back</a>

    <div class="row">
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
        <strong style="margin-left:10px;">Image</strong>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <img style="height: 200px; width: 400px;" src="/posters/{{ $flipper->poster_name }}" alt="">
            </div>
        </div>
    </div>
@endsection
