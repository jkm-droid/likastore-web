@extends('base.index')

@section('content')

    <h2>Add New Flipper</h2>

    <a class="btn btn-primary" href="{{ route('flippers.index') }}"> Back</a>
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
    <form class="mt-4" method="post" action="{{ route('flippers.store') }}" id="form_submit" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label for="inputflippername" class="form-label">Poster Name</label>
                <input type="text" name="poster_name" class="form-control" placeholder="enter flipper name" id="name">
            </div>

            <div class="col-md-6">
                <label for="inputflipperprice" class="form-label">Poster Image</label>
                <input type="file" name="image" class="form-control" placeholder="enter flipper image" id="image">
            </div>
        </div>

        <input type="hidden" name="flipper_id" class="form-control" id="flipper_id">

        <br>

        <div class="col-md-6 offset-md-3 d-grid">
            <input type="submit" id="submit_button" value="Save Flipper" name="save_flippers" class="btn btn-info">
        </div>

    </form>
@endsection
