<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UrlController extends Controller
{
    public const BASE_URL = 'http://localhost:8080/url';

    public function show(Request $request, $base64id)
    {
        $res = app('App\Http\Controllers\UrlApiController')->show($request, $base64id);
        if ($res == '') {
            return redirect(self::BASE_URL);
        }

        return redirect($res);
    }

    public function index()
    {
        return view('store');
    }

    public function store(Request $request)
    {
        $res = app('App\Http\Controllers\UrlApiController')->store($request);
        if ($res->status() != 201) {
            $msg = 'Error: ' . $res->getData()->error;
            return back()->with('msg', $msg);
        }

        $msg = 'ShorURL created: ' . self::BASE_URL . '/' . $res->getData()->shortUrl;
        return back()->with('msg', $msg);
    }

    public function top()
    {
        $res = json_decode(app('App\Http\Controllers\UrlApiController')->top());
        return view('top', compact(['res']));
    }
}
