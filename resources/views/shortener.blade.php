@extends('app')

@section('content')
    <div class="container has-text-centered">
        @if(session()->has('shortened_url'))
            <article class="message is-primary">
                <div class="message-header">
                    Shortened URL
                </div>
                <div class="message-body">{{ session()->pull('shortened_url') }}</div>
            </article>
        @elseif(count($errors) > 0)
            <article class="message is-primary">
                <div class="message-header">
                    Something went wrong...
                </div>
                <div class="message-body">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </article>
        @else
            <form action="{{ route('shortener.generate') }}" method="post">
                {{ csrf_field() }}
                <p class="control has-icon has-addons">
                    <input class="input is-large is-expanded" type="text" name="url" id="url" maxlength="255" placeholder="https://www.someurl.com">
                    <i class="fa fa-link"></i>
                    <button type="submit" class="button is-primary is-large">
                        Generate
                    </button>
                </p>
            </form>
        @endif
    </div>
@endsection
