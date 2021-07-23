<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Source;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sources = Source::paginate(5); 
        return view('admin.sources.index', compact('sources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $source = Source::pluck('id', 'title')->all();
        return view('admin.sources.create', compact('source'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|unique:sources',
            'content' => 'required',
            'img' => 'required|image',
        ]);

        if ($request->hasFile('img')) {
            $folder = date('Y-m-d');
            $img = $request->file('img')->store("img/{$folder}");
        };

        $data = $request->all();

        $data['img'] = $img;

        Source::create($data);

        return redirect()->route('sources.index')->with('success', 'Источник успешно создан');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $source = Source::find($id);

        return view('admin.sources.edit', compact('source'));
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
        $source = Source::find($id);

        $request->validate([
            'title' => "required|unique:sources,title,{$id}",
            'content' => 'required',
            'img' => 'image',
        ]);


        $data = $request->all();

        if ($request->hasFile('img')) {
            Storage::delete($source->img);
            $folder = date('Y-m-d');
            $img = $request->file('img')->store("img/{$folder}");
            $data['img'] = $img;
        };


        $source->update($data);

        return redirect()->route('sources.index')->with('success', 'Изменения успешно сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Source::destroy($id);

        return redirect()->route('sources.index')->with('success', 'Источник удален');
    }
}
