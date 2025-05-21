
<?php 
try {
    $pdo = new PDO("mysql:host=localhost;dbname=web;charset=utf8", 'root', '');
} catch(PDOException $e) {
    die('Erreur : '.$e->getMessage());
}
?>
