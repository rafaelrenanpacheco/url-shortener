<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shortener;
use Hashids\Hashids;
use Validator;

class ShortenerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('url')) {
            return $this->encode($request);
        } else {
            return view('shortener');
        }
    }

    public function example()
    {
        return view('example');
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

    public function generate(Request $request)
    {
        $encoded = $this->encode($request);

        if (is_string($encoded)) {
            return redirect()->route('shortener.index')
                             ->with('shortened_url', $encoded);
        } else {
            return redirect()->route('shortener.index')
                             ->withErrors($encoded);
        }
    }

    private function encode(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            ['url' => 'required|active_url|max:255'],
            [],
            ['url' => 'input']
        );

        if ($validator->fails()) {
            return $validator->errors();
        }

        $url = $request->input('url');

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
}
