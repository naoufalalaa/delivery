<?php
session_start();
if(empty($_SESSION['id']) AND empty($_SESSION['cat'])){
    header('location: index.php');
}
else{
$bdd = new PDO('mysql:host=127.0.0.1;dbname=delivery', 'root', '');
if(isset($_GET['id_pannier']) AND !empty($_GET['id_pannier'])) {
    $verify_id = htmlspecialchars($_GET['id_pannier']);
    $verify = $bdd->prepare('UPDATE commandes SET prendre = 1 WHERE id_pannier = ?');
    $verify->execute(array($verify_id));
    header('Location: profile.php?id='.$_SESSION['id']);
 }
}
?>