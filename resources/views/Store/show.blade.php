@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="card mb-3">
            <img src="http://placekitten.com/g/1200/300" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">ID: {{ $item->id }} Title: {{ $item->title }}</h5>
                <p class="card-text"><small class="text-muted">Breed: {{ $item->breed }}</small></p>
                <p class="card-text">All Description: {{ $item->content_raw }}</p>

            </div>

        </div>
        <a class="btn btn-primary" href="{{ route('store.cat.index') }}" role="button" style="float: right; margin-right: 10px;"> Main page </a>

    </div>
@endsection
