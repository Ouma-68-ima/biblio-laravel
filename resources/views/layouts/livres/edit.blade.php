@extends('layouts.app')

@section('title', 'Modifier un livre')

@section('content')
<h2>Modifier Livre: {{ $livre->titre }}</h2>

<form action="{{ route('livres.update', $livre->id) }}" method="POST">
@csrf
@method('PUT')

<div class="mb-2">
<label>Titre *</label>
<input type="text" name="titre" value="{{ old('titre', $livre->titre) }}" class="form-control" required>
</div>

<div class="mb-2">
<label>ISBN *</label>
<input type="text" name="isbn" value="{{ old('isbn', $livre->isbn) }}" class="form-control" required>
</div>

<div class="mb-2">
<label>Prix *</label>
<input type="number" step="0.01" name="prix" value="{{ old('prix', $livre->prix) }}" class="form-control" required>
</div>

<div class="mb-2">
<label>Stock *</label>
<input type="number" name="stock" value="{{ old('stock', $livre->stock) }}" class="form-control" required>
</div>

<div class="mb-2">
<label>Date Publication</label>
<input type="date" name="date_publication" value="{{ old('date_publication', $livre->date_publication) }}" class="form-control">
</div>

<div class="mb-2">
<label>Auteur *</label>
<select name="auteurs_id" class="form-control" required>
    @foreach($auteurs as $auteur)
    <option value="{{ $auteur->id }}" {{ $livre->auteurs_id == $auteur->id ? 'selected' : '' }}>
        {{ $auteur->nom }} {{ $auteur->prenom }}
    </option>
    @endforeach
</select>
</div>

<div class="mb-2">
<label>Disponible</label>
<select name="disponible" class="form-control">
    <option value="1" {{ $livre->disponible == 1 ? 'selected' : '' }}>Oui</option>
    <option value="0" {{ $livre->disponible == 0 ? 'selected' : '' }}>Non</option>
</select>
</div>

<button class="btn btn-warning">Modifier</button>
<a href="{{ route('livres.index') }}" class="btn btn-secondary">Retour</a>
</form>

@if($errors->any())
<div class="alert alert-danger mt-3">
@foreach($errors->all() as $error)
{{ $error }}<br>
@endforeach
</div>
@endif

</div>
@endsection