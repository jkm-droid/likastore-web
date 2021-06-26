@extends('base.index')

@section('content')
    <h2>Edit "{{ $drink->drink_name}}"</h2>

    <a class="btn btn-primary" href="{{ route('drinks.index') }}"> Back</a>

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

    <form action="{{ route('drinks.update',$drink->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label for="inputdrinkname" class="form-label">Name</label>
                <input type="text" name="drink_name" value="{{ $drink->drink_name}}" class="form-control" placeholder="enter drink name" id="name">
            </div>
            <div class="col-md-6">
                <label for="inputdrinkprice" class="form-label">Price</label>
                <input type="number" name="drink_price" value="{{ $drink->drink_price}}" class="form-control" placeholder="enter drink Price" id="price">
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6 mt-3">
                <label for="inputdrink" class="form-label">Category</label>
                <select name="drink_category" id="category" class="form-select form-control" aria-label="Default select example" autofocus>
                    @if($drink->drink_category)
                        <option value="{{$drink->drink_category}}" selected>{{$drink->drink_category}}</option>
                    @endif
                    <option value="">Select drink category</option>
                    <option value="vodka">Vodka</option>
                    <option value="beer">Beer</option>
                    <option value="gin">Gin</option>
                    <option value="whiskey">Whiskey</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputposterurl" class="form-label">Poster Image</label>

                <input type="file" name="image" class="form-control" id="image">

            </div>
            <input type="hidden" name="drink_id" class="form-control" id="drink_id">
        </div>

        <div>
            <label for="drinkstory" class="form-label">Description</label>
            <textarea class="form-control" name="drink_description" value="" id="description" rows="4">{{ $drink->drink_description}}</textarea>
        </div>

        <div class="mb-3 mt-3 form-check">
            <input type="checkbox" class="form-check-input" id="offer_drink">
            <label class="form-check-label text-primary" for="drink_status"><strong>Check for offer</strong></label>
            <input type="hidden" name="offer_edit" class="form-control" id="offer_edit">
        </div>

        <br>

        <div class="col-md-6 offset-md-3 d-grid">
            <input type="submit" id="submit_button" value="Update drink" name="save_drinks" class="btn btn-info">
        </div>

    </form>
@endsection
