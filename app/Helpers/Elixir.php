<?php

namespace App\Helpers;

class Elixir
{
    public static function version($file)
    {
        $manifest = json_decode(file_get_contents(public_path('rev-manifest.json')), true);

        if (isset($manifest[$file]) == true) {
            return '/'.(file_exists($manifest[$file]) ? $manifest[$file] : $file);
        }

        throw new \InvalidArgumentException("File {$file} not defined in asset manifest.");
    }
}
