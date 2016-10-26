# URL Shortener

URL Shortener is a PHP Laravel project to shorten your own URLs. For example, if URL Shortener is hosted at `mysite.com`, and you use it to shorten `https://www.google.com.br`, it will short this URL to something like `mysite.com/wF`. The encoded identification, `wF` in this example, is an unique representation of the original URL's ID that was stored in the database. Also, this identification is unique for each install, because it will be salted by the application's APP_KEY.

## What kind of encoding is that?

There are many shorteners out there that reinvent the wheel, by coding their own encode/decode logic. URL Shortener on the other hand uses the amazing [hashids.php](https://github.com/ivanakimov/hashids.php) project that does the encode/decode job very well. The main feature is the abilty to generate different identifications for the same ID in different projects. Let's say for example that you have two domains, and you use them to short the same URL for the first time. In both databases the URL will receive an internal identification of 1 (one), but the encoded identification will be different for each domain. It may be something like `mysite/Gh` and `myothersite/tw`. Who knows.

## That was amazing, but how do I use it?

There are two ways to use URL Shortener:

**Directly from your domain as a HTTP GET request:**
```
https://mysite.com/?short=https://www.google.com.br
```

**Or using the URL Shortener home page:**

!["URL Shortener"] (https://cloud.githubusercontent.com/assets/12160864/19749104/072d5f96-9bc5-11e6-8922-23bbc7052db5.png "URL Shortener")

## And how to install this wonderfull shortener?

In order to install a URL Shortener, which is a Laravel 5.3 project, you will need the following programs in your system:
* [Composer](https://getcomposer.org/)
* [NodeJS](https://nodejs.org/)
* [Yarn](https://yarnpkg.com/)

Start by cloning this project into your desired directory:
```
git clone https://github.com/chekovsky/url-shortener.git .
```

Install PHP dependencies:
```
composer install
```

Install NodeJS dependencies:
```
yarn global add gulp-cli
yarn --pure-lockfile
```

Compile CSS with this:
```
gulp --production
```

Create the `.env` file and configure the database options:
```
cp .env.example .env
```

Generate the APP_KEY and create the database tables by running:
```
php artisan key:generate
php artisan migrate
```

Now if your http server is properly configured to run this app, you are good to go!

## Which database can I use?

You can use the following databases:
* MySQL
* Postgres
* SQLite
* SQL Server
* Oracle [(by yajra)](https://github.com/yajra/laravel-oci8)

## How can I help?

You can help by suggesting features, sending PRs, reporting issues that you found, and also by telling your friends about URL Shortener, the best shortener in the universe.

## License

The URL Shortener is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
