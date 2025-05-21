<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nos Articles - GreenQuest</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f9fafb;
            color: #333;
        }

        .section {
            text-align: center;
            padding: 50px 20px;
        }

        .section h2 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .section p {
            font-size: 18px;
            color: #555;
            margin-bottom: 50px;
        }

        .articles-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            padding: 0 20px;
        }

        .article-card-new {
            background-color: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            width: 100%;
            max-width: 350px;
            position: relative;
        }

        .article-card-new:hover {
            transform: scale(1.03);
        }

        .article-image-wrapper {
            position: relative;
            width: 100%;
            height: 220px;
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
            text-align: left;
        }

        .badge-tag {
            position: absolute;
            top: 12px;
            left: 12px;
            background: #2bd576;
            color: white;
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 12px;
            box-shadow: 0 0 6px rgba(43, 213, 118, 0.7);
            font-weight: bold;
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
            box-shadow: 0 0 4px rgba(0, 0, 0, 0.5);
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.3s ease;
            margin-top: 12px;
        }

        .btn:hover {
            background-color: #388e3c;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 10;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 30px;
            border-radius: 20px;
            width: 80%;
            max-width: 500px;
            text-align: center;
            position: relative;
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        .modal-content img {
            max-width: 100%;
            max-height: 300px;
            border-radius: 15px;
            object-fit: contain;
            margin-bottom: 15px;
        }

        .modal-content h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .modal-content p {
            font-size: 16px;
            color: #555;
            margin-bottom: 15px;
        }

        .price {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .close {
            position: absolute;
            top: 15px;
            right: 25px;
            font-size: 28px;
            font-weight: bold;
            color: #999;
            cursor: pointer;
        }

        .close:hover {
            color: #333;
        }
    </style>
</head>
<body>

<section class="section">
    <h2><span style="color:#4CAF50;">Nos</span> Articles</h2>
    <p>📰 Explorez les récits de GreenQuest : chaque article dévoile des astuces écolos, des découvertes étonnantes et des défis à relever pour devenir un vrai héros de la planète 🌍💚.</p>

    <div class="articles-container">

        <!-- Exemple d’article -->
        <div class="article-card-new">
            <span class="badge-tag">17 Avr. 2025</span>
            <div class="article-image-wrapper">
                <img src="compos.jpg" alt="Dino">
                <div class="article-title-overlay">Comment composter 😁</div>
            </div>
            <div class="card-content">
                <p><span class="tag-resume">Résumé :</span>Découvrez comment composter efficacement chez vous, même sans jardin.</p>
                <button class="btn" onclick="openModal('compo.gif', '🔄 Astuces pour un compost réussi', 'Alternez déchets humides (épluchures) et déchets secs (carton).', 'Coupez vos déchets en petits morceaux pour accélérer la décomposition.')">Découvrir</button>
            </div>
        </div>

        <div class="article-card-new">
            <span class="badge-tag">20 Mai. 2025</span>
            <div class="article-image-wrapper">
                <img src="./baleine.jpg" alt="Plastique">
                <div class="article-title-overlay">Réduisez les déchets plastiques</div>
            </div>
            <div class="card-content">
                <p><span class="tag-resume">Résumé :</span> Découvrez des astuces simples pour limiter le plastique et préserver les océans.</p>
                <button class="btn" onclick="openModal('marin.gif', 'À l’extérieur :', 'Utilise des sacs réutilisables pour faire les courses.','Remplace vaisselle et couverts jetables par des versions durables (bambou, inox, etc.).','Gratuit')">Découvrir</button>
            </div>
        </div>

        <div class="article-card-new">
            <span class="badge-tag">21 Avr. 2025</span>
            <div class="article-image-wrapper">
                <img src="trans.jpg" alt="Rese">
                <div class="article-title-overlay">Modes de transport ecologique</div>
            </div>
            <div class="card-content">
                <p><span class="tag-resume">Résumé :</span> Optez pour des modes de transport écologiques</p>
                <button class="btn" onclick="openModal('train.gif', 'Privilégiez ces modes de transport', '🚲 Vélo – Zéro émission et bon pour la santé !','🛴 Trottinette électrique – Parfaite pour les trajets urbains.', '15€')">Découvrir</button>
            </div>
        </div>

        <div class="article-card-new">
            <span class="badge-tag">19 Mars. 2025</span>
            <div class="article-image-wrapper">
                <img src="foret.jpg" alt="Hibou">
                <div class="article-title-overlay">Hibou, gardien des secrets</div>
            </div>
            <div class="card-content">
                <p><span class="tag-resume">Résumé :</span> Un gardien silencieux des secrets anciens.</p>
                <button class="btn" onclick="openModal('hibou.png', 'Hibou', 'Un gardien silencieux des secrets anciens.', '12€')">Découvrir</button>
            </div>
        </div>

    </div>
</section>

<!-- Modal -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <img id="modal-img" src="" alt="" />
        <h3 id="modal-title"></h3>
        <p id="modal-description"></p>
        <div class="price" id="modal-price"></div>
    </div>
</div>

<script>
    function openModal(img, title, description, price) {
        document.getElementById('modal-img').src = img;
        document.getElementById('modal-title').innerText = title;
        document.getElementById('modal-description').innerText = description;
        document.getElementById('modal-price').innerText = price;
        document.getElementById('modal').style.display = "block";
    }

    function closeModal() {
        document.getElementById('modal').style.display = "none";
    }

    window.onclick = function(event) {
        const modal = document.getElementById('modal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</body>
</html>
