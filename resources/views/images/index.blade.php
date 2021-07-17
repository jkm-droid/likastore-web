@extends('base.index')

@section('content')
    <div class="col-4">
        <h2>Images</h2>
        <a class="btn btn-success" href="{{ route('images.create') }}"> Create New image</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if($images->isEmpty())
        <p class="text-center text-danger">No images found!</p>
    @else
    <table class="table table-striped table-hover" style="margin-top: 5px;">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Status</th>
            <th class="text-center" width="180px">Action</th>
        </tr>
        @foreach ($images as $image)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $image->file_name }}</td>
                <td>{{ $image->status }}</td>
                <td>
                    <form action="{{ route('images.destroy',$image->id) }}" method="POST">

                        <a class="btn btn-info btn-sm" href="{{ route('images.show',$image->id) }}">Show</a>

                        <a class="btn btn-primary btn-sm" href="{{ route('images.edit',$image->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    @endif

    {!! $images->links() !!}

@endsection
