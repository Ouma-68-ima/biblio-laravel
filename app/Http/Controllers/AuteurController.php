<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    /**
     *  Afficher tous les auteurs paginés
     */
    public function index()
    {
        $auteurs = Auteur::orderBy('id', 'desc')->paginate(10);
        return view('layouts.auteurs.index', compact('auteurs'));
    }

    /**
     *  Formulaire création
     */
    public function create()
    {
        return view('layouts.auteurs.create');
    }

    /**
     *  Store avec validation
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:100'],
            'prenom' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'unique:auteurs,email'],
            'nationalite' => ['nullable', 'string', 'max:100'],
            'date_naissance' => ['nullable', 'date'],
        ]);

        Auteur::create($request->all());

        return redirect()->route('auteurs.index')->with('success', 'Auteur ajouté avec succès');
    }

    /**
     *  Afficher un auteur et ses livres - Point 35
     */
    public function show(Auteur $auteur)
    {
        $auteur->load('livres'); // bach njibo lkotob dyalo
        return view('layouts.auteurs.show', compact('auteur'));
    }

    /**
     *  Formulaire modification
     */
    public function edit(Auteur $auteur)
    {
        return view('layouts.auteurs.edit', compact('auteur'));
    }

    /**
     *  Update - Point 42
     */
    public function update(Request $request, Auteur $auteur)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:100'],
            'prenom' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'unique:auteurs,email,' . $auteur->id],
            'nationalite' => ['nullable', 'string', 'max:100'],
            'date_naissance' => ['nullable', 'date'],
        ]);

        $auteur->update($request->all());

        return redirect()->route('auteurs.index')->with('success', 'Auteur modifié');
    }

    /**
     *  Supprimer - Point 46
     */
    public function destroy(Auteur $auteur)
    {
        // Ila 3andek cascadeOnDelete, ga3 livres dyalo ghadi ytms7o automatique
        $auteur->delete();

        return redirect()->route('auteurs.index')->with('success', 'Auteur supprimé et ses livres aussi');
    }
}