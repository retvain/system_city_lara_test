@extends('layouts.app')
@section('content')
    <div class="container">
        @include('Store.includes.result_messages')
        @if($item->exists)
            <form method="POST" action="{{ route('store.cat.update', $item->id) }}">
                @method('PATCH')
                @else
                    <form method="POST" action="{{ route('store.cat.store') }}">
                        @endif
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="title" value="{{ $item->title }}"
                                       id="title"
                                       type="text"
                                       class="form-control"
                                       minlength="3"
                                       required>
                            </div>

                            <div class="form-group">
                                <label for="breed">Breed</label>
                                <input name="breed" value="{{ $item->breed }}"
                                       id="breed"
                                       type="text"
                                       class="form-control"
                                       minlength="3"
                                       required>
                            </div>

                            <div class="form-group">
                                <label for="excerpt">Excerpt</label>
                                <input name="excerpt" value="{{ $item->excerpt }}"
                                       id="excerpt"
                                       type="text"
                                       class="form-control"
                                       minlength="3"
                                       required>
                            </div>

                            <div class="form-group">
                                <label for="content_raw">Full description</label>
                                <textarea name="content_raw"
                                          id="content_raw"
                                          class="form-control"
                                          rows="7">{{ old('content_html', $item->content_raw) }}</textarea>
                            </div>


                        </div>
                        <button type="submit" class="btn btn-success" style="float: right"> Save</button>

                        <a class="btn btn-primary" href="{{ route('store.cat.index') }}" role="button"
                           style="float: right; margin-right: 10px;"> Main page </a>

                    </form>
                    @if($item->exists)
                        <br>
                        <form method="POST" action="{{ route('store.cat.destroy', $item->id) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>

                        </form>
        @endif
    </div>
@endsection
