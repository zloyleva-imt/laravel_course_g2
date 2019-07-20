@extends('layouts.index')

@section('content')

    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card m-2">
            <img src="{{ $news->thumbnail }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $news->title }}</h5>
                <p class="card-text">{{ $news->body }}</p>
            </div>
        </div>
    </div>

@endsection