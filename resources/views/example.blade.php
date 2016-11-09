@extends('app')

@section('content')
    <div class="container has-text-centered">
        <article class="message is-primary">
            <div class="message-header">
                How to shorten your URL with a GET request:
            </div>
            <div class="message-body">
                {!! route('shortener.index') !!}?url=http://www.someurl.com
            </div>
        </article>
    </div>
@endsection
