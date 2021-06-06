<?php
session_start();
if(empty($_SESSION['id']) OR isset($_SESSION['cat'])){
   header('Location: index.php');
 }
 else{
$bdd = new PDO("mysql:host=127.0.0.1;dbname=delivery;charset=utf8", "root", "");
if(isset($_GET['id_prod']) AND !empty($_GET['id_prod']) AND isset($_GET['id_pannier'])) {
   $addid = htmlspecialchars($_GET['id_prod']);
   $id=$_SESSION['id'];
    $select=$bdd->prepare('SELECT * FROM pannier WHERE id_pannier=? AND id_prod=? AND id_user=?');
    $select->execute(array($_GET['id_pannier'],$addid,$id));
    $new=$select->fetch();
    $quant=$new['quantity'];
    $produit=$bdd->prepare('SELECT * FROM produits WHERE id_prod=?');
    $produit->execute(array($addid));
    $prod=$produit->fetch();
    $new1=$quant-1;
    if($new1<1){
        $suppr = $bdd->prepare('DELETE FROM pannier WHERE id_pannier = ?');
        $suppr->execute(array($_GET['id_pannier']));
        header('Location: pannier.php');
    }
    $price=$prod['prix']*$new1;
   $add = $bdd->prepare('UPDATE pannier SET quantity=?, prix=? WHERE id_pannier=? AND id_prod = ? AND id_user=?');
   $add->execute(array($new1,$price,$_GET['id_pannier'],$addid,$id));
   header('Location: pannier.php');
}}
?>