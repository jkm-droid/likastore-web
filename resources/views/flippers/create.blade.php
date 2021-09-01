@extends('base.index')

@section('content')
    <section class="content-header mb-3">
        <h1>
            Add New Flipper
        </h1>
        <ol class="breadcrumb text-black">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class=""><a href="{{ route('flippers.index') }}">Flippers</a></li>
            <li class="active">Add New Flipper</li>
        </ol>
    </section>

    <div class="box box-primary mt-3">
        <div class="box-header with-border">
            <h3 class="box-title"><a class="btn btn-sm btn-primary" href="{{ route('flippers.index') }}">Back</a></h3>
        </div>
        <form class="mt-4" method="post" action="{{ route('flippers.store') }}" id="form_submit" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="iposter_name" class="form-label">Poster Name</label>
                        <input type="text" name="poster_name" class="form-control" placeholder="enter flipper name" id="name">
                        @if ($errors->has('poster_name'))
                            <div class="text-danger form-text">{{ $errors->first('poster_name') }}</div>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="image" class="form-label">Poster Image</label>
                        <input type="file" name="image" class="form-control" placeholder="enter flipper image" id="image">
                        @if ($errors->has('image'))
                            <div class="text-danger form-text">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <input type="submit" id="submit_button" value="Save Flipper" name="save_flippers" class="btn btn-primary">
            </div>

        </form>
    </div>
@endsection
