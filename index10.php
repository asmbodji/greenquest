<!--<!DOCTYPE html>-->
<html lang="fr">
<head>
 
<?php
session_start();
require_once 'config.php';

$user = null;
if (isset($_SESSION['user'])) {
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute([$_SESSION['user']]);
    $user = $req->fetch();
}
?>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylex.css">
    <script src="https://kit.fontawesome.com/5b1d85b886.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<!-- Dans le <head> -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>GreenQuest</title>
    <link rel="icon" type="icon/jpg" href="logo.png">
</head>
<body>
    <!-- ☁️ Nuages -->
<div class="nuage nuage1"></div>
<div class="nuage nuage2"></div>

<!-- 🦋 Papillons -->
<div class="papillon pap1"></div>
<div class="papillon pap2"></div>

<!-- 🌳 Arbres animés (ex. feuilles qui bougent) -->
<div class="arbre"></div>

<?php include 'header.php'; ?>

    
    <section class="gammes" id="gammes">
        <div class="contenu">
            <!-- Boîte avec effet Flip -->
            <div class="box">
                <div class="box-face box-front">
                    <h2>Bienvenue Sur <span class="type">GreenQuest</span></h2>
                    <p>Veuillez découvrir notre collection de figurines rien que pour vous.</p>
                </div>
                <div class="box-face box-back">
                    <h2>GreenQuest est un :</h2>
                    <p>Jeu interactif dans le cadre de notre projet Rhizome, notre objectif est de s’amuser ensemble 🤝 tout en contribuant à la préservation de l’environnement 🌱🌍.</p>
                </div>
            </div>
            <!-- À mettre dans le <body> de ta page -->
<div id="mascotte" onclick="parler()">
    <img src="lion.png" alt="Mascotte" />
    <div id="bulle">Clique sur moi pour un conseil ! 🌿</div>
  </div>
  
            <!-- Boutons d'action -->
            <a href="article.php"><button class="green-btn">Les articles pour vous <i class="fa-solid fa-rectangle-vertical-history"></i></button></a>
            <a href="panier_achat.php"><button class="green-btn">Nos figurines <i class="fa-solid fa-rectangle-vertical-history"></i></button></a>
            <a href="#micro"><button class="blue-btn">Notre boutique <i class="fa-duotone fa-solid fa-shop-lock"></i></button></a>

        </div>
    </section>
    
        
    </section>
    <hr class="separator-gradient">

    <h2 class="titre-text">NOTRE <span>COLLECTIONS</span> .</h2>
                <p>
                    </p>
    <section class="nouveautes" id="nouveautes">
        <div class="raw">
            <div class="col50">
                
                
            </div>
            <div class="col50">
                <div class="img">
                    
                </div>
            </div>
        </div>
    </section>
    <section class="More" id="More">
        <div class="titre">
            <h2 class="titre-text"><span>Figur</span>ines</h2>
            <p>Plonge dans l’univers de nos figurines ! À toi de trouver ton âme-soeur en plastique... ou en hibou 🦉😉</p>
        </div>
        <div class="produits">
    <div class="produit-box">
        <span class="prix">20€</span>
        <div class="produit-image">
            <img src="./dino.png" alt="Iphone SE 2022">
        </div>
        <div class="produit-text">
            <h3>Dino</h3>
            <button class="ajouter-btn" onclick="window.location.href='panier_achat.php';">Acheter</button>
        </div>
    </div>

    <div class="produit-box">
        <span class="prix">15€</span>
        <div class="produit-image">
            <img src="./lion.png" alt="Iphone 13">
        </div>
        <div class="produit-text">
            <h3>Lion</h3>
            <button class="ajouter-btn" onclick="window.location.href='panier_achat.php';">Acheter</button>
        </div>
    </div>

    <div class="produit-box">
        <span class="prix">21€</span>
        <div class="produit-image">
            <img src="./rese.png" alt="Iphone 13">
        </div>
        <div class="produit-text">
            <h3>Recyclor</h3>
            <button class="ajouter-btn" onclick="window.location.href='panier_achat.php';">Acheter</button>
        </div>
    </div>

    <div class="produit-box">
        <span class="prix">19€</span>
        <div class="produit-image">
            <img src="./thirex.png" alt="Iphone 13">
        </div>
        <div class="produit-text">
            <h3>Thirex</h3>
            <button class="ajouter-btn" onclick="window.location.href='panier_achat.php';">Acheter</button>
        </div>
    </div>

    <div class="produit-box">
        <span class="prix">12€</span>
        <div class="produit-image">
            <img src="./hibou.png" alt="Rhino figurine">
        </div>
        <div class="produit-text">
            <h3>Hibou</h3>
            <button class="ajouter-btn" onclick="window.location.href='panier_achat.php';">Acheter</button>
        </div>
    </div>

    <div class="produit-box">
        <span class="prix">18€</span>
        <div class="produit-image">
            <img src="./fallguy.png" alt="Rhino figurine">
        </div>
        <div class="produit-text">
            <h3>Solario 😁</h3>
            <button class="ajouter-btn" onclick="window.location.href='panier_achat.php';">Acheter</button>
        </div>
    </div>
