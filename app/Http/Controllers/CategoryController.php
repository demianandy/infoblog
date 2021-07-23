<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Source;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::paginate(5); 
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::pluck('id', 'title')->all();
        return view('admin.categories.create', compact('categories'));
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
            'title' => 'required|unique:categories|max:50',
        ];

        $messages = [
            'title.required' => 'Введите название категории',
            'title.unique' => 'Такая категория уже существует',
            'title.max' => 'Слишком длинное название категории',
        ];

        Validator::make($data, $rules, $messages)->validate();

        category::create($data);

        return redirect()->route('categories.index')->with('success', 'Категория успешно создана');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::find($id);

        return view('admin.categories.edit', compact('category'));
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
        $category = category::find($id);

        $data = $request->all();

        $rules = [
            'title' => "required|max:50|unique:categories,title,{$id}",
        ];

        $messages = [
            'title.required' => 'Введите название категории',
            'title.unique' => 'Такая категория уже существует',
            'title.max' => 'Слишком длинное название категории',
        ];

        Validator::make($data, $rules, $messages)->validate();

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Изменения успешно сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        category::destroy($id);

        return redirect()->route('categories.index')->with('success', 'Категория удалена');
    }
}
