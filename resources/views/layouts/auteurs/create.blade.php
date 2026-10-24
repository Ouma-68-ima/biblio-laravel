@extends('layouts.app')

@section('title', 'Ajouter un auteur')

@section('content')
<h2>Ajouter un Auteur</h2>

<form action="{{ route('auteurs.store') }}" method="POST">
@csrf
<div class="mb-2"><label>Nom *</label><input type="text" name="nom" class="form-control" required></div>
<div class="mb-2"><label>Prénom *</label><input type="text" name="prenom" class="form-control" required></div>
<div class="mb-2"><label>Email *</label><input type="email" name="email" class="form-control" required></div>
<div class="mb-2"><label>Nationalité</label><input type="text" name="nationalite" class="form-control"></div>
<div class="mb-2"><label>Date Naissance (nullable)</label><input type="date" name="date_naissance" class="form-control"></div>
<button class="btn btn-success">Enregistrer</button>
<a href="{{ route('auteurs.index') }}" class="btn btn-secondary">Retour</a>
</form>

@if($errors->any())
<div class="alert alert-danger mt-3">
    @foreach($errors->all() as $error){{ $error }}<br>@endforeach
</div>
@endif
@endsection