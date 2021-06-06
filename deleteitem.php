<?php
session_start();
if(empty($_SESSION['id']) OR isset($_SESSION['cat'])){
   header('Location: connect.php');
 }
 else{
$bdd = new PDO("mysql:host=127.0.0.1;dbname=delivery;charset=utf8", "root", "");
if(isset($_GET['id_pannier']) AND !empty($_GET['id_pannier'])) {
   $suppr_id = htmlspecialchars($_GET['id_pannier']);
   $suppr = $bdd->prepare('DELETE FROM pannier WHERE id_pannier = ?');
   $suppr->execute(array($suppr_id));
   header('Location: pannier.php');
}}
?>