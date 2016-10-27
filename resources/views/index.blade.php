<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>URL Shortener</title>
        <link rel="stylesheet" href="{{ Elixir::version('css/all.css') }}">
    </head>
    <body>
        <section class="hero is-success is-fullheight">
            <div class="hero-head">
                <nav class="nav has-shadow">
                    <div class="nav-left"></div>
                    <div class="nav-center">
                        <a class="nav-item" href="{{ route('shortener.index') }}">
                            URL Shortener
                        </a>
                    </div>
                    <div class="nav-right">
                        <a class="nav-item" href="https://github.com/chekovsky/url-shortener" target="_blank">
                            <span class="icon">
                                <i class="fa fa-github"></i>
                            </span>
                        </a>
                    </div>
                </nav>
            </div>
            <div class="hero-body">
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
                                <input class="input is-large is-expanded" type="text" name="short" id="short" maxlength="255" placeholder="https://www.someurl.com">
                                <i class="fa fa-link"></i>
                                <button type="submit" class="button is-primary is-large">
                                    Generate
                                </button>
                            </p>
                        </form>
                    @endif
                </div>
            </div>
            <div class="hero-foot">
                <div class="container has-text-centered is-fluid">
                    <strong>URL Shortener</strong> by Rafael Renan Pacheco @ 2016
                </div>
            </div>
        </section>
    </body>
</html>
