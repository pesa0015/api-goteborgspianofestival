<?php

namespace App\Http\Controllers;

use App\News;

class NewsController extends CustomController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsRaw = News::visible()->with([
            'translations' => function ($query) {
                return $query->ofLang();
            }
        ])->orderBy('id', 'DESC')->get();

        $news = $this->transform->collection($newsRaw, News::getTransformer());

        return response()->json($news, 200);
    }
}
