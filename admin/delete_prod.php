<?php
session_start();
if(empty($_SESSION['id']) OR empty($_SESSION['cat'])){
   header('Location: index.php');
 }
 else{
$bdd = new PDO("mysql:host=127.0.0.1;dbname=delivery;charset=utf8", "root", "");
if(isset($_GET['id_prod']) AND !empty($_GET['id_prod'])) {
   $suppr_id = htmlspecialchars($_GET['id_prod']);
   $suppr = $bdd->prepare('DELETE FROM produits WHERE id_prod = ?');
   $suppr->execute(array($suppr_id));
   header('Location: produits.php');
}}
?>