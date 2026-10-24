@extends('layouts.app')

@section('title', 'Connexion - Gestion de bibliothèque')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h1 class="h2 mb-4">Connexion</h1>

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse e-mail</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control" required autofocus autocomplete="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input id="password" name="password" type="password" class="form-control" required autocomplete="current-password">
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
                <a href="{{ route('register') }}" class="btn btn-link">Créer un compte</a>
            </form>
        </div>
    </div>
@endsection