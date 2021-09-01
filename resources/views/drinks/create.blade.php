@extends('base.index')

@section('content')
    <section class="content-header mb-3">
        <h1>
            Add New Drink
        </h1>
        <ol class="breadcrumb text-black">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class=""><a href="{{ route('drinks.index') }}">Drinks</a></li>
            <li class="active">Add New Drinks</li>
        </ol>
    </section>

    <div class="box box-success mt-3">
        <div class="box-header with-border">
            <h3 class="box-title"><a class="btn btn-sm btn-success" href="{{ route('drinks.index') }}">Back</a></h3>
        </div>
        <form role="form" method="post" action="{{ route('drinks.store') }}" id="form_submit" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="drink_name" class="form-label">Name</label>
                        <input type="text" name="drink_name" class="form-control" placeholder="enter drink name" id="name">
                        @if ($errors->has('drink_name'))
                            <div class="text-danger form-text">{{ $errors->first('drink_name') }}</div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="drink_price" class="form-label">Price</label>
                        <input type="number" name="drink_price" class="form-control" placeholder="enter drink price" id="price">
                        @if ($errors->has('drink_price'))
                            <div class="text-danger form-text">{{ $errors->first('drink_price') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-6 mt-3">
                        <label for="drink_category" class="form-label">Category</label>
                        <select name="drink_category" id="category" class="form-select form-control" aria-label="Default select example" autofocus>
                            <option value="" disabled selected>Select drink category</option>
                            <option value="vodka">Vodka</option>
                            <option value="beer">Beer</option>
                            <option value="gin">Gin</option>
                            <option value="whiskey">Whiskey</option>
                            <option value="soft_drinks">Soft Drinks</option>
                        </select>
                        @if ($errors->has('drink_category'))
                            <div class="text-danger form-text">{{ $errors->first('drink_category') }}</div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputposterurl" class="form-label">Poster Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                        @if ($errors->has('image'))
                            <div class="text-danger form-text">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
                </div>

                <div>
                    <label for="drink_description" class="form-label">Description</label>
                    <textarea class="form-control" name="drink_description" id="description" rows="4"></textarea>
                    @if ($errors->has('drink_description'))
                        <div class="text-danger form-text">{{ $errors->first('drink_description') }}</div>
                    @endif
                </div>
            </div>

            <div class="box-footer">
                <input type="submit" id="submit_button" value="Save drink" name="save_drinks" class="btn btn-success">
            </div>

        </form>
    </div>
@endsection
