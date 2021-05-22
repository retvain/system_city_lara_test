@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($paginator as $item)
        <div class="card mb-3" style="max-width: 1200px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="http://placekitten.com/g/350/160" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Id: {{$item->id}} Cat: {{ $item->title }}</h5>
                        <p class="card-text">Breed: {{ $item->breed }}</p>
                        <a class="btn btn-outline-danger" href="#" role="button" style="float: right">Delete</a>
                        <a class="btn btn-outline-warning" href="#" role="button" style="float: right">Edit</a>
                        <a class="btn btn-outline-success" href="#" role="button" style="float: right">Read</a>
                        <a class="btn btn-success" href="#" role="button" style="float: right">BUY! 50% off</a>
                        <p class="card-text"><small class="text-muted">Excerpt: {{ $item->excerpt }}</small></p>

{{--                        <button type="button" class="btn btn-outline-danger">Danger</button>--}}
                    </div>
                </div>
            </div>
    </div>
@endforeach

        @if($paginator->total() > $paginator->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $paginator->links() }}
                        </div>
                    </div>
                </div>
            </div>
@endif



@endsection
