<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Tableau de bord</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }
        .dashboard-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            margin-bottom: 1.5rem;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
        .card-icon {
            font-size: 3rem;
            color: #667eea;
        }
        .user-info-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="dashboard-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="mb-0"><i class="bi bi-speedometer2"></i> Tableau de bord</h1>
                    <p class="mb-0 mt-2">Bienvenue, {{ $user->prenom }} {{ $user->nom }}</p>
                </div>
                <div class="col-md-4 text-end">
                    <form action="{{ route('client.logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-light">
                            <i class="bi bi-box-arrow-right"></i> Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Messages de session -->
    @if (session()->has('success'))
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill"></i> {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="container">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-circle-fill"></i> {{ session()->get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <!-- Contenu principal -->
    <div class="container">
        <div class="row">
            <!-- Informations utilisateur -->
            <div class="col-md-4 mb-4">
                <div class="user-info-card">
                    <h3 class="mb-4"><i class="bi bi-person-circle"></i> Mon profil</h3>
                    <div class="mb-3">
                        <strong>Nom complet:</strong>
                        <p class="text-muted mb-0">{{ $user->nom }} {{ $user->prenom }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong>
                        <p class="text-muted mb-0">{{ $user->email }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Rôle:</strong>
                        <p class="mb-0">
                            @if($user->role)
                                <span class="badge bg-primary">{{ $user->role->libelle }}</span>
                            @else
                                <span class="badge bg-secondary">Non défini</span>
                            @endif
                        </p>
                    </div>
                    <div class="mb-3">
                        <strong>Membre depuis:</strong>
                        <p class="text-muted mb-0">{{ $user->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>

            <!-- Statistiques rapides -->
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card dashboard-card">
                            <div class="card-body text-center">
                                <i class="bi bi-cart-check card-icon"></i>
                                <h5 class="card-title mt-3">Mes commandes</h5>
                                <h2 class="text-primary">0</h2>
                                <p class="text-muted">Total des commandes</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card dashboard-card">
                            <div class="card-body text-center">
                                <i class="bi bi-heart card-icon"></i>
                                <h5 class="card-title mt-3">Favoris</h5>
                                <h2 class="text-primary">0</h2>
                                <p class="text-muted">Produits favoris</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card dashboard-card">
                            <div class="card-body text-center">
                                <i class="bi bi-box-seam card-icon"></i>
                                <h5 class="card-title mt-3">Panier</h5>
                                <h2 class="text-primary">0</h2>
                                <p class="text-muted">Articles en panier</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card dashboard-card">
                            <div class="card-body text-center">
                                <i class="bi bi-star card-icon"></i>
                                <h5 class="card-title mt-3">Avis</h5>
                                <h2 class="text-primary">0</h2>
                                <p class="text-muted">Avis laissés</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions rapides -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-lightning-charge"></i> Actions rapides</h5>
                        <div class="d-flex flex-wrap gap-3 mt-3">
                            <a href="{{ route('front.shop') }}" class="btn btn-primary">
                                <i class="bi bi-shop"></i> Voir les produits
                            </a>
                            <a href="{{ route('front.cart') }}" class="btn btn-success">
                                <i class="bi bi-cart"></i> Mon panier
                            </a>
                            <a href="{{ route('front.index') }}" class="btn btn-info">
                                <i class="bi bi-house"></i> Retour à l'accueil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

