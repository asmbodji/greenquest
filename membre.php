<?php
session_start();
require_once 'config.php';

$user = null;
if (isset($_SESSION['user'])) {
    $req = $pdo->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute([$_SESSION['user']]);
    $data = $req->fetch();
    if ($data) {
        $user = $data;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon espace - GreenQuest</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap + Font + Icon -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5b1d85b886.js" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('green.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            margin: 0;
        }

        .container-box {
            background: linear-gradient(135deg, #ffffff, #f1f8e9);
            border-radius: 30px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            padding: 50px;
            max-width: 750px;
            margin: 80px auto;
            animation: fadeInSlide 1s ease forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        h2 {
            font-weight: bold;
            color: #2e7d32;
        }

        @keyframes fadeInSlide {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-green, .btn-outline {
            font-size: 16px;
            padding: 12px 25px;
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .btn-green {
            background-color: #2e7d32;
            color: white;
            border-radius: 10px;
            padding: 10px 20px;
        }

        .btn-green:hover {
            background-color: #1b5e20;
            transform: scale(1.05);
        }

        .btn-outline {
            border: 2px solid #2e7d32;
            color: #2e7d32;
            border-radius: 10px;
        }

        .btn-outline:hover {
            background-color: #2e7d32;
            color: white;
            transform: scale(1.05);
        }

        .avatar-anim {
            width: 110px;
            height: 110px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #81c784;
            background: radial-gradient(circle, #c8e6c9 0%, transparent 70%);
            box-shadow: 0 10px 20px rgba(0, 128, 0, 0.3);
            transition: transform 0.6s ease;
        }

        .avatar-anim:hover {
            transform: scale(1.1) rotate(3deg);
            box-shadow: 0 10px 20px rgba(0, 128, 0, 0.3);
        }

        .logo-small {
            width: 50px;
            margin-bottom: 15px;
        }
    </style>

    <?php
    $messagesMascotte = [
        "🌱 Astuce : Pense à arroser tes plantes avec de l'eau de cuisson refroidie !",
        "🦁 Courage ! Même les petits pas font de grands voyages écologiques.",
        "🍀 Blague : Que dit une plante quand elle a soif ? J’ai la tige sèche ! 😄",
        "🌿 Écolo-tip : Privilégie les produits locaux pour réduire ton empreinte carbone.",
        "💧 N’oublie pas de fermer le robinet pendant que tu te brosses les dents !"
    ];
    $mascotteMessage = $messagesMascotte[array_rand($messagesMascotte)];
    ?>
</head>

<body>
<?php include 'header.php'; ?>

<div class="container-box text-center">
    <img src="logo.png" alt="GreenQuest Logo" class="logo-small">

    <?php if (!empty($user)): ?>
        <?php if (!empty($user['avatar'])): ?>
            <div class="mb-3">
                <img src="uploads/<?= htmlspecialchars($user['avatar']) ?>" alt="Avatar" class="avatar-anim">
            </div>
        <?php endif; ?>

        <h2>Bienvenue, <?= htmlspecialchars($user['pseudo']) ?> 🌱</h2>
        <p class="mb-4">Ravi de te revoir dans ton espace personnel !</p>

        <div class="d-flex justify-content-center flex-wrap gap-2">
            <a href="landing.php" class="btn btn-outline m-2"><i class="fas fa-key"></i> Modifier mon mot de passe</a>
            <a href="changer_avatar.php" class="btn btn-outline m-2"><i class="fas fa-user-circle"></i> Changer mon avatar</a>
            <a href="collection.php" class="btn btn-green m-2"><i class="fas fa-leaf"></i> Voir ma collection</a>
            <a href="deconnexion.php" class="btn btn-danger m-2"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
        </div>
    <?php else: ?>
        <h2>Bienvenue 🌱</h2>
        <p class="mb-4">Connecte-toi pour accéder à ton espace personnel.</p>
        <a href="connexion.php" class="btn btn-green">Connexion</a>
    <?php endif; ?>
</div>

<div id="mascotte" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;">
    <img src="lion.png" alt="Mascotte" style="width: 80px;">
    <div id="bulle" style="
        background: white;
        border-radius: 15px;
        padding: 10px 15px;
        margin-top: 5px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        max-width: 250px;
        font-size: 14px;
        color: #2e7d32;
    ">
        <?= $mascotteMessage ?>
    </div>
</div>

<script>
    window.onload = function () {
        const mascotte = document.getElementById('mascotte');
        mascotte.style.opacity = 0;
        mascotte.style.transition = 'opacity 1.5s ease-in-out';
        setTimeout(() => {
            mascotte.style.opacity = 1;
        }, 1000);
    }
</script>

</body>
</html>
