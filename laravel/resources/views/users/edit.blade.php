@extends('layouts.index')

@section('content')
    <div class="col-12">
        <a class="btn btn-success" href="{{ route('users.index') }}">Back</a>
    </div>


    <form class="col-12" method="post" action="{{ route('users.update',['id' => $user->id]) }}">
        @method('PUT')
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input name="name" type="text" class="form-control" id="name" placeholder="Enter name" value="{{ $user->name }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input name="email" type="email" class="form-control" id="inputEmail3" placeholder="Email" value="{{ $user->email }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Password">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Update user</button>
            </div>
        </div>
    </form>
@endsection