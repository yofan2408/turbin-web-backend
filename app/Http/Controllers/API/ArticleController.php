<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function insert(ArticleRequest $articleRequest){
        return 'insert article';
    }

    public function update(ArticleRequest $articleRequest){
        return 'udpate article';
    }

    public function delete(ArticleRequest $articleRequest){
        return 'delete article';
    }

    public function getArticleById(ArticleRequest $articleRequest){
        return 'get article by id';
    }

    public function getArticles(){
        return 'all article';
    }
}
