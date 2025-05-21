<?php 
session_start();
require_once 'config.php'; 
if(!isset($_SESSION['user'])){
    header('Location:index.php');
    die();
}
$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();
?>
<!doctype html>
<html lang="fr">
<head>
  <title>GreenQuest - Espace membre</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<style>
body {
    font-family: 'Poppins', sans-serif;
    background: url('green.jpg') no-repeat center center fixed;
    background-size: cover;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.card-welcome {
    backdrop-filter: blur(15px);
    background: rgba(255, 255, 255, 0.25);
    border-radius: 30px;
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    padding: 50px;
    max-width: 800px;
    width: 100%;
    animation: fadeIn 1.5s ease forwards;
    transform: translateY(20px);
}

@keyframes fadeIn {
    0% { opacity: 0; transform: translateY(50px);}
    100% { opacity: 1; transform: translateY(0);}
}

.btn-custom {
    margin: 10px;
    font-size: 1.2em;
    padding: 12px 30px;
    border-radius: 40px;
    background: linear-gradient(135deg, #34d058, #28a745);
    border: none;
    color: white;
    transition: all 0.3s ease;
}

.btn-custom:hover {
    background: linear-gradient(135deg, #28a745, #34d058);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    transform: scale(1.05);
}

.logo-mascotte img {
    height: 100px;
    animation: float 4s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0);}
    50% { transform: translateY(-10px);}
}


.title {
    font-weight: 600;
    font-size: 2rem;
}

.btn-custom {
    margin: 10px;
    font-size: 1.1em;
    padding: 10px 25px;
    border-radius: 30px;
    transition: 0.3s;
}
.btn-deconnexion {
    margin: 10px;
    font-size: 1.2em;
    padding: 12px 30px;
    border-radius: 40px;
    background: linear-gradient(135deg, #e53935, #d32f2f);
    border: none;
    color: white;
    transition: all 0.3s ease;
}

.btn-deconnexion:hover {
    background: linear-gradient(135deg, #d32f2f, #c62828);
    box-shadow: 0 4px 15px rgba(229, 57, 53, 0.4);
    transform: scale(1.05);
}

.btn-custom:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
}

.description-box {
    background-color: rgba(241, 253, 244, 0.9);
    border-left: 5px solid #4caf50;
    color: #2e7d32;
    margin-top: 20px;
    padding: 20px;
    border-radius: 15px;
}
</style>

</head>
<body>

<div class="card-welcome">
    <div class="logo-mascotte">
        <img src="logo.png" alt="Logo GreenQuest">
        <img src="lion.png" alt="Mascotte GreenQuest">
    </div>
    <h1 class="title">Bienvenue sur GreenQuest, <?php echo htmlspecialchars($data['pseudo']); ?>👋</h1>
    <div class="mt-4">
        <a href="deconnexion.php" class="btn btn-danger btn-deconnexion">Déconnexion</a>
        <button type="button" class="btn btn-info btn-custom" data-toggle="modal" data-target="#change_password">
            Changer mon mot de passe
        </button>
        <a href="index10.php" class="btn btn-success btn-custom">Accueil</a>
    </div>

    <div class="description-box mt-5">
        <h4>À propos de GreenQuest</h4>
        <p>
            GreenQuest est une aventure écologique où chaque action compte. Explore des mondes colorés, relève des défis environnementaux
            et deviens un héros du développement durable. Apprends tout en t'amusant à préserver notre planète !
        </p>
    </div>
</div>

<!-- Modal pour changer mot de passe -->
<div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Changer mon mot de passe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="layouts/change_password.php" method="POST">
                    <label for="current_password">Mot de passe actuel</label>
                    <input type="password" id="current_password" name="current_password" class="form-control" required>
                    <br>
                    <label for="new_password">Nouveau mot de passe</label>
                    <input type="password" id="new_password" name="new_password" class="form-control" required>
                    <br>
                    <label for="new_password_retype">Confirmer nouveau mot de passe</label>
                    <input type="password" id="new_password_retype" name="new_password_retype" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
