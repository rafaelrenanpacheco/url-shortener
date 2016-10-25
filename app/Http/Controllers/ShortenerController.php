<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shortener;
use Hashids\Hashids;
use Validator;

class ShortenerController extends Controller
{
    public function short(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'short' => 'active_url',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        if ($request->has('short')) {
            $url = $request->input('short');

            $shortener = Shortener::where('url', $url)->first();

            if ($shortener) {
                $shortener->touch();
            } else {
                $shortener = new Shortener;
                $shortener->url = $url;
                $shortener->save();
            }

            $hashids = new Hashids(config('app.key'));

            return url($hashids->encode($shortener->id));
        }

        return '';
    }

    public function redirect($url)
    {
        $shortener = null;

        $hashids = new Hashids(config('app.key'));

        $id = $hashids->decode($url);

        if (count($id) > 0) {
            $shortener = Shortener::find($id[0]);
        }

        if ($shortener) {
            return redirect($shortener->url);
        } else {
            return '';
        }
    }
}
