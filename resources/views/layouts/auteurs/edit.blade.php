@extends('layouts.app')

@section('title', 'Modifier un auteur')

@section('content')
<h2>Modifier Auteur: {{ $auteur->nom }}</h2>

<form action="{{ route('auteurs.update', $auteur->id) }}" method="POST">
@csrf @method('PUT')
<div class="mb-2"><label>Nom</label><input type="text" name="nom" value="{{ $auteur->nom }}" class="form-control" required></div>
<div class="mb-2"><label>Prénom</label><input type="text" name="prenom" value="{{ $auteur->prenom }}" class="form-control" required></div>
<div class="mb-2"><label>Email</label><input type="email" name="email" value="{{ $auteur->email }}" class="form-control" required></div>
<div class="mb-2"><label>Nationalité</label><input type="text" name="nationalite" value="{{ $auteur->nationalite }}" class="form-control"></div>
<div class="mb-2"><label>Date Naissance</label><input type="date" name="date_naissance" value="{{ $auteur->date_naissance }}" class="form-control"></div>
<button class="btn btn-warning">Modifier</button>
<a href="{{ route('auteurs.index') }}" class="btn btn-secondary">Retour</a>
</form>
@endsection