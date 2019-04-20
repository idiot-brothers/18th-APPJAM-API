<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleApplication;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return response()->json(Article::scopeGetArticles());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) {
        return Article::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id) {
        return response()->json(Article::scopeShowArticles($id));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function applicationArticle(Request $request, int $id) {
        return ArticleApplication::create([
           'user_id' => $request->user_id,
           'article_id' => $id
        ]);
    }
}