<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <title>Inscription</title>
        </head>
        <body>
        <div class="login-form">
            <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe différent
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email non valide
                            </div>
                        <?php
                        break;

                        case 'email_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email trop long
                            </div>
                        <?php 
                        break;

                        case 'pseudo_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> pseudo trop long
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte deja existant
                            </div>
                        <?php 

                    }
                }
                ?>
            
            <form action="inscription_traitement.php" method="post">
                <h2 class="text-center">Inscription</h2>       
                <div class="form-group">
                    <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                </div> 
                <div class="text-center mt-3">
    <span>Déjà un compte ? </span><a href="connexion.php">Se connecter</a>
</div>
  
            </form>
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
        </body>
</html>