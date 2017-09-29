<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;

class MainController extends Controller
{
    public function index() {
        $articles = Article::all();
        return view('home', ['articles' => $articles]);
    }

    public function viewTag($id) {
        $tag = Tag::find($id);
        return view('home', ['articles' => $tag->articles, 'tag' => $tag->name]);
    }
}
