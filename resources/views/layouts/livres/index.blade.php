@extends('layouts.app')

@section('title', 'Livres')

@section('content')
<h2>Liste des livres</h2>

<a href="{{ route('livres.create') }}" class="btn btn-success mb-3">Ajouter livre</a>

<table class="table table-bordered">
<thead>
<tr>
    <th>Titre</th>
    <th>Auteur</th>
    <th>ISBN</th>
    <th>Prix</th>
    <th>Stock</th>
    <th>Disponibilité</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>
@foreach($livres as $livre)
<tr>
    <td>{{ $livre->titre }}</td>
    <td>{{ $livre->auteur->nom ?? '' }} {{ $livre->auteur->prenom ?? '' }}</td>
    <td>{{ $livre->isbn }}</td>
    <td>{{ $livre->prix }} DH</td>
    <td>{{ $livre->stock }}</td>
    <td>{{ $livre->disponible ? 'Oui' : 'Non' }}</td>
    <td>
        <a href="{{ route('livres.edit', $livre->id) }}" class="btn btn-sm btn-warning">Modifier</a>
        <form action="{{ route('livres.destroy', $livre->id) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer?')">Supprimer</button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
</table>

{{ $livres->links() }}
@endsection