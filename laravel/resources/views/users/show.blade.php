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
        <a class="btn btn-success" href="{{ route('users.index') }}">Back</a>
    </div>


    <div class="col-12">
        Name: {{ $user->name }}
    </div>
    <div class="col-12">
        Email: {{ $user->email }}
    </div>
    <div class="col-12">
        Status: {{ $user->status?'active':'not active' }}
    </div>
    <div class="col-12">
        Role: {{ $user->role }}
    </div>

    <div class="col-12">
        <a class="btn btn-secondary" href="{{ route('users.edit', ['id' => $user->id]) }}">Edit</a>
        <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="post">

            @method('delete')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection