<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Notes;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $notes = Notes::with('category')->orderBy('id', 'desc')->get();
        $categories = Categories::all();

        return view('home.index', [
            'notes' => $notes,
            'categories' => $categories
        ]);
    }
}
