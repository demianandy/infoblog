<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Source;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with(['category', 'tags', 'source'])->paginate(5); 
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        $sources = Source::pluck('title', 'id')->all();
        

        return view('admin.articles.create', compact('categories', 'tags', 'sources'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $rules = [
            'title' => 'required|unique:articles|max:100',
            'description' => 'required|max:300',
            'text' => 'required',
            'category_id' => 'required',
            'source_id' => 'required',
            'tags' => 'required',
            'img' => 'required|image',
        ];

        $messages = [
            'title.required' => 'Введите название статьи',
            'title.unique' => 'Статья с таким названием уже существует',
            'title.max' => 'Слишком длинное название статьи',

            'description.required' => 'Введите описание статьи',
            'description.max' => 'Слишком длинное описание',

            'text.required' => 'Введите содержание статьи',

            'category_id.required' => 'Выберите категорию',

            'source_id.required' => 'Выберите источник',

            'tags.required' => 'Выберите хотя бы один тег',

            'img.required' => 'Выберите изображение',
            'img.image' => 'Неверный формат файла',
        ];

        Validator::make($data, $rules, $messages)->validate();

        if ($request->hasFile('img')) {
            $folder = date('Y-m-d');
            $img = $request->file('img')->store("img/{$folder}");
        };

        $category_id = Category::whereTitle($request->category_id)->pluck('id')->first();
        $source_id = Source::whereTitle($request->source_id)->pluck('id')->first();
        $tags = Tag::whereIn('title', $request->tags)->get()->pluck('id');
  
        $data['img'] = $img;
        $data['category_id'] = $category_id;
        $data['source_id'] = $source_id;

        $article = Article::create($data);
        $article->tags()->sync($tags);

        return redirect()->route('articles.index')->with('success', 'Статья успешно создана');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::where('id', $id)->findOrFail($id); // открывает страницу или выдает ошибку 404

        $article->view += 1;
        $article->update();

        $page = Article::find($id);
        $tags = $page->tags;
        $page = $page->tags[0]->title;

        $related = Article::whereHas('tags', function($q) use($page, $id){
            $q->where('title', $page);
        })->inRandomOrder()->limit(3)->get();

        return view('front.article', compact('article', 'related', 'page', 'id', 'tags'));
    }

    public function random()
    {
        $article = Article::all()->random(1)->first();
        
        $article->view += 1;
        $article->update();
        
        $id = $article->id;
        $page = $article;
        $tags = $page->tags;
        $page = $page->tags[0]->title;

        $related = Article::whereHas('tags', function($q) use($page, $id){
            $q->where('title', $page);
        })->inRandomOrder()->limit(3)->get();
        return view('front.article', compact('article', 'related', 'page', 'id', 'tags'));
    }

    public function category($category)
    {
        $id = Category::where('title', $category)->get()->pluck('id');
        $articles = Article::where('category_id', $id)->paginate(6);


        return view('front.line', compact('category', 'articles'));
    }

    public function source($category)
    {
        $id = Source::where('title', $category)->get()->pluck('id');
        $articles = Article::where('source_id', $id)->paginate(6);


        return view('front.line', compact('category', 'articles'));
    }

    public function tag($category)
    {
        $articles = Article::whereHas('tags', function($q) use($category){
            $q->where('title', $category);
        })->paginate(6);


        return view('front.line', compact('category', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        $sources = Source::pluck('title', 'id')->all();

        return view('admin.articles.edit', compact('article', 'categories', 'tags', 'sources'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $article = Article::find($id);

        $rules = [
            'title' => "required|unique:articles,title,{$id}|max:100",
            'description' => 'required|max:300',
            'text' => 'required',
            'category_id' => 'required',
            'source_id' => 'required',
            'tags' => 'required',
            'img' => 'image',
        ];

        $messages = [
            'title.required' => 'Введите название статьи',
            'title.unique' => 'Статья с таким названием уже существует',
            'title.max' => 'Слишком длинное название статьи',

            'description.required' => 'Введите описание статьи',
            'description.max' => 'Слишком длинное описание',

            'text.required' => 'Введите содержание статьи',

            'category_id.required' => 'Выберите категорию',

            'source_id.required' => 'Выберите источник',

            'tags.required' => 'Выберите хотя бы один тег',

            'img.required' => 'Выберите изображение',
            'img.image' => 'Неверный формат файла',
        ];

        $data = $request->all();

        if ($request->hasFile('img')) {
            Storage::delete($source->img);
            $folder = date('Y-m-d');
            $img = $request->file('img')->store("img/{$folder}");
            $data['img'] = $img;
        };

        Validator::make($data, $rules, $messages)->validate();

        $category_id = Category::whereTitle($request->category_id)->pluck('id')->first();
        $source_id = Source::whereTitle($request->source_id)->pluck('id')->first();
        $tags = Tag::whereIn('title', $request->tags)->get()->pluck('id');

        $data['category_id'] = $category_id;
        $data['source_id'] = $source_id;

        $article->update($data);
        $article->tags()->sync($tags);

        return redirect()->route('articles.index')->with('success', 'Статья успешно создана');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id);

        return redirect()->route('articles.index')->with('success', 'Статья удалена');
    }

}