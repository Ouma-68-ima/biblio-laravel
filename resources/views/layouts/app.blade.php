<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title', 'Gestion de bibliothèque')</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
	<header class="bg-dark py-3">
		<nav class="container d-flex justify-content-between align-items-center">
			<a href="{{ url('/') }}" class="text-white text-decoration-none fw-bold">Gestion de bibliothèque</a>
			<div class="d-flex align-items-center gap-3">
				@auth
					<span class="text-white">{{ auth()->user()->name }}</span>
					<form method="POST" action="{{ route('logout') }}">
						@csrf
						<button type="submit" class="btn btn-outline-light btn-sm">Déconnexion</button>
					</form>
				@else
					<a href="{{ route('login') }}" class="text-white text-decoration-none">Connexion</a>
					<a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">Créer un compte</a>
				@endauth
			</div>
		</nav>
	</header>

	<main class="container py-5">
		@hasSection('content')
			@yield('content')
		@else
			<div class="text-center mb-5">
				<h1 class="display-5 fw-bold">Gestion de bibliothèque</h1>
				<p class="lead text-muted">Choisissez la section à consulter</p>
			</div>

			<div class="row justify-content-center g-4">
				<div class="col-md-5">
					<div class="card h-100 shadow-sm">
						<div class="card-body text-center p-4">
							<h2 class="h4">Livres</h2>
							<p class="text-muted">Consulter et gérer les livres.</p>
							<a href="{{ route('livres.index') }}" class="btn btn-primary">Voir les livres</a>
						</div>
					</div>
				</div>

				<div class="col-md-5">
					<div class="card h-100 shadow-sm">
						<div class="card-body text-center p-4">
							<h2 class="h4">Auteurs</h2>
							<p class="text-muted">Consulter et gérer les auteurs.</p>
							<a href="{{ route('auteurs.index') }}" class="btn btn-success">Voir les auteurs</a>
						</div>
					</div>
				</div>
			</div>
		@endif
	</main>

	<footer class="border-top py-3 mt-auto">
		<div class="container text-center text-muted">Gestion de bibliothèque</div>
	</footer>
</body>
</html>
