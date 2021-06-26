@extends('base.index')

@section('content')
    <div class="col-4">
        <h2>Drinks under {{$category}}</h2>
        <a class="btn btn-success" href="{{ route('drinks.create') }}"> Create New drink</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-striped table-hover" style="margin-top: 5px;">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Poster Url</th>
            <th class="text-center" width="180px">Action</th>
        </tr>
        @foreach ($drinks_cat as $drink)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $drink->drink_name }}</td>
                <td>{{ $drink->drink_price }}</td>
                <td>{{ $drink->drink_description }}</td>
                <td>{{ $drink->poster_url }}</td>
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

    {!! $drinks_cat->links() !!}

@endsection
