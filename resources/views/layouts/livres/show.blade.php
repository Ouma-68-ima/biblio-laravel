@extends('layouts.app')

@section('title', $livre->titre)

@section('content')
<h2>{{ $livre->titre }}</h2>
<p><b>Auteur:</b> {{ $livre->auteur->nom }} {{ $livre->auteur->prenom }}</p>
<p><b>ISBN:</b> {{ $livre->isbn }}</p>
<p><b>Prix:</b> {{ $livre->prix }}</p>
<p><b>Stock:</b> {{ $livre->stock }}</p>
<a href="{{ route('livres.index') }}" class="btn btn-secondary">Retour</a>
@endsection