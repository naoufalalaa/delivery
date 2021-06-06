<?php
session_start();
if(empty($_SESSION['id']) OR empty($_SESSION['cat'])){
    header('location: index.php');
}
else{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=delivery', 'root', '');
    if(isset($_GET['C']) AND isset($_GET['O'])){
        $C=$_GET['C'];
        $O=$_GET['O'];
      $fournisseur = $bdd->query('SELECT * FROM fournisseur ORDER BY '.$C.' '.$O);
      }
      else{
      $fournisseur = $bdd->query('SELECT * FROM fournisseur ORDER BY date_ajout DESC');
      }
    $requser = $bdd->prepare("SELECT * FROM administrateur WHERE id = ?");
      $requser->execute(array($_SESSION['id']));
      $userexist = $requser->rowCount();
    if($userexist==1){
    $admininfo=$bdd->prepare('SELECT * FROM administrateur WHERE id=?');
    $admininfo->execute(array($_SESSION['id']));
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
                                    <li><a href="../fastfood.php">Fast Food</a></li>
                                    <li><a href="../legumefruit.php">Fruits et Légumes</a></li>
                                    <li><a href="../viande.php">Viandes</a></li>
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
        <h1 class="uk-text-lead"><?=$name?> <i class="fab fa-keycdn"></i></h1>
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
            <div align="right">
                <a href="modify.php?id=<?=$_SESSION['id'] ?>" class="btn btn-light"><i class="fas fa-user-edit"></i></a>
            </div>


            <div id="offcanvas-nav-primary" class="uk-dark" uk-offcanvas="overlay: true" align="left">
                <div align="left" class="uk-offcanvas-bar uk-flex uk-flex-column">

                    <ul class="uk-nav uk-nav-primary uk-margin-auto-vertical" align="left">
                        <li><a href="profile.php?id=<?=$_SESSION['id'] ?>">Acceuil</a></li>
                        <li class="uk-parent">
                            <a href="#">Actions</a>
                            <ul class="uk-nav-sub">
                                <li><a href="ajouterprod.php"><span uk-icon="plus"></span> Ajouter Produit</a></li>
                                <li><a href="ajouterfour.php"><span uk-icon="plus"></span> Ajouter Fournisseur</a></li>
                            </ul>
                        </li>
                        <li class="uk-parent uk-active">
                            <a href="#"><span uk-icon="chevron-right"></span> Gestion</a>
                            <ul class="uk-nav-sub">
                                <li><a href="produits.php?id=<?=$_SESSION['id']?>"><span uk-icon="pencil"></span> Gérer les Produits</a></li>
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
        <h1 class="uk-text-lead">Fournisseurs <span class="uk-label uk-label-success"></span></h1>
        <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col"><a href="fournisseur.php?C=nom_fournisseur&O=<?php if(isset($O) AND isset($C) AND $C=="nom_fournisseur" AND $O=="ASC"){echo'DESC';} else{?>ASC<?php }?>"> Nom Fournisseur <?php if(isset($O) AND isset($C) AND $C=="nom_founrisseur" AND $O=="DESC" ){echo' <i class="fas fa-sort-up"></i>';} else{echo' <i class="fas fa-sort-down"></i>';} ?></a></th>
                        <th scope="col"><a href="fournisseur.php?C=descript&O=<?php if(isset($O) AND isset($C) AND $C=="descript" AND $O=="ASC"){echo'DESC';} else{?>ASC<?php }?>"> Description <?php if(isset($O) AND isset($C) AND $C=="descript" AND $O=="DESC" ){echo' <i class="fas fa-sort-up"></i>';} else{echo' <i class="fas fa-sort-down"></i>';} ?></a></th>
                        <th scope="col"><a href="fournisseur.php?C=categorie&O=<?php if(isset($O) AND isset($C) AND $C=="categorie" AND $O=="ASC"){echo'DESC';} else{?>ASC<?php }?>"> Catégorie <?php if(isset($O) AND isset($C) AND $C=="categorie" AND $O=="DESC" ){echo' <i class="fas fa-sort-up"></i>';} else{echo' <i class="fas fa-sort-down"></i>';} ?></a></th>
                        <th scope="col"><a href="fournisseur.php?C=nbr_commandes&O=<?php if(isset($O) AND isset($C) AND $C=="nbr_commandes" AND $O=="ASC"){echo'DESC';} else{?>ASC<?php }?>"> Nombre de commandes <?php if(isset($O) AND isset($C) AND $C=="nbr_commandes" AND $O=="DESC" ){echo' <i class="fas fa-sort-up"></i>';} else{echo' <i class="fas fa-sort-down"></i>';} ?></a></th>
                        <th scope="col"><a href="fournisseur.php?C=date_ajout&O=<?php if(isset($O) AND isset($C) AND $C=="date_ajout" AND $O=="ASC"){echo'DESC';} else{?>ASC<?php }?>"> Date et Heure <?php if(isset($O) AND isset($C) AND $C=="date_ajout" AND $O=="DESC" ){echo' <i class="fas fa-sort-up"></i>';} else{echo' <i class="fas fa-sort-down"></i>';} ?></a></th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                        
                        while($four=$fournisseur->fetch()){
                            $time=strtotime($four['date_ajout']);
                            $nomf=$four['nom_fournisseur'];
                            $descript=$four['descript'];
                            $nbrc=$four['nbr_commandes'];
                            $cat=$four['categorie'];
                    ?>
                        <tr>
                        <th scope="row"><?=$nomf ?></th>
                        <td><small><?=$descript ?></small></td>
                        <td><?=$cat ?></td>
                        <td><?=$nbrc ?></td>
                    <td>
                            <small class="text-muted">
                        <?php
                                $now=time();
                                $diff=$now - $time;
                                $diff=intval($diff/60);
                                $hours=intval($diff/60);
                                $days=intval($diff/1440);
                                if($days<1){
                                if($hours>=1){
                                    ?>
                                <i class="fas fa-history"></i> Il y a environ <?=$hours ?> h
                                <?php }
                                if($diff<1){
                                ?>
                            <i class="fas fa-history"></i> Il y a environ <?=$diff*60 ?> sec

                            <?php
                                }
                                elseif($diff>=1 && $hours<1){
                            ?>
                            <i class="fas fa-history"></i> Il y a environ <?=$diff ?> min
                            <?php
                            }
                            }
                            else{
                                if($days<30){
                            ?>
                            <i class="fas fa-history"></i> Il y a <?=$days ?> jour<?php if($days>1){echo's';}
                            }
                            
                            elseif($days<60 AND $days>=30){
                                ?>
                              <i class="fas fa-history"></i>  Il y a <?=intval($days/30) ?> mois
                            <?php }
                            elseif($days>60){
                            ?>
                               <i class="fas fa-history"></i>  <?=date("d M",$time)?>, <?= date("h:i",$time) ?>
                            
                            <?php }}?>
                            </small>
                    
                    </td>
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
<?php 
}

?>