</div>

        
            <!-- Ajoute les autres cartes ici avec le même modèle -->
        </div>
        
        
        <div class="titre">
           <a href="boutique.php"> <button class="btn3"> Voir plus <i class="fa-solid fa-caret-down"></i></button></a>
        </div>
        <hr class="separator-gradient">

        <section class="articles-section" id="articles">
    <div class="articles-header">
        <h2>Articles</h2>
        <p>Lisez des articles pour en apprendre plus sur l'écologie</p>
    </div>
    <div class="articles-container">
    <div class="article-card-new">
    <span class="badge-tag">17 Avr. 2025</span>
    <div class="article-image-wrapper">
        <img src="./compos.jpg" alt="Dino">
        <div class="article-title-overlay">Mieux comprendre le compostage</div>
    </div>
    <div class="card-content">
        <p><span class="tag-conseil">Résumé :</span> Le compostage est une solution naturelle pour recycler vos déchets organiques. En transformant épluchures, restes alimentaires et déchets verts en engrais, vous réduisez vos déchets tout en nourrissant la terre. Découvrez comment composter efficacement chez vous, même sans jardin.</p>
        <a href="article.php" class="btn-voir-plus">Voir plus</a>
    </div>
</div>
        <div class="article-card-new">
    <span class="badge-tag">21 Avr. 2025</span>
    <div class="article-image-wrapper">
        <img src="./trans.jpg" alt="Dino">
        <div class="article-title-overlay">Adopter un mode de transport ecologique</div>
    </div>
    <div class="card-content">
        <p><span class="tag-resume">Résumé :</span> Optez pour des modes de transport écologiques comme le vélo, la marche ou les transports en commun afin de réduire votre empreinte carbone. Ce changement simple contribue à améliorer la qualité de l’air, limiter la pollution sonore et préserver les ressources naturelles pour les générations futures.</p>
        <a href="article.php" class="btn-voir-plus">Voir plus</a>
    </div>
</div>

        <div class="article-card-new">
    <span class="badge-tag">20 Mai. 2025</span>
    <div class="article-image-wrapper">
        <img src="./baleine.jpg" alt="Dino">
        <div class="article-title-overlay">Reduisez les dechets platiques au quotidien</div>
    </div>
    <div class="card-content">
        <p><span class="tag-objectif">Résumé :</span> Découvrez des astuces simples et efficaces pour limiter votre usage de plastique, à la maison comme à l’extérieur. Apprenez pourquoi il est crucial de réduire les déchets plastiques afin de préserver les écosystèmes marins.</p>
        <a href="article.php" class="btn-voir-plus">Voir plus</a>
    </div>
