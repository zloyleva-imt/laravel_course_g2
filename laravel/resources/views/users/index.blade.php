@extends('layouts.index')

@section('content')

    @if(session('status'))
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="col-12">
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        </div>
    @endif

    <div class="col-12">
        <a class="btn btn-info" href="{{ route('users.create') }}">Create User</a>
    </div>
    @foreach($users as $user)
        <div class="col-12 my-2">
            <a class="btn btn-default" href="{{ route('users.show', ['id' => $user->id]) }}">{{ $user->name }}</a>
        </div>
    @endforeach

@endsection