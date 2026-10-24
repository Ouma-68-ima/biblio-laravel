@extends('layouts.app')

@section('title', 'Auteurs')

@section('content')
<h2>Liste des Auteurs</h2>

<a href="{{ route('auteurs.create') }}" class="btn btn-success mb-3">Ajouter Auteur</a>
<a href="{{ route('livres.index') }}" class="btn btn-primary mb-3">Voir Livres</a>

<table class="table table-bordered">
<thead>
<tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Email</th>
    <th>Nationalité</th>
    <th>Date Naissance</th>
    <th>Nombre Livres</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>
@foreach($auteurs as $auteur)
<tr>
    <td>{{ $auteur->id }}</td>
    <td>{{ $auteur->nom }}</td>
    <td>{{ $auteur->prenom }}</td>
    <td>{{ $auteur->email }}</td>
    <td>{{ $auteur->nationalite }}</td>
    <td>{{ $auteur->date_naissance ?? 'Non défini' }}</td>
    <td>{{ $auteur->livres->count() ?? 0 }}</td>
    <td>
        <a href="{{ route('auteurs.show', $auteur->id) }}" class="btn btn-sm btn-info">Voir</a>
        <a href="{{ route('auteurs.edit', $auteur->id) }}" class="btn btn-sm btn-warning">Modifier</a>
        <form action="{{ route('auteurs.destroy', $auteur->id) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer auteur et ses livres?')">Supprimer</button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
</table>

{{ $auteurs->links() }}
@endsection