</div>

        <div class="article-card-new">
    <span class="badge-tag">Publiée le 19 Mars. 2025</span>
    <div class="article-image-wrapper">
        <img src="./foret.jpg" alt="Dino">
        <div class="article-title-overlay">Les arbres, poumons de la planete</div>
    </div>
    <div class="card-content">
        <p><span class="tag-resume">Résumé :</span> Véritables poumons de la planète, les arbres absorbent le dioxyde de carbone et produisent l’oxygène essentiel à la vie. Ils jouent un rôle clé dans la régulation du climat, la préservation de la biodiversité et la lutte contre l’érosion. Protéger les forêts, c’est protéger notre avenir.</p>
        <a href="article.php" class="btn-voir-plus">Voir plus</a>
    </div>
</div>

    </div>
</section>
<hr class="separator-gradient">

    <section class="ecosystem" id="ecosystem">
        <h2 class="titre-text">L' <span>Écosystème</span> de GreenQuest</h2>
        <div class="eco-container">
            <div class="eco-text">
                <p>
                    Dans GreenQuest, chaque figurine connectée révèle un aspect unique de notre écosystème. 
                    Les joueurs explorent des environnements vivants, résolvent des énigmes écologiques et restaurent la nature.
                    Le socle interactif capte l’identité de la figurine et déclenche des mini-jeux éducatifs.
                </p>
                <p>
                    De la régénération d’une forêt à la purification d’un lac, chaque action a un impact. Apprends, joue, et sauve la planète une énigme à la fois.
                </p>
                <a href="minijeux.php" class="decouvrir-btn">Découvrir les mini-jeux</a>

            </div>
            <div class="eco-image">
                <img src="./green.jpg" alt="Écosystème de Rhizome">
            </div>
        </div>
    </section>
    
    <section class="rhizome-section" id="rhizome-experiences">
        <div class="rhizome-header">
            <h2 class="rhizome-title"><span>Explorez </span>l'univers de GreenQuest</h2>
            <p class="rhizome-description">
                GreenQuest propose une collection de mini-jeux écologiques et immersifs, où chaque figurine active un nouveau défi pour protéger la planète.
            </p>
        </div>
    
        <div class="rhizome-grid">
            <div class="rhizome-card">
                <div class="rhizome-img">
                    <img src="./netoyer.png" alt="Nettoyer la rivière">
                </div>
                <div class="rhizome-text">
                    <h3>Nettoyer la rivière</h3>
                    <p>Éliminez les déchets et purifiez l’eau pour sauver les poissons !</p>
                </div>
            </div>
    
            <div class="rhizome-card">
                <div class="rhizome-img">
                    <img src="./planter.jpg" alt="Reboiser la forêt">
                </div>
                <div class="rhizome-text">
                    <h3>Reboiser la forêt</h3>
                    <p>Plantez des arbres avec votre figurine pour redonner vie à la nature.</p>
                </div>
            </div>
    
            <div class="rhizome-card">
                <div class="rhizome-img">
                    <img src="./sauver.jpg" alt="Sauver les abeilles">
                </div>
                <div class="rhizome-text">
                    <h3>Sauver les abeilles</h3>
                    <p>Protégez les ruches et assurez la pollinisation des plantes.</p>
                </div>
            </div>
    
            <div class="rhizome-card">
                <div class="rhizome-img">
                    <img src="./ocean.png" alt="Océan propre">
                </div>
                <div class="rhizome-text">
                    <h3>Océan propre</h3>
                    <p>Ramassez les plastiques et sauvez les animaux marins.</p>
                </div>
            </div>
        </div>
    </section>
    
    
    <section class="rhizome-access" id="jouer">
        <div class="rhizome-header black">
            <h2 class="rhizome-title">Jouer à <span>GreenQuest</span></h2>
            <p class="rhizome-description">
                Prêt à vivre l’aventure écologique ? Téléchargez le jeu ou jouez directement en ligne !
            </p>
        </div>
    
        <div class="rhizome-access-grid">
            <div class="rhizome-access-box">
                <div class="access-img">
                    <img src="./download.png" alt="Télécharger le jeu">
                </div>
                <div class="access-text">
                    <h3>Version PC / Mac</h3>
                    <p>Téléchargez la version bureau pour une expérience complète avec le socle et les figurines.</p>
                    <a href="#" class="rhizome-btn">Télécharger</a>
                </div>
            </div>
    
            <div class="rhizome-access-box">
                <div class="access-img">
                    <img src="./browser.png" alt="Jouer en ligne">
                </div>
                <div class="access-text">
                    <h3>Jouer en ligne</h3>
                    <p>Accédez à GreenQuest depuis votre navigateur, sans installation.</p>
                    <a href="#" class="rhizome-btn">Jouer maintenant</a>
                </div>
            </div>
    
            <div class="rhizome-access-box">
                <div class="access-img">
                    <img src="./appstore.png" alt="Mobile version">
                </div>
                <div class="access-text">
                    <h3>App mobile (bientôt)</h3>
                    <p>Disponible prochainement sur iOS et Android. Restez connectés !</p>
                    <a href="#" class="rhizome-btn disabled">À venir</a>
                </div>
            </div>
        </div>
    </section>
    <!-- SECTION VIDEO STYLE IMMERSIF -->
