<?php
if(isset($_SESSION['id']) AND empty($_SESSION['cat'])){
    $conn=$_SESSION['id'];
    $ex="";
    $e="";
    $userinfo=$bdd->prepare('SELECT * FROM user WHERE id=?');
    $userinfo->execute(array($_SESSION['id']));
    $user=$userinfo->fetch();
    $name=$user['prenom']." ".$user['nom'];
    $commandes=$user['commandes'];
    $pannier=$user['pannier'];
    $adresse=$user['adresse'];
    $dd=$bdd->query('SELECT * FROM commandes WHERE id_user='.$conn);
    $encours=$dd->rowCount();
    $panniers=$bdd->prepare('SELECT * FROM pannier WHERE id_user=? ORDER BY id_pannier DESC');
$panniers->execute(array($_SESSION['id']));
}
elseif(isset($_SESSION['id']) AND isset($_SESSION['cat'])){
    $ex='admin/';
    $e="e";
    $userinfo=$bdd->prepare('SELECT * FROM administrateur WHERE id=?');
    $userinfo->execute(array($_SESSION['id']));
    $user=$userinfo->fetch();
    $name=$user['prenom']." ".$user['nom'];
}


$fast='fastfood';
$fastfoods=$bdd->prepare('SELECT * FROM fournisseur WHERE categorie=?');
$fastfoods->execute(array($fast));




if(isset($_POST['keyword']) AND !empty($_POST['keyword'])){
    $produit=$bdd->query('SELECT * FROM produits WHERE nom_produit LIKE "%'.$_POST['keyword'].'%"');
    $nrows=$produit->rowCount();
    $recherche=1;
}else{
        if(isset($_GET['categorie'])){
            $cat=$_GET['categorie'];
            $produit=$bdd->prepare('SELECT * FROM produits WHERE cat=? ORDER BY id_prod DESC');
            $produit->execute(array($_GET['categorie']));
            $nrows=$produit->rowCount();
        }
        else{
            if(empty($_GET['nom_f'])){
            $produit=$bdd->query('SELECT * FROM produits ORDER BY id_prod DESC');
            $nrows=1;
            }
            else{
                $nom_f=$_GET['nom_f'];
                $produit=$bdd->prepare('SELECT * FROM produits WHERE nom_f=? ORDER BY id_prod DESC');
                $produit->execute(array($nom_f));
                $nrows=$produit->rowCount();
            }
        }
}
?>