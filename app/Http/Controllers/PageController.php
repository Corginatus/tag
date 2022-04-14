<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $lang = $request->cookie('lang') ?? 'ru';
        $cases = Post::where('language', $lang)->get();

        return view($lang . '.index', ['lang' => $lang, 'cases' => PostResource::collection($cases)]);
    }

    public function language(Request $request)
    {
        $lang = $request->cookie('lang');

        if ($lang == "ru") {
            $cookie = cookie('lang', 'en', 3600*3600*3600);
        } else {
            $cookie = cookie('lang', 'ru', 3600*3600*3600);
        }

        return redirect('/')->withCookie($cookie);
    }

    public function casePage(Request $request, int $id)
    {
        $lang = $request->cookie('lang') ?? 'ru';

        $case = Post::find($id);
        $cases = Post::where('id', '!=', $id)->where('language', $lang)->get();

        return view($lang.'.case', ['lang' => $lang, 'case' => $case, 'cases' => $cases]);
    }
}
