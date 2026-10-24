@extends('layouts.app')

@section('title', $auteur->nom . ' ' . $auteur->prenom)

@section('content')
<h2>{{ $auteur->nom }} {{ $auteur->prenom }}</h2>
<p><b>Email:</b> {{ $auteur->email }}</p>
<p><b>Nationalité:</b> {{ $auteur->nationalite }}</p>
<p><b>Date Naissance:</b> {{ $auteur->date_naissance ?? 'Non défini' }}</p>

<h4 class="mt-4">Ses Livres ({{ $auteur->livres->count() }})</h4>
<ul class="list-group">
@forelse($auteur->livres as $livre)
<li class="list-group-item">{{ $livre->titre }} - {{ $livre->prix }} DH - Stock: {{ $livre->stock }}</li>
@empty
<li class="list-group-item">Aucun livre pour cet auteur</li>
@endforelse
</ul>

<a href="{{ route('auteurs.index') }}" class="btn btn-secondary mt-3">Retour</a>
@endsection