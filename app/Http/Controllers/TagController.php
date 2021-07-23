<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Source;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(5); 
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::pluck('id', 'title')->all();
        return view('admin.tags.create', compact('tags'));
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
            'title' => 'required|unique:tags|max:50',
        ];

        $messages = [
            'title.required' => 'Введите название тега',
            'title.unique' => 'Такой тег уже существует',
            'title.max' => 'Слишком длинное название тега',
        ];

        Validator::make($data, $rules, $messages)->validate();

        Tag::create($data);

        return redirect()->route('tags.index')->with('success', 'Тег успешно создан');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('admin.tags.edit', compact('tag'));
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
        $tag = Tag::find($id);

        $data = $request->all();

        $rules = [
            'title' => "required|max:50|unique:tags,title,{$id}",
        ];

        $messages = [
            'title.required' => 'Введите название тега',
            'title.unique' => 'Такой тег уже существует',
            'title.max' => 'Слишком длинное название тега',
        ];

        Validator::make($data, $rules, $messages)->validate();

        $tag->update($data);

        return redirect()->route('tags.index')->with('success', 'Изменения успешно сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::destroy($id);

        return redirect()->route('tags.index')->with('success', 'Тег удален');
    }
}
