<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;
use App\Author;

class ApiParser extends Controller
{
    public static function parseApi() {
        try {
            $api_url = 'https://jetstyle-junior-test.herokuapp.com/';
            $api_json = file_get_contents($api_url);
            $article_objs = json_decode($api_json);
            foreach ($article_objs as $article_obj) {
                $article = new Article();
                $article->id = $article_obj->id; //да, так делать - не очень
                $article->title = $article_obj->title;
                $article->teaser = $article_obj->teaser;
                $article->body = $article_obj->body;
                $author = Author::firstOrCreate(['id' => $article_obj->author->id], 
                ['name' => $article_obj->author->name, 'email' => $article_obj->author->email]);
                $article->author()->associate($author);
                $article->published = $article_obj->published;
                $article->tags()->detach();
                $article->save();
                foreach ($article_obj->tags as $api_tag) {
                    $tag = Tag::firstOrCreate(['id' => $api_tag->id], ['name' => $api_tag->name]);
                    $article->tags()->attach($tag);
                }
            }
        }
        catch (Exception $e) {
            return "Ошибка: ".$e->getMessage();
        }
        return 'OK';
    }
}
