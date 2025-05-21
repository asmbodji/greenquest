<?php
// minijeux.php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mini-jeux | GreenQuest</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Ton fichier CSS principal -->
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f0fff0;
            color: #2c3e50;
        }

        .hero {
            background: linear-gradient(145deg, #b9fbc0, #a3f7bf);
            text-align: center;
            padding: 100px 20px 60px;
            border-radius: 0 0 50px 50px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .hero h1 {
            font-size: 3em;
            color: #2b9348;
        }

        .hero p {
            font-size: 1.3em;
            max-width: 600px;
            margin: auto;
        }

        .minigames-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            padding: 60px 10%;
        }

        .minigame-card {
            background: #fff;
            border-radius: 20px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }

        .minigame-card:hover {
            transform: scale(1.05);
        }

        .minigame-card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-radius: 15px;
        }

        .minigame-card h3 {
            color: #2b9348;
            margin-top: 15px;
        }

        .minigame-card p {
            font-size: 0.95em;
            color: #555;
        }
        .minijeux-hero {
  position: relative;
  height: 90vh;
  background: url('green.jpg') center center / cover no-repeat fixed;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}

.minijeux-overlay {
  background-color: rgba(0, 100, 0, 0.6);
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.minijeux-content {
  text-align: center;
  color: #fff;
  animation: fadeInUp 2s ease-out;
}

.minijeux-content h1 {
  font-size: 3rem;
  margin-bottom: 10px;
  font-family: 'Segoe UI', sans-serif;
}

.minijeux-content p {
  font-size: 1.2rem;
  font-weight: 300;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(40px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

        .btn-green {
            background: #2b9348;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 30px;
            margin-top: 15px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn-green:hover {
            background: #238e3b;
        }

        footer {
            text-align: center;
            padding: 40px 20px;
            background: #2b9348;
            color: white;
            margin-top: 60px;
        }
    </style>
</head>
<body>
<section class="minijeux-hero">
  <div class="minijeux-overlay">
    <div class="minijeux-content">
      <h1>Plonge dans l’univers des mini-jeux</h1>
      <p>Explore, joue et apprends en sauvant la planète !</p>
    </div>
  </div>
</section>

    <section class="hero animate__animated animate__fadeInDown">
        <h1>Découvre les Mini-Jeux de GreenQuest</h1>
        <p>Chaque jeu t'apprend à protéger la planète tout en t'amusant. Relève les défis, sauve la nature !</p>
    </section>

    <section class="minigames-section">
        <div class="minigame-card animate__animated animate__fadeInUp">
            <img src="quest.png" alt="Forêt magique">
            <h3>Forêt Magique</h3>
            <p>Replante les arbres, sauve les animaux et restaure l'équilibre de la forêt.</p>
            <button class="btn-green">Jouer</button>
        </div>

        <div class="minigame-card animate__animated animate__fadeInUp" style="animation-delay: .2s;">
            <img src="clean.png" alt="Purification du lac">
            <h3>Purification du Lac</h3>
            <p>Nettoie le lac des déchets pour redonner vie à la faune aquatique.</p>
            <button class="btn-green">Jouer</button>
        </div>

        <div class="minigame-card animate__animated animate__fadeInUp" style="animation-delay: .4s;">
            <img src="tri.png" alt="Tri sélectif">
            <h3>Tri Sélectif</h3>
            <p>Teste ta rapidité à trier les déchets dans les bons bacs de recyclage.</p>
            <button class="btn-green">Jouer</button>
        </div>
    </section>

    <footer>
        &copy; 2025 GreenQuest - Ensemble pour un monde plus vert 🌍
    </footer>

</body>
</html>
