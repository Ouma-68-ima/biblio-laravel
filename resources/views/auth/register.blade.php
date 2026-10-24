@extends('layouts.app')

@section('title', 'Créer un compte - Gestion de bibliothèque')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h1 class="h2 mb-4">Créer un compte</h1>

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" class="form-control" required autofocus autocomplete="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse e-mail</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control" required autocomplete="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input id="password" name="password" type="password" class="form-control" required minlength="8" autocomplete="new-password">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required minlength="8" autocomplete="new-password">
                </div>
                <button type="submit" class="btn btn-primary">Créer mon compte</button>
                <a href="{{ route('login') }}" class="btn btn-link">Déjà inscrit ?</a>
            </form>
        </div>
    </div>
@endsection