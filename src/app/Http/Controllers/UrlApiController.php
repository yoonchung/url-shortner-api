<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Models\Url;

class UrlApiController extends Controller
{
    public const ERR_NOT_FOUND = 'URL not found.';
    public const ERR_INCORRECT_URL = 'URL is incorrect, please check again.';
    public const ERR_DB_STORE = 'Service is unavailable, please try later.';
    public const TOP_LIMIT = 100;

    public function show(Request $request, $base64id)
    {
        if (!is_string($base64id) || strpos($base64id, ' ') || $base64id == '') {
            return '';
        }

        $url = Url::find($this->base62ToDec($base64id));
        if (!$url) {
            return '';
        }

        $url->count += 1;
        $url->save();

        return $url->url;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => self::ERR_INCORRECT_URL], 400, [], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        }

        try {
            $url = Url::create([
                'url' => $request->url,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => self::ERR_DB_STORE], 503, [], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        }

        $base64id = $this->decToBase62($url->id);

        return response()->json(['shortUrl' => $base64id], 201, [], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }

    public function top()
    {
        return Url::orderBy('count', 'desc')->limit(self::TOP_LIMIT)->get()->toJson(JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }

    private function base62ToDec($num, $base = 62)
    {
        $char62 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $res = strpos($char62, $num[0]);
        for ($i = 1; $i < strlen($num); $i++) {
            $res = $base * $res + strpos($char62, $num[$i]);
        }
        return $res;
    }

    private function decToBase62($num, $base = 62)
    {
        $char62 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $r = $num % $base;
        $res = $char62[$r];
        $q = floor($num / $base);
        while ($q) {
            $r = $q % $base;
            $q = floor($q / $base);
            $res = $char62[$r] . $res;
        }
        return $res;
    }
}
