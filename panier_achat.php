<?php
session_start();

// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=panier;charset=utf8', 'root', '');

// Récupération des produits
$stmt = $pdo->query("SELECT * FROM products");
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Initialiser le panier si pas encore fait
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Si formulaire soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['produit_id'];
    $quantite = $_POST['quantite'];

    // Ajouter au panier (ou mettre à jour la quantité)
    if (isset($_SESSION['panier'][$id])) {
        $_SESSION['panier'][$id] += $quantite;
    } else {
        $_SESSION['panier'][$id] = $quantite;
    }

    // Redirection vers la page du panier
    header('Location: panier_achat.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Figurines - GreenQuest</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f2f2f2;
            padding: 30px;
            margin: 0;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #e8f5e9;
            padding: 15px 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .logo-titre {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-titre img {
            height: 50px;
            width: auto;
        }

        .logo-titre h1 {
            margin: 0;
            font-size: 24px;
            color: #2e7d32;
        }

        .nav-buttons a {
            text-decoration: none;
            background-color: #388e3c;
            color: white;
            padding: 10px 15px;
            border-radius: 6px;
            margin-left: 10px;
            font-size: 14px;
        }
        button, .nav-buttons a {
    transition: background-color 0.3s, transform 0.2s;
}

button:hover, .nav-buttons a:hover {
    transform: scale(1.05);
}
.container {
    animation: apparition 1s ease-out;
}

@keyframes apparition {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

        .nav-buttons a:hover {
            background-color: #2e7d32;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

      /*  .produit-box {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            padding: 15px;
            width: 220px;
            text-align: center;
        }*/

        .produit-box img {
            width: 100%;
            border-radius: 8px;
        }

        .produit-box {
    background: rgba(255, 255, 255, 0.8); /* transparence légère */
    border-radius: 20px; /* plus doux */
    box-shadow: 0 8px 20px rgba(0,0,0,0.2); /* ombre plus marquée */
    padding: 20px;
    width: 240px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    backdrop-filter: blur(5px); /* effet "glass" léger */
}


.produit-box:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 30px rgba(0, 0, 0, 0.15);
}

.produit-box img {
    width: 100%;
    border-radius: 8px;
    transition: transform 0.3s ease;
}

.produit-box img:hover {
    transform: scale(1.1);
}


        .produit-box h3 {
            margin: 10px 0;
        }

        .produit-box form {
            margin-top: 10px;
        }

        input[type="number"] {
            width: 60px;
            padding: 5px;
            margin-bottom: 10px;
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
    </style>
</head>
<body>

<header>
    <div class="logo-titre">
        <img src="logo.png" alt="Logo GreenQuest"> <!-- remplace par le vrai nom -->
        <h1>🌿 Nos figurines</h1>
    </div>
    <div class="nav-buttons">
        <a href="index10.php">Accueil</a>
        <a href="panier.php">Voir le panier</a>
    </div>
    <button onclick="ouvrirQuiz()">🧩 Quel personnage es-tu ?</button>

</header>

<div class="container">
    <?php foreach ($produits as $produit): ?>
        <div class="produit-box">
            <img src="<?= htmlspecialchars($produit['img']) ?>" alt="<?= htmlspecialchars($produit['name']) ?>">
            <h3><?= htmlspecialchars($produit['name']) ?></h3>
            <p><strong><?= htmlspecialchars($produit['price']) ?> €</strong></p>
            <form method="post">
                <input type="hidden" name="produit_id" value="<?= $produit['id'] ?>">
                <label>Quantité : </label>
                <input type="number" name="quantite" value="1" min="1">
                <br>
                <button type="submit">Ajouter au panier</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>
<div id="quizModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); justify-content:center; align-items:center; z-index:9999;">
    <div style="background:white; padding:20px; border-radius:10px; max-width:500px; width:90%; position:relative;">
        <span onclick="fermerQuiz()" style="position:absolute; top:10px; right:15px; cursor:pointer;">&times;</span>
        <div id="quizContent">
            <!-- Le quiz s'affichera ici -->
        </div>
    </div>
</div>
<script>
const quizData = [
    {
        question: "Tu préfères :",
        options: [
            { text: "Explorer la forêt 🌲", value: "hibou" },
            { text: "Courir dans la savane 🦁", value: "lion" },
            { text: "Sauter partout sans raison 🦖", value: "dino" },
        ]
    },
    {
        question: "Ton pouvoir magique serait :",
        options: [
            { text: "Voler la nuit 🌙", value: "hibou" },
            { text: "Rugir très fort 🗣️", value: "lion" },
            { text: "Bondir à 10 mètres ! 💥", value: "dino" },
        ]
    },
    {
        question: "Tu es plutôt :",
        options: [
            { text: "Observateur et calme 🧠", value: "hibou" },
            { text: "Leader et protecteur 🛡️", value: "lion" },
            { text: "Énergique et drôle 🤪", value: "dino" },
        ]
    }
];

let currentQuestion = 0;
let scores = { hibou: 0, lion: 0, dino: 0 };

function ouvrirQuiz() {
    document.getElementById('quizModal').style.display = 'flex';
    currentQuestion = 0;
    scores = { hibou: 0, lion: 0, dino: 0 };
    afficherQuestion();
}

function fermerQuiz() {
    document.getElementById('quizModal').style.display = 'none';
}

function afficherQuestion() {
    const q = quizData[currentQuestion];
    let html = `<h3>${q.question}</h3>`;
    q.options.forEach(opt => {
        html += `<button onclick="choisirOption('${opt.value}')">${opt.text}</button><br><br>`;
    });
    document.getElementById('quizContent').innerHTML = html;
}

function choisirOption(valeur) {
    scores[valeur]++;
    currentQuestion++;
    if (currentQuestion < quizData.length) {
        afficherQuestion();
    } else {
        afficherResultat();
    }
}

function afficherResultat() {
    let max = 0;
    let personnage = "";
    for (let key in scores) {
        if (scores[key] > max) {
            max = scores[key];
            personnage = key;
        }
    }

    let texte = {
        hibou: "Tu es comme le Hibou ! Sagesse et calme sont tes alliés. 🦉",
        lion: "Tu es comme le Lion ! Fier, courageux, un vrai leader. 🦁",
        dino: "Tu es comme le Dino ! Drôle, fougueux et attachant. 🦖"
    };

    document.getElementById('quizContent').innerHTML = `
        <h2>Résultat 🧠</h2>
        <p>${texte[personnage]}</p>
        <img src="profile.gif" style="width:200px;"><br><br>
        <button onclick="fermerQuiz()">Fermer</button>
    `;
}
</script>

</body>
</html>
