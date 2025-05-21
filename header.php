<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Vérifier si le panier existe déjà dans la session, sinon l'initialiser
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}
if (!isset($_SESSION['collection'])) {
    $_SESSION['collection'] = [];
}
$nbFigurinesCollection = count($_SESSION['collection']);
$nbArticlesPanier = count($_SESSION['panier']);

// Compter le nombre d'articles dans le panier
$nbArticlesPanier = count($_SESSION['panier']);
?>


<!-- Header stylé avec logo et sticky -->
<style>
    .navbar {
        position: sticky;
        top: 0;
        z-index: 1000;
    }
    .navbar-brand img {
        height: 40px;
        margin-right: 10px;
    }
    .nav-link {
    position: relative;
    transition: color 0.3s ease, transform 0.3s ease;
}
.badge-collection {
    position: absolute;
    top: 5px;
    right: -10px;
    background: red;
    color: white;
    font-size: 12px;
    padding: 2px 6px;
    border-radius: 50%;
}
.position-relative {
    position: relative;
}

.nav-link::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: -4px;
    width: 0%;
    height: 2px;
    background-color: #fff;
    transition: width 0.3s ease;
}

.nav-link:hover {
    color: #d4fcdc !important; /* vert très clair ou change selon ton thème */
    transform: translateY(-2px);
}

.nav-link:hover::after {
    width: 100%;
}

</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-success px-4 py-3 shadow">
    <a class="navbar-brand font-weight-bold d-flex align-items-center" href="index10.php">
        <img src="logo.png" alt="GreenQuest Logo">  GreenQuest
    </a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <!-- Menu principal -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="index10.php">Accueil</a></li>
            <li class="nav-item position-relative">
    <a class="nav-link" href="collection.php">
        Ma collection
        <?php if ($nbFigurinesCollection > 0): ?>
            <span class="badge-collection"><?= $nbFigurinesCollection ?></span>
        <?php endif; ?>
    </a>
</li>

            <li class="nav-item"><a class="nav-link" href="article.php">Articles</a></li>
            <li class="nav-item"><a class="nav-link" href="boutique.php">Boutique</a></li>
        </ul>

        <!-- Partie droite : Connexion ou profil -->
        <ul class="navbar-nav">
            <?php if (isset($_SESSION['user'])): ?>
                <li class="nav-item text-white nav-link">Bienvenue, <?= htmlspecialchars($user['pseudo']) ?></li>
                <li class="nav-item"><a class="nav-link" href="membre.php">Mon espace</a></li>
                <li class="nav-item"><a class="nav-link text-danger" href="deconnexion.php">Déconnexion</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="connexion.php">Connexion / Inscription</a></li>
            <?php endif; ?>
            
            <!-- Panier -->
            <li class="nav-item">
                <a href="panier.php" class="nav-link text-white">
                    <i class="fas fa-shopping-cart"></i> 
                    <span class="badge badge-light"><?= $nbArticlesPanier ?></span>
                </a>
            </li>
        </ul>
    </div>
</nav>

