<?php 
   session_start();
   include_once "con_dbb.php";

   // Message de confirmation
   $message = '';
   if (isset($_POST['valider_commande'])) {
       $message = "✅ Votre commande a été enregistrée ! Merci pour votre achat 🌱";
       $_SESSION['panier'] = []; // vider le panier
   }

   // Supprimer les produits
   if (isset($_GET['del'])) {
       $id_del = $_GET['del'];
       unset($_SESSION['panier'][$id_del]);
   }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier - GreenQuest</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body.panier {
            font-family: 'Poppins', sans-serif;
            background: #e6ffe6;
            margin: 0;
            padding: 0;
        }

        .link {
            display: inline-block;
            margin: 20px;
            padding: 10px 20px;
            background-color: #2e7d32;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .link:hover {
            background-color: #388e3c;
        }

        section {
            padding: 30px;
            max-width: 900px;
            margin: auto;
        }

        .product-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            transition: transform 0.2s ease;
        }

        .product-card:hover {
            transform: scale(1.01);
        }

        .product-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .product-info img {
    max-height: 150px;
    width: auto;
    object-fit: contain;
    border-radius: 12px;
    display: block;
}


        .product-name {
            font-size: 1.2em;
            font-weight: 600;
            color: #2e7d32;
        }

        .product-price {
            font-size: 1em;
            color: #555;
            margin-top: 5px;
        }

        .quantity {
            font-weight: bold;
            background-color: #f1f8e9;
            padding: 8px 16px;
            border-radius: 10px;
            font-size: 1em;
            color: #33691e;
        }

        .delete-btn img {
            width: 24px;
            transition: transform 0.2s ease;
        }

        .delete-btn:hover img {
            transform: scale(1.2);
        }

        .total-bar {
            background-color: #c8e6c9;
            padding: 20px;
            border-radius: 12px;
            text-align: right;
            font-size: 1.3em;
            color: #1b5e20;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        .confirmation-message {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            margin: 20px;
            border-radius: 8px;
            border: 1px solid #c3e6cb;
        }

        .validate-button {
            padding: 12px 24px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            cursor: pointer;
            margin-top: 20px;
            float: right;
            transition: background 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .validate-button:hover {
            background-color: #388e3c;
        }

        .empty-message {
            text-align: center;
            font-size: 1.2em;
            color: #555;
            padding: 50px 0;
        }

    </style>
</head>
<body class="panier">
    <a href="index10.php" class="link">← Retour à la boutique</a>

    <?php if ($message): ?>
        <div class="confirmation-message"><?= $message ?></div>
    <?php endif; ?>

    <section>
        <?php 
            $total = 0;
            $ids = array_keys($_SESSION['panier']);
            if (empty($ids)) {
                echo '<div class="empty-message">🛒 Votre panier est vide</div>';
            } else {
                $products = mysqli_query($con, "SELECT * FROM products WHERE id IN (".implode(',', $ids).")");
                foreach($products as $product):
                    $total += $product['price'] * $_SESSION['panier'][$product['id']];
        ?>
        <div class="product-card">
            <div class="product-info">
                <img src="project_images/<?= $product['img'] ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                <div>
                    <div class="product-name"><?= htmlspecialchars($product['name']) ?></div>
                    <div class="product-price"><?= htmlspecialchars($product['price']) ?> €</div>
                </div>
            </div>
            <div class="quantity">x <?= intval($_SESSION['panier'][$product['id']]) ?></div>
            <a href="panier.php?del=<?= $product['id'] ?>" class="delete-btn">
                <img src="delete.png" alt="Supprimer">
            </a>
        </div>
        <?php endforeach; ?>

        <div class="total-bar">Total : <?= $total ?> €</div>

        <form method="post">
            <button type="submit" name="valider_commande" class="validate-button">
                ✅ Valider la commande
            </button>
        </form>
        <?php } ?>
    </section>
</body>
</html>


