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
                @yield('content')
            </div>
            <div class="hero-foot">
                <div class="container has-text-centered is-fluid">
                    <strong>URL Shortener</strong> by Rafael Renan Pacheco @ 2016
                </div>
            </div>
        </section>
    </body>
</html>
