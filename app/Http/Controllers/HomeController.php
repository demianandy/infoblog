<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Source;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        // $articles = Article::with(['category', 'tags', 'source'])->get(); 
        // $categories = Category::all();
        // $tags = Tag::pluck('title', 'id')->all();
        // $sources = Source::pluck('title', 'id')->all();
        $articles_rand = Article::all()->random(20);
        $images = Article::all()->random(6);

        $politics = Article::whereCategoryId('1')->latest()->limit(5)->get()->shuffle();
        $economics = Article::whereCategoryId('2')->latest()->limit(5)->get()->shuffle();
        $sciences = Article::whereCategoryId('5')->latest()->limit(5)->get()->shuffle();
        $peoples = Article::whereCategoryId('10')->latest()->limit(5)->get()->shuffle();

        return view('front.layout', compact('articles_rand', 'images', 'politics', 'economics', 'sciences', 'peoples'));
    }
}