<section class="video-section">
    <div class="video-wrapper">
        <video id="gameVideo" poster="green.jpg">
            <source src="video.mp4" type="video/mp4">
            Votre navigateur ne supporte pas la lecture vidéo.
        </video>

        <div class="play-button" onclick="playVideo()">
            <i class="fas fa-play"></i>
        </div>
    </div>
</section>

<!-- STYLES -->
<style>
    .video-section {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 50px 20px;
    }
    .btn-voir-plus {
    display: inline-block;
    margin-top: 1rem;
    background: linear-gradient(135deg, #34d399, #3b82f6);
    color: white;
    padding: 0.5rem 1.2rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    transition: transform 0.2s, box-shadow 0.2s;
}

.btn-voir-plus:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
}

    .video-wrapper {
        position: relative;
        width: 100%;
        max-width: 1200px;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
    }
    .tag-resume {
    display: inline-block;
    background-color: black;
    color: white;
    padding: 4px 8px;
    border-radius: 8px;
    font-weight: bold;
    margin-right: 6px;
    font-size: 13px;
}
.separator-gradient {
    border: 0;
    height: 4px;
    margin: 40px auto;
    width: 80%;
    background: linear-gradient(to right, #00c897, #33aaff, #00c897);
    border-radius: 999px;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
}

    .video-wrapper video {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 20px;
    }
    .badge-tag {
    position: absolute;
    top: 15px;
    left: 15px;
    background-color: #000;
    color: #fff;
    padding: 5px 10px;
    border-radius: 12px;
    font-size: 13px;
    font-weight: bold;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.6); /* effet glow */
    z-index: 2;
}
.tag-resume {
    display: inline-block;
    background-color: black;
    color: white;
    padding: 4px 8px;
    border-radius: 8px;
    font-weight: bold;
    margin-right: 6px;
    font-size: 13px;
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.5); /* petit glow aussi */
}

    .play-button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: linear-gradient(135deg, #a855f7, #38bdf8);
        color: white;
        border-radius: 50%;
        width: 80px;
        height: 80px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2rem;
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
    }

    .play-button:hover {
        transform: translate(-50%, -50%) scale(1.1);
        box-shadow: 0 0 30px rgba(56, 189, 248, 0.6);
        
    }
    .tag-conseil {
    display: inline-block;
    background-color: #2e6158;
    color: white;
    padding: 4px 8px;
    border-radius: 8px;
    font-weight: bold;
    margin-right: 6px;
    font-size: 13px;
}

.tag-objectif {
    display: inline-block;
    background-color: #8c52ff;
    color: white;
    padding: 4px 8px;
    border-radius: 8px;
    font-weight: bold;
    margin-right: 6px;
    font-size: 13px;
}
    /* Conteneur général */
.articles-section {
    padding: 40px 20px;
    background-color: #e4f0eb; /* fond doux */
    font-family: 'Segoe UI', sans-serif;
}

/* Titre principal */
.articles-header {
    text-align: center;
    margin-bottom: 30px;
}

.articles-header h2 {
    font-size: 28px;
    color: #2e6158;
    margin-bottom: 10px;
}

.articles-header p {
    font-size: 16px;
    color: #444;
}

/* Grille de cartes */
.articles-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 20px;
}

