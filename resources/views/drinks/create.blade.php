@extends('base.index')

@section('content')
    <h2>Add New Drink</h2>

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

    <form class="mt-4" method="post" action="{{ route('drinks.store') }}" id="form_submit" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label for="inputdrinkname" class="form-label">Name</label>
                <input type="text" name="drink_name" class="form-control" placeholder="enter drink name" id="name">
            </div>
            <div class="col-md-6">
                <label for="inputdrinkprice" class="form-label">Price</label>
                <input type="number" name="drink_price" class="form-control" placeholder="enter drink Price" id="price">
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6 mt-3">
                <label for="inputdrinktype" class="form-label">Category</label>
                <select name="drink_category" id="category" class="form-select form-control" aria-label="Default select example" autofocus>
                    <option selected>Select drink category</option>
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
            <textarea class="form-control" name="drink_description" id="description" rows="4"></textarea>
        </div>

        <br>

        <div class="col-md-6 offset-md-3 d-grid">
            <input type="submit" id="submit_button" value="Save drink" name="save_drinks" class="btn btn-info">
            <input type="submit" id="update_button" value="Update drink" name="update_drinks" class="btn btn-primary" style="display:none;">
        </div>

    </form>
@endsection
