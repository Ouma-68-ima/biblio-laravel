<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\auteur;
use \App\Models\livre;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livres = livre::with('auteur')->orderBy('id', 'desc')->paginate(10);
        return view('layouts.livres.index', compact('livres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auteurs = Auteur::all();
        return view('layouts.livres.create', compact('auteurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'auteurs_id' => ['required', 'exists:auteurs,id'],
            'titre' => ['required', 'string', 'max:200'],
            'isbn' => ['required', 'string', 'max:20', 'unique:livres,isbn'],
            'prix' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'date_publication' => ['nullable', 'date'],
        ]);

        Livre::create($request->all());
        return redirect()->route('livres.index')->with('success','Livre ajouté');
    }

    /**
     * Display the specified resource.
     */
    public function show(livre $livre)
    {
        $livre ->load('auteur');
        return view('layouts.livres.show', compact('livre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(livre $livre)
    {
        $auteurs = Auteur::all();
        return view('layouts.livres.edit', compact('livre','auteurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, livre $livre)
    {
         $request->validate([
            'auteurs_id' => ['required', 'exists:auteurs,id'],
            'titre' => ['required', 'string', 'max:200'],
            'isbn' => ['required', 'string', 'max:20', 'unique:livres,isbn,'.$livre->id],
            'prix' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'date_publication' => ['nullable', 'date'],
        ]);

        $livre->update($request->all());
        return redirect()->route('livres.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(livre $livre)
    {
         $livre->delete();
        return redirect()->route('livres.index')->with('success','Livre supprimé');
    }
}