/* Carte article */
.article-card-new {
  background-color: white;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
  width: 100%;
  max-width: 350px;
}

.article-card-new:hover {
  transform: scale(1.03);
}

.article-image-wrapper {
  position: relative;
  width: 100%;
  height: 220px; /* ajustable */
  overflow: hidden;
}

.article-image-wrapper img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.article-title-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  background: rgba(0, 0, 0, 0.6);
  color: white;
  font-weight: bold;
  padding: 10px;
  border-bottom-left-radius: 20px;
  border-bottom-right-radius: 20px;
  font-size: 16px;
}

.card-content {
  padding: 16px;
}

</style>

<!-- SCRIPT POUR LECTURE -->
<script>
    function playVideo() {
        const video = document.getElementById('gameVideo');
        video.play();
        video.setAttribute('controls', true);
        document.querySelector('.play-button').style.display = 'none';
    }
</script>

    </section>
    <!-- Section Contact Rhizome -->
    <section id="contact" style="background: #f0fdf4; padding: 60px 20px; position: relative;">
        <div style="max-width: 1000px; margin: auto; text-align: center;">
          <h2 style="font-size: 2.8rem; color: #2e7d32;">Contactez-nous</h2>
          <p style="color: #444; margin-bottom: 40px;">Une question, une suggestion ? L'équipe GreenQuest est là pour vous.</p>
      
          <!-- Message de retour -->
          <div id="formMessage" style="display: none; margin-bottom: 20px; font-weight: bold;"></div>
      
          <!-- Formulaire -->
          <form id="contactForm" style="display: grid; gap: 20px; max-width: 700px; margin: auto;">
            <div style="display: flex; gap: 20px; flex-wrap: wrap;">
              <input type="text" name="name" id="name" placeholder="Votre nom" required style="flex: 1 1 300px; padding: 15px; border: 2px solid #c8e6c9; border-radius: 12px; font-size: 16px;">
              <input type="email" name="email" id="email" placeholder="Votre email" required style="flex: 1 1 300px; padding: 15px; border: 2px solid #c8e6c9; border-radius: 12px; font-size: 16px;">
            </div>
            <textarea name="message" id="message" placeholder="Votre message..." required style="padding: 20px; border: 2px solid #c8e6c9; border-radius: 12px; min-height: 150px; font-size: 16px;"></textarea>
            <button type="submit" style="background-color: #4CAF50; color: white; border: none; padding: 15px 30px; border-radius: 30px; font-size: 16px; cursor: pointer; transition: background 0.3s ease;">📬 Envoyer</button>
          </form>
        </div>
      
        <!-- Lottie deco -->
        <div style="position: absolute; bottom: 0; right: 0; z-index: 0; opacity: 0.1;">
          <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_HpFqiS.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
        </div>
      </section>
      
      <!-- Lottie CDN -->
      <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
      
  
  <!-- Lottie CDN -->


  
  <footer class="footer">
    <div class="footer-container">
      <!-- Description -->
      <div class="footer-section">
        <h3>GreenQuest</h3>
        <p>GreenQuest est un projet écologique et ludique, visant à sensibiliser petits et grands à la préservation de l’environnement à travers des jeux interactifs et des expériences immersives.</p>
      </div>
  
      <!-- Partenaires -->
      <div class="footer-section">
  <h3>Nos partenaires</h3>
  <ul>
    <li><a href="https://www.wwf.fr" target="_blank" rel="noopener noreferrer">WWF</a></li>
    <li><a href="https://www.goodplanet.org/fr/" target="_blank" rel="noopener noreferrer">GroundPlanet Foundation</a></li>
    <li><a href="https://www.nature.org" target="_blank" rel="noopener noreferrer">The Nature Conservancy</a></li>
  </ul>
