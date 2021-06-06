<?php
session_start();
if(empty($_SESSION['id']) OR isset($_SESSION['cat'])){
    header('location: connect.php');
}
else{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=delivery', 'root', '');
    $userinfo=$bdd->prepare('SELECT * FROM user WHERE id=?');
    $userinfo->execute(array($_SESSION['id']));
    $user=$userinfo->fetch();
    $name=$user['prenom']." ".$user['nom'];
    $commandes=$user['commandes'];
    $adresse=$user['adresse'];
    $encours=$bdd->query('SELECT * FROM commandes WHERE id_user='.$_SESSION['id'])->fetchColumn();
    $commandes=$user['commandes'];
    $pannier=$user['pannier'];
    $email=$user['email'];
    $adresse=$user['adresse'];
    $sexe=$user['sexe'];
    $phone=$user['phone'];
    $age=$user['age'];
    $encours=0;
    $date=$user['date_naiss'];
    $date=strtotime($date);
    $date=date("d M Y",$date);
    $datec=$user['date_creation'];
    $datec=strtotime($datec);
    $datec=date("d M Y",$datec);
    if($sexe=='male'){
        if($age>25){
            $pp='oldman';
        }
        else{
            $pp='young';
        }
    }
    else{
        if($age>25){
            $pp='oldwoman';
        }
        else{
            $pp='youngwoman';
        }
    }
    $profil='assets/img/'.$pp.'.png';
    $panniers=$bdd->prepare('SELECT * FROM pannier WHERE id_user=? AND passee=0 ORDER BY id_pannier DESC');
    $panniers->execute(array($_SESSION['id']));
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mon Pannier</title>
    <link rel="icon" type="png" href="assets/img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.7/css/uikit.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<!--navbar-->
    <!--navbar mobile-->
    <nav class="uk-navbar uk-navbar-container uk-hidden@m" style="z-index: 9999;">
           
           <a href="#offcanvas-slide" class="uk-button uk-button-default" uk-toggle style="position:abdolute;margin-bottom:-50px;border: 0;">
               <span uk-navbar-toggle-icon></span> <span class="uk-margin-small-left"><img src="assets/img/delivery.png" width="100px" alt=""></span>
           </a>
           <div id="offcanvas-slide" uk-offcanvas>
           <div class="uk-offcanvas-bar">

               <ul class="uk-nav uk-nav-default">
                   <li><a href="#"><img src="assets/img/logo.png" width="200px"></a></li>
                   <br>
                   <li class="uk-nav-header"><a href="">Acceuil</a></li>
                   <li class="uk-nav-divider"></li>
                   <li class="uk-nav-header"><a href="index.php#propos">À propos</a></li>
                   <li class="uk-nav-divider"></li>
                   <li class="uk-nav-header">Nourriture</li>
                   <li><a href="produit.php">Fast Food</a></li>
                   <li><a href="produit.php">Légumes et Fruits</a></li>
                   <li><a href="produit.php">Viandes</a></li>
                   <li class="uk-nav-divider"></li>
                   <li class="uk-nav-header"><a href="medicament.php">Médicaments</a></li>
                   <li class="uk-nav-divider"></li>
                   <li class="uk-nav-header"><a href="contact.php">Contact</a></li>
                   
                   <li class="uk-nav-divider"></li>
               
               
               <li>
               <a href="#"><i class="fas fa-user-circle"></i>&nbsp; <?=$name ?> &nbsp;<i class="fas fa-sort-down"></i></a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="uk-active"><a href="#">Mon Profil </a></li>
                        <li><a href="profil.php?id=<?=$_SESSION['id']?>"><span uk-icon="icon: cog; ratio: 2"></span></i> Profil</a></li>
                        <li><a href="deconnexion.php?id=<?=$_SESSION['id']?>"><i class="fas fa-sign-out-alt"></i> Se deconnecter</a></li>
                        <li class="uk-nav-header">Mes commandes</li>
                        <li><a href="pannier.php"><i class="fas fa-shopping-basket"></i> Pannier <span class="uk-badge"><?=$panniers->rowCount() ?></span></a></li>
                        <li><a href="commande.php?id=<?=$_SESSION['id'] ?>"><i class="fas fa-box-open"></i> Commandes Arrivées <span class="uk-badge"><?=$commandes ?></span></a></a></li>
                        <li class="uk-nav-divider"></li>
                        <li><a href="commande.php?id=<?=$_SESSION['id'] ?>"><i class="fas fa-dolly-flatbed"></i> Commande en Cours <span class="uk-badge"><?=$encours ?></span> </a></li>
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
        <nav class="uk-navbar-container uk-navbar-default uk-visible@m" uk-navbar="mode: click" style="background-color: rgba(241,241,241,0.5)">
        <div class="uk-navbar-center">
                    <ul class="uk-navbar-nav">
                    <li><a href="#"><img src="assets/img/delivery.png" width="150px"></a></li>
                    <li><a href="index.php">Acceuil</a></li>
                        <li><a href="index.php#propos">À propos</a></li>
                        <li>
                            <a href="#">Nourriture</a>
                            <div class="uk-navbar-dropdown">
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li><a href="produit.php">Fast Food</a></li>
                                    <li><a href="produit.php">Fruits et Légumes</a></li>
                                    <li><a href="produit.php">Viandes</a></li>
                                </ul>
                            </div>
                        </li>
                        
                        <li><a href="medicament.php">Médicaments</a></li>
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
        <div style="border-left:1px grey solid;height:50px;margin-top:13px;opacity:0.4"></div>
                <div class="uk-navbar-right">

                <ul class="uk-navbar-nav">
                    <li  class="uk-active">
                    <a href="#"><i class="fas fa-user-circle"></i>&nbsp; <?=$name ?>&nbsp; <i class="fas fa-sort-down"></i></a>
                <div class="uk-navbar-dropdown uk-width-large">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="uk-active"><a href="#">Mon Profil</a></li>
                        <li><a href="profil.php?id=<?=$_SESSION['id']?>">Profil</a></li>
                        <li><a href="deconnexion.php">Se déconnecter</a></li>
                        <li class="uk-nav-header">Mes commandes</li>
                        <li><a href="pannier.php">Pannier <span class="uk-badge"><?=$panniers->rowCount() ?></span></a></li>
                        <li><a href="commande.php?id=<?=$_SESSION['id'] ?>">Commandes Arrivées <span class="uk-badge"><?=$commandes ?></span></a></a></li>
                        <li class="uk-nav-divider"></li>
                        <li><a href="commande.php?id=<?=$_SESSION['id'] ?>">Commande en Cours <span class="uk-badge"><?=$encours ?></span> </a></li>
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


<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="position:absolute;top:0px"><path fill="#F3F4F5" fill-opacity="1" d="M0,128L720,224L1440,128L1440,0L720,0L0,0Z"></path></svg>

<div class="uk-grid-divider uk-child-width-expand@s text-muted" style="margin-top:50px" uk-grid="parallax: 300">
    <div align="center"class="uk-width-1-3@s">
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
                <div class="uk-width-expand" uk-leader>Téléphone</div>
                <div><?=$phone?></div>
            </div>
        </li>
        <li>
            <div class="uk-grid-small" uk-grid>
                <div class="uk-width-expand" uk-leader>Adresse</div>
                <div><?=$adresse?></div>
            </div>
        </li>
        
        <li>
            <div class="uk-grid-small" uk-grid>
                <div class="uk-width-expand" uk-leader>Date de naissance</div>
                <div><?=$date?></div>
            </div>
        </li>
        <li>
            <div class="uk-grid-small" uk-grid>
                <div class="uk-width-expand" uk-leader>Création du compte</div>
                <div><?=$datec?></div>
            </div>
        </li>
        <li>
            <div class="uk-grid-small" uk-grid>
                <div class="uk-width-expand" uk-leader>Sexe</div>
                <div><?=$sexe?></div>
            </div>
        </li>
        <li>
            <div class="uk-grid-small" uk-grid>
                <div class="uk-width-expand" uk-leader>Age</div>
                <div><?=$age?></div>
            </div>
        </li><br>
        <div align="right">
    <a href="modify.php?id=<?=$_SESSION['id'] ?>" class="btn btn-light"><i class="fas fa-user-edit"></i></a></div>
    </div>
    </ul>
    
    
    <div align="center" class="uk-width-2-3@s">
    <h1 class="uk-text-lead">Mon pannier <span class="uk-label uk-label-success"><?=$panniers->rowCount()?></span>
        </h1>
        <?php $prixtotal=0;
            while($all=$panniers->fetch()){
                $produits=$bdd->prepare('SELECT * FROM produits WHERE id_prod=?');
                $produits->execute(array($all['id_prod']));
                $prod=$produits->fetch();
        ?>
        <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" style="border-radius:30px" uk-grid>
    <div class="uk-card-media-left uk-cover-container"  style="border-radius:30px">
        <img src="admin/produit/<?=$prod['id_prod'] ?>.jpg" alt="" uk-cover>
        <canvas width="600" height="400"></canvas>
    </div>
    <div>
        <div class="uk-card-body" align="left">
            <h3 class="uk-card-title"><?=$prod['nom_produit'] ?></h3>
            <p><?=$prod['descript'] ?></p>
            <p>Quantité: <a href="minus.php?id_prod=<?=$prod['id_prod'] ?>&id_pannier=<?=$all['id_pannier'] ?>" class="btn btn-warning"><i class="fas fa-minus"></i></a> <?=$all['quantity'] ?> <a href="add.php?id_prod=<?=$prod['id_prod'] ?>&id_pannier=<?=$all['id_pannier'] ?>" class="btn btn-primary"><i class="fas fa-plus"></i></a></p>
            <p>Prix selon la quantité: <?=$all['prix'] ?></p>
            <p align="right"><a href="deleteitem.php?id_pannier=<?=$all['id_pannier']?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a></p>
        </div>
    </div>
</div>
            <?php $prixtotal=$prixtotal+$all['prix'];}?>
            <div style="padding:10px;float:right"><h3>Le prix total est de: <input value="<?=$prixtotal ?>" disabled style="max-width:100px" type="text"> Dhs</h3>
<a class="btn btn-success" href="#modal-overflow" uk-toggle style="float:right"><i class="fas fa-wallet"></i> Commander</a></div>
<div id="modal-overflow" uk-modal>
    <div class="uk-modal-dialog">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Commande</h2>
        </div>

        <div class="uk-modal-body" uk-overflow-auto>
            <p>Le paiment doit être en espèce.</p>
            <p>Vous aurez à payer : <em><?=$prixtotal ?></em></p>
            
        </div>

        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" >Cancel</button> 
            <a href="commander.php?nrowsp=<?=$panniers->rowCount() ?><?php
            $pan=$bdd->prepare('SELECT * FROM pannier WHERE passee=0 AND id_user=?');
            $pan->execute(array($_SESSION['id']));
            $i=1; while($comm=$pan->fetch()){ echo'&id_pannier'.$i.'='.$comm['id_pannier'];$i++;}
            ?>&montant=<?=$prixtotal?>" class="uk-button uk-button-primary" name="commander" type="submit"><i class="fas fa-wallet"></i> J'ai le montant qu'il faut</a>
        </div>

    </div>
</div>
</div>
</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.7/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</html>
    
    
    
    
    
<?php }?>