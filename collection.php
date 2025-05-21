<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header('Location: connexion.php');
    exit();
}

// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=collect;charset=utf8', 'root', '');

// Récupérer les figurines disponibles
$stmt = $pdo->query("SELECT * FROM collection");
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Initialiser la collection si ce n'est pas encore fait
if (!isset($_SESSION['collection'])) {
    $_SESSION['collection'] = [];
}

// Ajouter une figurine à la collection
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'supprimer') {
        $id = $_POST['produit_id'];
        if (($key = array_search($id, $_SESSION['collection'])) !== false) {
            unset($_SESSION['collection'][$key]);
            $_SESSION['collection'] = array_values($_SESSION['collection']);
        }
    } else {
        $id = $_POST['produit_id'];
        if (!in_array($id, $_SESSION['collection'])) {
            $_SESSION['collection'][] = $id;
        }
    }
}

// Récupérer les figurines de la collection
$collection = [];
if (!empty($_SESSION['collection'])) {
    $collection_ids = implode(',', $_SESSION['collection']);
    $stmt = $pdo->query("SELECT * FROM collection WHERE id IN ($collection_ids)");
    $collection = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ma Collection - GreenQuest</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f2f2f2;
            padding: 30px;
        }
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 40px;
            justify-items: center;
        }
        .produit-box, .carte-collection {
            animation: appear 0.8s ease forwards;
        }
        .produit-box {
            background: linear-gradient(145deg, #ffffff, #e6e6e6);
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            padding: 20px;
            text-align: center;
            transition: all 0.4s ease;
        }
        .produit-box:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
        }
        .produit-box img {
            width: 100%;
            border-radius: 8px;
        }
        .carte-collection {
            background: linear-gradient(135deg, #e3ffe7 0%, #d9e7ff 100%);
            border-radius: 15px;
            width: 220px;
            padding: 15px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 0 12px rgba(0, 128, 0, 0.1);
            position: relative;
            border: 2px solid #a0d468;
        }
        .carte-collection:hover {
            transform: scale(1.05) rotate(-1deg);
            box-shadow: 0 10px 20px rgba(76, 175, 80, 0.4);
        }
        .carte-collection img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .carte-collection h3 {
            font-size: 1.1em;
            margin: 10px 0 5px;
        }
        .carte-collection p {
            color: #388e3c;
            font-weight: bold;
        }
        .header-collection {
            background: linear-gradient(135deg, #a8e6cf, #dcedc1);
            padding: 50px 20px;
            text-align: center;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
            animation: fadeIn 1.5s ease;
        }
        @keyframes appear {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes popIn {
            0% { transform: scale(0.5); opacity: 0; }
            80% { transform: scale(1.1); opacity: 1; }
            100% { transform: scale(1); }
        }
        .header-collection h1 {
            font-size: 42px;
            margin-bottom: 10px;
            color: #2e7d32;
            animation: popIn 0.8s ease forwards;
        }
        .header-collection p {
            font-size: 20px;
            color: #4caf50;
        }
        .bouton-retour {
            display: inline-block;
            background: linear-gradient(135deg, #66bb6a, #43a047);
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s ease, transform 0.3s ease;
            margin-bottom: 20px;
        }
        .bouton-retour:hover {
            background: linear-gradient(135deg, #81c784, #388e3c);
            transform: scale(1.05);
        }
        button {
            background-color: #388e3c;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #2e7d32;
        }
        .progression-container {
            background: #c8e6c9;
            border-radius: 20px;
            height: 20px;
            width: 100%;
            max-width: 500px;
            margin: 20px 0;
            overflow: hidden;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.2);
        }
        .progression-bar {
            height: 100%;
            background: linear-gradient(90deg, #66bb6a, #43a047);
            border-radius: 20px 0 0 20px;
            transition: width 0.5s ease;
        }
    </style>
</head>
<body>
<header class="header-collection">
    <h1>🌿 Bienvenue dans ta Collection GreenQuest !</h1>
    <p>Découvre les créatures que tu as collectées au fil de tes aventures.</p>
</header>

<h1>Ma Collection de Figurines</h1>
<a href="index10.php" class="bouton-retour">🛍️ Retour à la boutique</a>

<?php
$total_figurines = count($produits);
$figurines_collectees = count($collection);
$progression = ($total_figurines > 0) ? round(($figurines_collectees / $total_figurines) * 100) : 0;
?>

<p><strong>Tu as <?= count($collection) ?> figurine(s) dans ta collection.</strong></p>
<div class="progression-container">
    <div class="progression-bar" style="width: <?= $progression ?>%;"></div>
</div>
<p><?= $progression ?>% de ta collection complétée !</p>

<div class="container">
    <?php foreach ($produits as $produit): ?>
        <div class="produit-box">
            <img src="<?= htmlspecialchars($produit['img']) ?>" alt="<?= htmlspecialchars($produit['name']) ?>">
            <h3><?= htmlspecialchars($produit['name']) ?></h3>
            <p><strong><?= htmlspecialchars($produit['price']) ?> €</strong></p>
            <form method="post">
                <input type="hidden" name="produit_id" value="<?= $produit['id'] ?>">
                <button type="submit">Ajouter à ma collection</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>

<h2 style="margin-top: 60px;">🃏 Figurines dans ma collection :</h2>
<div class="container">
    <?php if (count($collection) > 0): ?>
        <?php foreach ($collection as $fig): ?>
            <div class="carte-collection">
                <div class="carte-inner">
                    <img src="<?= htmlspecialchars($fig['img']) ?>" alt="<?= htmlspecialchars($fig['name']) ?>">
                    <h3><?= htmlspecialchars($fig['name']) ?></h3>
                    <p><strong><?= htmlspecialchars($fig['price']) ?> €</strong></p>
                    <form method="post" style="margin-top: 10px;">
                        <input type="hidden" name="produit_id" value="<?= $fig['id'] ?>">
                        <input type="hidden" name="action" value="supprimer">
                        <button type="submit" style="background-color: #e53935;">🗑️ Supprimer</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Votre collection est vide.</p>
    <?php endif; ?>
</div>

</body>
</html>
