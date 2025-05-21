<?php
session_start();

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

if (isset($_POST['produit_id'])) {
    $id = (int)$_POST['produit_id'];
    $_SESSION['panier'][] = $id;

    echo json_encode(['status' => 'success', 'message' => 'Produit ajouté au panier !']);
}
