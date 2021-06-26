@extends('base.index')

@section('content')

    <h2>Add New Image(s)</h2>

    <a class="btn btn-primary" href="{{ route('images.index') }}"> Back</a>
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
    <form class="mt-4" method="post" action="{{ route('images.store') }}" id="form_submit" enctype="multipart/form-data">
        @csrf
        <div class="col-md-">
            <label for="inputimage" class="form-label">Images</label>
            <input type="file" name="image[]" class="form-control" id="image" multiple>
        </div>
        <br>
        <div class="col-md-">
            <input type="submit" id="submit_button" value="Save Image" name="save_images" class="btn btn-info">
        </div>

    </form>
@endsection
