<?php
session_start();
if(empty($_SESSION['id']) OR empty($_SESSION['cat'])){
    header('location: index.php');
}
else{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=delivery', 'root', '');
    $getid=$_GET['id'];
    $requser = $bdd->prepare("SELECT * FROM administrateur WHERE id = ?");
      $requser->execute(array($getid));
      $userexist = $requser->rowCount();
    if($userexist==1){
       
    $admininfo=$bdd->prepare('SELECT * FROM administrateur WHERE id=?');
    $admininfo->execute(array($getid));
    $admin=$admininfo->fetch();
    $name=$admin['nom'].' '.$admin['prenom'];
    $email=$admin['email'];
    $profil='../assets/img/young.png';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrateur</title>
    <link rel="icon" type="png" href="../assets/img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.7/css/uikit.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<?php
include '../loader.php';
?>
<!--navbar-->
    <!--navbar mobile-->
    <nav class="uk-navbar uk-navbar-container uk-hidden@m" style="z-index: 9999;">
           
           <a href="#offcanvas-slide" class="uk-button uk-button-default" uk-toggle style="position:abdolute;margin-bottom:-50px;border: 0;">
               <span uk-navbar-toggle-icon></span> <span class="uk-margin-small-left"><img src="../assets/img/delivery.png" width="100px" alt=""></span>
           </a>
           <div id="offcanvas-slide" uk-offcanvas>
           <div class="uk-offcanvas-bar">

               <ul class="uk-nav uk-nav-default">
                   <li><a href="#"><img src="../assets/img/logo.png" width="200px"></a></li>
                   <br>
                   <li class="uk-nav-header"><a href="../index.php">Acceuil</a></li>
                   <li class="uk-nav-divider"></li>
                   <li class="uk-nav-header"><a href="../index.php#propos">À propos</a></li>
                   <li class="uk-nav-divider"></li>
                   <li class="uk-nav-header">Nourriture</li>
                   <li><a href="../produit.php">Fast Food</a></li>
                   <li><a href="../produit.php">Légumes et Fruits</a></li>
                   <li><a href="../produit.php">Viandes</a></li>
                   <li class="uk-nav-divider"></li>
                   <li class="uk-nav-header"><a href="../medicament.php">Médicaments</a></li>
                   <li class="uk-nav-divider"></li>
                   <li class="uk-nav-header"><a href="../contact.php">Contact</a></li>
                   
                   <li class="uk-nav-divider"></li>
               
               
               <li>
               <a href="#"><i class="fas fa-user-circle"></i>&nbsp; <?=$name ?></a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="uk-active"><a href="#">Mon Profil</a></li>
                        <li><a href="profile.php?id=<?=$_SESSION['id']?>"><span uk-icon="icon: cog; ratio: 2"></span></i> Profil</a></li>
                        <li><a href="../deconnexion.php?id=<?=$_SESSION['id']?>"><i class="fas fa-sign-out-alt"></i> Se deconnecter</a></li>
                        </ul>
                </div>
            
                </li>
        </ul>
           </div>
       </div>
           
   </nav>
   

   
    <!--navbar mobile-->

    <!--navbar-->
            

    <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
        <nav class="uk-navbar-container uk-navbar-default uk-visible@m" uk-navbar="mode: click" style="background-color: rgba(241,241,241,0.7)">
        <div class="uk-navbar-center">
                    <ul class="uk-navbar-nav">
                    <li><a href="#"><img src="../assets/img/delivery.png" width="150px"></a></li>
                    <li><a href="../index.php">Acceuil</a></li>
                        <li><a href="../index.php#propos">À propos</a></li>
                        <li>
                            <a href="#">Nourriture</a>
                            <div class="uk-navbar-dropdown">
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li><a href="../produit.php">Fast Food</a></li>
                                    <li><a href="../produit.php">Fruits et Légumes</a></li>
                                    <li><a href="../produit.php">Viandes</a></li>
                                </ul>
                            </div>
                        </li>
                        
                        <li><a href="../medicament.php">Médicaments</a></li>
                        <li>
                <a href="">Contact</a>
                <div class="uk-navbar-dropdown uk-navbar-dropdown-width-2">
                        <div class="uk-navbar-dropdown-grid uk-child-width-1-2" uk-grid>
                            <div>
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li class="uk-active"><a href="#">Réseaux sociaux</a></li>
                                    <li><a href="#">Item</a></li>
                                
                                </ul>
                            </div>
                            <div>
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li class="uk-active"><a href="#">Autre Affiliations</a></li>
                                    <li><a href="#">site web</a></li>
                                
                                </ul>
                            </div>
                        </div>
                    </div>
            </li>
        <div style="border-left:1px grey solid;height:50px;margin-top:12px;opacity:0.5"></div>
                <div class="uk-navbar-right">

                <ul class="uk-navbar-nav">
                    <li  class="uk-active">
                    <a href="#"><i class="fas fa-user-circle"></i>&nbsp; <?=$name ?> &nbsp;<i class="fas fa-sort-down"></i></a>
                <div class="uk-navbar-dropdown uk-width-large">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="uk-active"><a href="#">Mon Profil</a></li>
                        <li><a href="profile.php?id=<?=$_SESSION['id']?>">Profil</a></li>
                        <li><a href="deconnexion.php">Se déconnecter</a></li>
                    </ul>
                </div>                
                    </li>
                </ul>
            </div>
                        </ul>
                    </div>
                </nav>
        </div>

    <!--navbar-->
<!--navbar-->
<br>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="position:absolute;top:0px"><path fill="#f3f4f5" fill-opacity="1" d="M0,288L120,288C240,288,480,288,720,266.7C960,245,1200,203,1320,181.3L1440,160L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"></path></svg>
<div class="uk-grid-divider uk-child-width-expand@s text-muted" style="margin-top:50px" uk-grid="parallax: 50">
    <div align="center" class="uk-width-auto@m">
        <button align="left" class="uk-button uk-button-default uk-margin-small-right" style="border:0;" type="button" uk-toggle="target: #offcanvas-nav-primary"><span uk-icon="menu"></span> Actions</button>
        <hr class="uk-divider-small">
        <div class="uk-width-auto">
                <img class="uk-border-circle" width="200" height="200" src="<?=$profil?>">
        </div>
        <h1 class="uk-text-lead"><?=$name?></h1>
        <p>Informations</p>
        <ul class="uk-list uk-list-divider" style="padding:15px">
            <li>
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-expand" uk-leader>E-mail</div>
                    <div><?=$email?></div>
                </div>
            </li>
            <li>
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-expand" uk-leader>Statut</div>
                    <div>Administrator <i class="fab fa-keycdn"></i></div>
                </div>
            </li>
        </ul>
        <?php
            if($getid==$_SESSION['id']){
        ?>
            <div align="right">
                <a href="modify.php?id=<?=$_SESSION['id'] ?>" class="btn btn-light"><i class="fas fa-user-edit"></i></a>
            </div>


            <div id="offcanvas-nav-primary" class="uk-dark" uk-offcanvas="overlay: true" align="left">
                <div align="left" class="uk-offcanvas-bar uk-flex uk-flex-column">

                    <ul class="uk-nav uk-nav-primary uk-margin-auto-vertical" align="left">
                        <li class="uk-active"><a href="profile.php?id=<?=$_SESSION['id'] ?>"><span uk-icon="chevron-right"></span> Acceuil</a></li>
                        <li class="uk-parent">
                            <a href="#">Actions</a>
                            <ul class="uk-nav-sub">
                                <li><a href="ajouterprod.php"><span uk-icon="plus"></span> Ajouter Produit</a></li>
                                <li><a href="ajouterfour.php"><span uk-icon="plus"></span> Ajouter Fournisseur</a></li>
                            </ul>
                        </li>
                        <li class="uk-parent">
                            <a href="#">Gestion</a>
                            <ul class="uk-nav-sub">
                                <li><a href="produits.php"><span uk-icon="pencil"></span> Gérer les Produits</a></li>
                                <li><a href="fournisseur.php"><span uk-icon="pencil"></span> Gérer les Fournisseurs</a></li>
                                <li><a href="commandes.php"><span uk-icon="pencil"></span> Gérer les Commandes</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>


        <?php }?>
        
    </div>
    <div align="center" class="uk-width-expand@m">
        <h1 class="uk-text-lead">Commandes <span class="uk-label uk-label-success"></span></h1>
        <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom Produit</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Nom Prénom</th>
                        <th scope="col">Fournisseur</th>
                        <th scope="col">Catégorie</th>
                        <th scope="col">Date et Heure</th>
                        <th scope="col">Prendre</th>
                        <th scope="col">Terminer</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                        $commandes=$bdd->query('SELECT * FROM commandes WHERE terminer=0');
                        while($co=$commandes->fetch()){
                            $time=strtotime($co['date_time_commande']);
                            $userid=$co['id_user'];
                            $userinfo=$bdd->prepare('SELECT * FROM user WHERE id=?');
                            $userinfo->execute(array($userid));
                            $user=$userinfo->fetch();
                            $username=$user['prenom'].' '.$user['nom'];
                            $useraddress=$user['adresse'];
                            $userphone=$user['phone'];
                            $usermail=$user['email'];
                            $avatar=$user['avatar'];
                            $pannierid=$co['id_pannier'];
                            $pannierfetch=$bdd->prepare('SELECT * FROM pannier WHERE id_user=? AND id_pannier=?');
                            $pannierfetch->execute(array($userid,$pannierid));
                            $p=$pannierfetch->fetch();
                            $prodid=$p['id_prod'];
                            $produit=$bdd->prepare('SELECT * FROM produits WHERE id_prod=?');
                            $produit->execute(array($prodid));
                            $prod=$produit->fetch();
                            $productname=$prod['nom_produit'];
                            $categorie=$prod['cat'];
                            $nomf=$prod['nom_f'];
                            if($co['prendre']==0){
                                echo '<tr class="alert alert-info">';
                            }
                            else{
                    ?>
                        <tr><?php }?>
                        <th scope="row"><img class="uk-preserve-width uk-border-circle" src="../assets/img/<?=$avatar ?>" width="40" alt=""></th>
                        <td><a href="../produit.php"><?=$productname ?></a></td>
                        <td><?=$useraddress ?></td>
                        <td><strong><?=$username ?></strong></td>
                        <td><?=$nomf ?></td>
                        <td><?=$categorie ?></td>
                    <td><?=date("d M à H:I", $time) ?></td>
                        <td><a href="validate.php?id_pannier=<?=$pannierid ?>" class="btn btn-primary">Prendre</a></td>
                        <td><a href="terminer.php?id_pannier=<?=$pannierid ?>" class="btn btn-danger">Terminer</a></td>
                        </tr>
                        <?php }?>
                        
                    </tbody>
            </table>
        </div>
    </div>
    
</div>


<div class="uk-height-large uk-background-cover uk-light uk-flex uk-flex-top" uk-parallax="bgy: -200" style="background-image: url('images/dark.jpg');">

    <h1 class="uk-width-1-2@m uk-text-center uk-margin-auto uk-margin-auto-vertical" uk-parallax="y: 100,0">Headline</h1>

</div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.7/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.7/js/uikit-icons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</html>
<?php }
else{
    header('location:index.php');
}
}

?>