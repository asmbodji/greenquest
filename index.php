<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <title>Connexion</title>
        </head>
        <body>
        
        <div class="login-form">
             <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
                
            <div class="encouragement text-center mb-4">
    Tu es à <strong>1 clic</strong> de rejoindre l'aventure 🌿
</div>

            <form action="connexion.php" method="post">
                <h2 class="text-center">Connexion</h2>       
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </div>   
            </form>
            <p class="text-center"><a href="inscription.php">Inscription</a></p>
        </div>
        <!-- 🌿 Arrière-plan forêt/cartoon -->
        <div class="form-group text-center">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#worldModal">
        🌍 Découvrir le monde
    </button>
</div>

<style>
    body {
        margin: 0;
        padding: 0;
        background: url(./green.jpg) no-repeat center center fixed;
        background-size: cover;
        font-family: 'Comic Sans MS', 'Segoe UI', sans-serif;
    }

    .login-form {
        width: 360px;
        margin: 100px auto;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(5px);
        position: relative;
        z-index: 2;
    }
    .encouragement {
    font-size: 1.1rem;
    color: #2e7d32;
    background-color: rgba(200, 230, 201, 0.5);
    padding: 10px;
    border-radius: 12px;
    animation: fadeInUp 1s ease-in-out;
    font-weight: bold;
    box-shadow: 0 0 8px rgba(76, 175, 80, 0.3);
}

/* Animation douce */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

    .login-form h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #2e7d32;
        font-weight: bold;
        text-shadow: 1px 1px #c8e6c9;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #a5d6a7;
    }

    .btn-primary {
        background-color: #43a047;
        border: none;
        border-radius: 10px;
        font-weight: bold;
        transition: background 0.3s;
    }

    .btn-primary:hover {
        background-color: #2e7d32;
    }

    .text-center a {
        color: #1b5e20;
        text-decoration: none;
    }

    .text-center a:hover {
        text-decoration: underline;
    }

    /* 🌤️ Papillons animés (optionnel) */
    .papillon {
        position: absolute;
        width: 40px;
        height: 40px;
        background: url('papillon.png') no-repeat center/contain;
        animation: fly 20s linear infinite;
        z-index: 1;
        pointer-events: none;
    }

    .papillon:nth-child(1) { top: 10%; left: -40px; animation-delay: 0s; }
    .papillon:nth-child(2) { top: 50%; left: -60px; animation-delay: 6s; }

    @keyframes fly {
        0% { transform: translateX(0); }
        100% { transform: translateX(120vw); }
    }
</style>

<!-- 🦋 Papillons -->
<div class="papillon"></div>
<div class="papillon"></div>
<!-- Modal "Découvrir le monde" -->
<div class="modal fade" id="worldModal" tabindex="-1" role="dialog" aria-labelledby="worldModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #e8f5e9; border-radius: 20px;">
      <div class="modal-header">
        <h5 class="modal-title" id="worldModalLabel">Bienvenue dans notre univers ! 🌳</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <!-- Image panoramique ou animation -->
        <img src="quest.png" alt="Univers du jeu" class="img-fluid rounded shadow">
        <p class="mt-3">Explore notre monde rempli de créatures, d’énergies renouvelables et d’aventures écoresponsables 🍃</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-success" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- 🚛 Animation de chargement au moment de la connexion -->
<div id="camion-loader" class="camion-loader d-none">
    <div class="camion"></div>
</div>

<style>
.camion-loader {
    position: fixed;
    bottom: 30px;
    left: 0;
    width: 100%;
    height: 100px;
    z-index: 9999;
    pointer-events: none;
}

.camion {
    width: 160px;
    height: 80px;
    background: url('camion.png') no-repeat center/contain;
    animation: rouler 3s linear forwards;
    margin-left: -160px;
}

/* Animation : de gauche à droite */
@keyframes rouler {
    0% { transform: translateX(0); }
    100% { transform: translateX(120vw); }
}
</style>

<script>
    document.querySelector('form').addEventListener('submit', function (e) {
        // Affiche le camion loader
        document.getElementById('camion-loader').classList.remove('d-none');

        // Laisse l'effet visible pendant 2-3 secondes avant de continuer
        // En vrai cas, on laisse le formulaire se soumettre normalement
        // Ici juste pour l'effet, tu peux commenter ce bloc si inutile :
        // e.preventDefault();
        // setTimeout(() => this.submit(), 2000);
    });
</script>

        </body>
</html>