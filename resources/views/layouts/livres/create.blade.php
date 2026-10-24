@extends('layouts.app')

@section('title', 'Ajouter un livre')

@section('content')
<h2>Ajouter un livre</h2>

<form action="{{ route('livres.store') }}" method="POST">
@csrf
<div class="mb-2"><label>Titre</label><input type="text" name="titre" class="form-control" required></div>
<div class="mb-2"><label>ISBN</label><input type="text" name="isbn" class="form-control" required></div>
<div class="mb-2"><label>Prix</label><input type="number" step="0.01" name="prix" class="form-control" required></div>
<div class="mb-2"><label>Stock</label><input type="number" name="stock" class="form-control" required></div>
<div class="mb-2"><label>Date Publication</label><input type="date" name="date_publication" class="form-control"></div>
<div class="mb-2">
    <label>Auteur - Liste déroulante</label>
    <select name="auteurs_id" class="form-control" required>
        <option value="">-- Choisir auteur --</option>
        @foreach($auteurs as $auteur)
        <option value="{{ $auteur->id }}">{{ $auteur->nom }} {{ $auteur->prenom }}</option>
        @endforeach
    </select>
</div>
<div class="mb-2"><label>Disponible</label>
<select name="disponible" class="form-control"><option value="1">Oui</option><option value="0">Non</option></select>
</div>
<button class="btn btn-success">Enregistrer</button>
</form>
@endsection