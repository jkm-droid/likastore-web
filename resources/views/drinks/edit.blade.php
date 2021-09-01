@extends('base.index')

@section('content')
    <section class="content-header mb-3">
        <h1>
            Edit "{{ $drink->drink_name}}"
        </h1>
        <ol class="breadcrumb text-black">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class=""><a href="{{ route('drinks.index') }}">Drinks</a></li>
            <li class="active">{{ $drink->drink_name}}</li>
        </ol>
    </section>

    <div class="box box-success mt-3">
        <div class="box-header with-border">
            <h3 class="box-title"><a class="btn btn-sm btn-success" href="{{ route('drinks.index') }}">Back</a></h3>
        </div>
        <form action="{{ route('drinks.update',$drink->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="box-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputdrinkname" class="form-label">Name</label>
                        <input type="text" name="drink_name" value="{{ $drink->drink_name}}" class="form-control" placeholder="enter drink name" id="name">
                        @if ($errors->has('drink_name'))
                            <div class="text-danger form-text">{{ $errors->first('drink_name') }}</div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputdrinkprice" class="form-label">Price</label>
                        <input type="number" name="drink_price" value="{{ $drink->drink_price}}" class="form-control" placeholder="enter drink Price" id="price">
                        @if ($errors->has('drink_price'))
                            <div class="text-danger form-text">{{ $errors->first('drink_price') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-6 mt-3">
                        <label for="drink_category" class="form-label">Category</label>
                        <select name="drink_category" id="category" class="form-select form-control" aria-label="Default select example" autofocus>
                            @if($drink->drink_category)
                                <option value="{{$drink->drink_category}}" selected>{{$drink->drink_category}}</option>
                            @endif
                                <option value="" disabled>Select drink category</option>
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
                        <label for="image" class="form-label">Poster Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                </div>

                <div>
                    <label for="drink_description" class="form-label">Description</label>
                    <textarea class="form-control" name="drink_description" value="" rows="4">{{ $drink->drink_description}}</textarea>
                    @if ($errors->has('drink_description'))
                        <div class="text-danger form-text">{{ $errors->first('drink_description') }}</div>
                    @endif
                </div>

                <div class="mb-3 mt-3 form-check">
                    <input type="checkbox" class="form-check-input" id="offer_drink">
                    <label class="form-check-label text-primary" for="drink_status"><strong>Check for offer</strong></label>
                    <input type="hidden" name="offer_edit" class="form-control" id="offer_edit">
                </div>
            </div>

            <div class="box-footer">
                <input type="submit" id="submit_button" value="Update drink" name="save_drinks" class="btn btn-success">
            </div>

        </form>
    </div>
@endsection
