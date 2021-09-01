@extends('base.index')

@section('content')
    <div class="col-4">
        <h2>Users</h2>
    </div>

{{--    @if ($message = Session::get('success'))--}}
{{--        <div class="alert alert-success">--}}
{{--            <p>{{ $message }}</p>--}}
{{--        </div>--}}
{{--    @endif--}}
    @if($users->isEmpty())
        <p class="text-center text-danger">No users found!</p>
    @else
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover" style="margin-top: 5px;">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th>Super Admin</th>
                    <th class="text-center" colspan="2">Action</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{ $user->email }}</td>
                        @if($user->is_admin == 1)
                            <td><span><i class="fa fa-check-circle fa-lg text-center text-green ml-3"></i></span></td>
                        @elseif($user->is_admin == 0)
                            <td><span><i class="fa fa-close fa-lg text-danger text-center ml-3"></i></span></td>
                        @endif
                        @if($user->is_super_admin == 1)
                            <td><span><i class="fa fa-check-circle fa-lg text-center text-green ml-3"></i></span></td>
                        @elseif($user->is_super_admin == 0)
                            <td><span><i class="fa fa-close fa-lg text-danger text-center ml-3"></i></span></td>
                        @endif
                        <td class="hide-data">
                            <form action="{{ route('profile.deactivate', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                @if($user->is_admin == 1)
                                    <button class="btn btn-danger btn-sm" >Deactivate</button>
                                @else
                                    <button class="btn btn-success btn-sm" >Activate</button>
                                @endif
                            </form>
                        </td>
                        <td>
                            <form onsubmit="return confirm('Do you really want to delete?')" action="{{ route('profile.delete', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                    <button class="btn btn-danger btn-sm" >Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif

@endsection
