@extends('layouts.index')

@section('content')

    <news_list-component
        :news="{{ $news }}"
        :routes="{{ $routes }}"
    ></news_list-component>

@endsection