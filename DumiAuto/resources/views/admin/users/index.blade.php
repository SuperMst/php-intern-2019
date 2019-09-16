@extends('layout')

@section('title')
User List
@endsection

@section('content')
<table class="table">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Permissions</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td class="text-center">{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->permissions}}</td>
            <td class="td-actions text-right">
                <a href="{{ URL::to('users/' . $user->id)}}">
                    <button type="button" rel="tooltip" class="btn btn-info btn-round">
                        <i class="material-icons">person</i>
                    </button>
                </a>
                <form class="d-inline" action="{{url('users', [$user->id])}}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" rel="tooltip" class="btn btn-danger btn-round">
                        <i class="material-icons">close</i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection