@extends('base.index')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="text-center text-info" style="font-size: x-large;">
        <img height="300" width="300" src="/profile_pictures/{{ \Illuminate\Support\Facades\Auth::user()->profile_url }}" class="img-circle" alt="User Image" /><br>
        Name: {{ $user->name }} <br>
        Username: {{ $user->username }}<br>
        Email: {{ $user->email }}<br>
       <a href="{{ route('profile.edit', $user->id) }}"> <button class="btn btn-sm btn-success mt-3">Edit Profile</button></a>
    </div>
@endsection