</div>

  
      <!-- Plateformes -->
      <div class="footer-section">
        <h3>Disponible sur</h3>
        <div class="platforms">
          <img src="steam.png" alt="Steam" />
          <img src="egames.png" alt="Epic Games" />
          <img src="playstore.svg" alt="Play Store" />
        </div>
      </div>
  
      <!-- QR Code -->
      <div class="footer-section">
        <h3>QR Code</h3>
        <img src="qrcode.png" alt="QR Rhizome" class="qr-code" />
      </div>
    </div>
  
    <div class="footer-bottom">
      <p>&copy; 2025 <a href="#">Amadou Sow Mbodji</a> — Tous droits réservés</p>
    </div>
  </footer>
  
    <script type="text/javascript">
        window.addEventListener('scroll',function(){
            const header=document.querySelector('header');
            header.classList.toggle("sticky",window.scrollY > 0);
        });

        function toggleMenu(){
            const toggleMenu=document.querySelector('.menutoggle');
            const navbar=document.querySelector('navbar');
            menutoggle.classList.toggle('active');
            navbar.classList.toggle('active');
        }

             const titreSpans = document.querySelectorAll('h2 span');
            window.addEventListener('load', () => {
                
                const TL = gsap.timeline({paused: true});

                TL.staggerFrom(titreSpans, 1, {top: -50, opacity: 0, ease: "power2.out" }, 0.3)
                TL.play();
            })
    </script>
    <script src="script1.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const buttons = document.querySelectorAll(".ajouter-btn");
            const notificationContainer = document.getElementById("notification-container");
        
            buttons.forEach(button => {
                button.addEventListener("click", function () {
                    const produitBox = button.closest(".produit-box");
                    const imageSrc = produitBox.querySelector("img").src;
                    const produitNom = produitBox.querySelector("h3").textContent;
        
                    // Créer la notification
                    const notification = document.createElement("div");
                    notification.classList.add("notification");
                    notification.innerHTML = `
                        <img src="${imageSrc}" alt="Produit">
                        <p>${produitNom} a été ajouté !</p>
                    `;
        
                    notificationContainer.appendChild(notification);
        
                    // Supprimer la notification après 3 secondes
                    setTimeout(() => {
                        notification.remove();
                    }, 3000);
                });
            });
        });
        </script>
        <script>
            document.getElementById("contactForm").addEventListener("submit", function (e) {
              e.preventDefault(); // Empêche l'envoi normal
            
              const name = document.getElementById("name").value.trim();
              const email = document.getElementById("email").value.trim();
              const message = document.getElementById("message").value.trim();
              const formMessage = document.getElementById("formMessage");
            
              // Vérification des champs
              if (name === "" || email === "" || message === "") {
                formMessage.style.display = "block";
                formMessage.style.color = "#d32f2f";
                formMessage.innerText = "⚠️ Tous les champs doivent être remplis.";
                return;
              }
            
              // Vérification de l'email
              const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
              if (!emailRegex.test(email)) {
                formMessage.style.display = "block";
                formMessage.style.color = "#f57c00";
                formMessage.innerText = "📧 Adresse email invalide.";
                return;
              }
            
              // Si tout est ok
              formMessage.style.display = "block";
              formMessage.style.color = "#2e7d32";
              formMessage.innerText = "✅ Message envoyé avec succès !";
            
              // Réinitialisation du formulaire
              document.getElementById("contactForm").reset();
            
              // Optionnel : faire disparaître le message après 4 sec
              setTimeout(() => {
                formMessage.style.display = "none";
              }, 4000);
            });
            </script>
            <script>
                const conseils = [
                  "Pense à éteindre les lumières inutiles 💡",
                  "Recycler, c'est protéger la planète ♻️",
                  "Plante un arbre, c’est un geste fort 🌳",
                  "L’eau est précieuse, ne la gaspille pas 💧",
                  "Privilégie les transports doux 🚲",
                  "Un geste par jour pour la planète 🌍"
                ];
              
                function parler() {
                  const bulle = document.getElementById("bulle");
                  const random = conseils[Math.floor(Math.random() * conseils.length)];
                  bulle.innerText = random;
                  bulle.style.display = "block";
              
                  clearTimeout(window.mascoTimeout);
                  window.mascoTimeout = setTimeout(() => {
                    bulle.style.display = "none";
                  }, 4000);
                }
              </script>
    <!-- Juste avant </body> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>