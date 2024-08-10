<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Notes;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Notes::with('category')->orderBy('id', 'desc')->get();
        return view('notes.index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('notes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form doğrulama kuralları
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'color' => 'nullable|string',
            'note' => 'required|string',
        ]);

        $note = new Notes();
        $note->title = $request->input('title');
        $note->category_id = $request->input('category_id');
        $note->color = $request->input('color');
        $note->note = $request->input('note');
        $note->save();

        return redirect('index')->with('success', 'Not başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $note = Notes::find($id);
        return view('notes.index', ['notes' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Notes::find($id);
        $categories = Categories::all();

        return view('notes.edit', [
            'notes' => $note,
            'categories' => $categories
        ]);
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
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'color' => 'nullable|string',
            'note' => 'required|string',
        ]);

        $note = Notes::findOrFail($id);

        $note->title = $request->input('title');
        $note->category_id = $request->input('category_id');
        $note->color = $request->input('color', $note->color);
        $note->note = $request->input('note');
        $note->save();

        return redirect('index')->with('status', 'Not başarıyla güncellendi.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Notes::findOrFail($id);
        $note->delete();

        return redirect('index')->with('success', 'Not başarıyla silindi.');
    }

    public function indexByCategory($id)
{
    $notes = Notes::where('category_id', $id)->orderBy('id', 'desc')->get();
    $category = Categories::findOrFail($id);
    $categories = Categories::all(); 

    return view('categories.indexByCategory', compact('notes', 'category', 'categories'));
}

    
}
