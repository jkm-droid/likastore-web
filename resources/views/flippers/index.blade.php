@extends('base.index')

@section('content')
    <h2>Flippers</h2>

    <a class="btn btn-success mb-3" href="{{ route('flippers.create') }}"> Create New Flipper</a>

    @if ($message = Session::get('success'))
        <p class="alert alert-success">{{ $message }}</p>
    @endif

    <table class="table table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Poster Name</th>
            <th>Poster Image</th>
            <th>Poster Url</th>
            <th>Action</th>
        </tr>
        @foreach ($flippers as $flipper)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $flipper->poster_name }}</td>
                <td><img src="/posters/{{ $flipper->poster_name }}" alt="" width="40px" height="40px"></td>
                <td>{{ $flipper->posterurl }}</td>
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

    {!! $flippers->links() !!}

@endsection
