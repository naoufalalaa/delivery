<?php
session_start();
if(empty($_SESSION['id']) OR isset($_SESSION['cat'])){
    header('location: connect.php');
}
else{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=delivery', 'root', '');
    $i=1;
    while($i<=$_GET['nrowsp']){
    if(empty($_GET['id_pannier'.$i])){
        header('location: pannier.php');
    }
    else{
        $f=0;
        $pannier=$bdd->query('SELECT * FROM pannier WHERE id_pannier='.$_GET['id_pannier'.$i]);
        $pan=$pannier->fetch();
        $num=$pan['id_pannier'];
        $isert=$bdd->prepare('INSERT INTO commandes (id_pannier,id_user,montant,fini,date_time_commande) VALUES (?,?,?,?,NOW())');
        $isert->execute(array($_GET['id_pannier'.$i],$_SESSION['id'],$_GET['montant'],$f));
        $update=$bdd->prepare('UPDATE pannier SET passee=1 WHERE id_pannier=?');
        $update->execute(array($_GET['id_pannier'.$i]));
        header('location: pannier.php');
    }
    $i++;

}}
?>