<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user'])) {
    header('Location: index10.php');
    exit();
}

$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute([$_SESSION['user']]);
$user = $req->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0) {
        $allowed_exts = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $file_info = pathinfo($_FILES['avatar']['name']);
        $ext = strtolower($file_info['extension']);

        if (in_array($ext, $allowed_exts)) {
            if ($_FILES['avatar']['size'] <= 2 * 1024 * 1024) { // max 2MB
                $new_filename = uniqid() . '.' . $ext;
                $upload_path = 'uploads/' . $new_filename;

                if (move_uploaded_file($_FILES['avatar']['tmp_name'], $upload_path)) {
                    // Supprimer l'ancien avatar s'il existe
                    if (!empty($user['avatar']) && file_exists('uploads/' . $user['avatar'])) {
                        unlink('uploads/' . $user['avatar']);
                    }

                    // Mettre à jour dans la BDD
                    $update = $bdd->prepare('UPDATE utilisateurs SET avatar = ? WHERE id = ?');
                    $update->execute([$new_filename, $user['id']]);

                    header('Location: membre.php?upload=success');
                    exit();
                } else {
                    $error = "Erreur lors de l'envoi du fichier.";
                }
            } else {
                $error = "Le fichier est trop lourd (max 2 Mo).";
            }
        } else {
            $error = "Extension non autorisée (jpg, png, gif, webp).";
        }
    } else {
        $error = "Aucun fichier sélectionné.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Changer mon avatar - GreenQuest</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #e8f5e9; }
        .container { max-width: 600px; margin-top: 50px; background: #fff; padding: 30px; border-radius: 15px; box-shadow: 0 0 20px rgba(0,0,0,0.1); }
        .btn-green { background-color: #2e7d32; color: white; }
        .btn-green:hover { background-color: #1b5e20; }
    </style>
</head>
<body>

<div class="container text-center">
    <h2>Changer mon avatar 🌱</h2>
    
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger mt-3"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data" class="mt-4">
        <div class="form-group">
            <label for="avatar">Choisir une image (jpg, png, gif, webp | max 2 Mo) :</label>
            <input type="file" name="avatar" class="form-control-file" required>
        </div>
        <button type="submit" class="btn btn-green mt-3">Changer mon avatar</button>
    </form>

    <a href="membre.php" class="btn btn-link mt-4">← Retour à mon espace</a>
</div>

</body>
</html>
