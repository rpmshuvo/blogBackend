<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Article;
use App\Http\Resources\Article as ArticleResource;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get article
        $articles = Article::paginate(15);

        //retrurn collection of articles as a resource
        return ArticleResource::collection($articles);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //article store 
        if ($request->isMethod('put')) {
            $article->id = $request->input('article_id');
            $article->id = $request->input('title');
            $article->id = $request->input('body');
        } else {
            $article =  new Article;
            $article->id = $request->input('title');
            $article->id = $request->input('body');
        }

        if ($article->save()) {
            return new ArticleResource($article);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get single article
        $article = Article::findOrFail($id);

        return new ArticleResource($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get single article delete
        $article = Article::findOrFail($id);
        if ($article->delete()) {
            return new ArticleResource($article);
        }

        
    }
}
