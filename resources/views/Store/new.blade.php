{{--@extends('layouts.app')--}}
{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <form method="POST" action="{{ route('store.cat.store', $item->id) }}" enctype="multipart/form-data">--}}
{{--            @csrf--}}

{{--            <div class="card-body">--}}
{{--                <div class="form-group">--}}
{{--                    <label for="title">Title</label>--}}
{{--                    <input name="title" value="{{ $item->title }}"--}}
{{--                           id="title"--}}
{{--                           type="text"--}}
{{--                           class="form-control"--}}
{{--                           minlength="3"--}}
{{--                           required>--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <label for="title">Breed</label>--}}
{{--                    <input name="title" value="{{ $item->breed }}"--}}
{{--                           id="title"--}}
{{--                           type="text"--}}
{{--                           class="form-control"--}}
{{--                           minlength="3"--}}
{{--                           required>--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <label for="title">Excerpt</label>--}}
{{--                    <input name="title" value="{{ $item->excerpt }}"--}}
{{--                           id="title"--}}
{{--                           type="text"--}}
{{--                           class="form-control"--}}
{{--                           minlength="3"--}}
{{--                           required>--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <label for="content_raw">Full description</label>--}}
{{--                    <textarea name="content_raw"--}}
{{--                              id="content_raw"--}}
{{--                              class="form-control"--}}
{{--                              rows="7">{{ old('content_html', $item->content_raw) }}</textarea>--}}
{{--                </div>--}}


{{--            </div>--}}
{{--            <button type="submit" class="btn btn-success" style="float: right"> Save</button>--}}

{{--            <a class="btn btn-primary" href="{{ route('store.cat.index') }}" role="button" style="float: right; margin-right: 10px;"> Main page </a>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--@endsection--}}
