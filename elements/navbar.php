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
                    <li class="uk-nav-header"><a href="produit.php">Produits</a></li>                    
                    <li class="uk-nav-divider"></li>
                    <li class="uk-nav-header"><a href="medicament.php">Médicaments</a></li>
                    <li class="uk-nav-divider"></li>
                    <li class="uk-nav-header"><a href="contact.php">Contact</a></li>
                    
                    <li class="uk-nav-divider"></li>
                
                
                    <li><?php if(empty($_SESSION['id'])){?>
                <a href="connect.php"><i class="fas fa-users"></i>&nbsp; Login</a>
            </li>
            <li>
                <a href="sign.php"><i class="fas fa-sign-in-alt"></i>&nbsp; S'inscrire</a>
            </li>
            <?php }else{?>
                <a href="#"><i class="fas fa-user-circle"></i>&nbsp; <?=$name ?></a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li ><a href="#">Mon Profil</a></li>
                        <li><a href="<?php if(isset($ex)){echo $ex;}?>profil.php?id=<?=$_SESSION['id']?>"><span uk-icon="icon: cog; ratio: 2"></span></i> Profil</a></li>
                        <li><a href="<?php if(isset($ex)){echo $ex;}?>deconnexion.php?id=<?=$_SESSION['id']?>"><i class="fas fa-sign-out-alt"></i> Se deconnecter</a></li>
                        <?php if(empty($_SESSION['cat'])){?>
                        <li class="uk-nav-header">Mes commandes</li>
                        <li><a href="pannier.php"><i class="fas fa-shopping-basket"></i> Pannier <span class="uk-badge"><?=$panniers->rowCount() ?></span></a></li>
                        <li><a href="commande.php?id=<?=$_SESSION['id'] ?>"><i class="fas fa-box-open"></i> Commandes Arrivées <span class="uk-badge"><?=$commandes ?></span></a></a></li>
                        <li class="uk-nav-divider"></li>
                        <li><a href="commande.php?id=<?=$_SESSION['id'] ?>"><i class="fas fa-dolly-flatbed"></i> Commande en Cours <span class="uk-badge"><?=$encours ?></span> </a></li>
                        <?php }?>
                    </ul>
                </div>
            <?php }?>
                </li>
            </ul>
            </div>
            </div>
                
        </nav>
    <!--navbar mobile-->

    <!--navbar-->
            
    <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
        <nav class="uk-navbar-container uk-navbar-default uk-visible@m" uk-navbar="mode: click" style="background-color: rgba(241,241,241,0)">
        <div class="uk-navbar-center">
                    <ul class="uk-navbar-nav">
                    <li><a href="#"><img src="assets/img/delivery.png" width="150px"></a></li>
                    <li><a href="index.php">Acceuil</a></li>
                        <li><a href="index.php#propos">À propos</a></li>
                        <li >
                            <a href="produit.php">Produits</a>
                            
                        </li>
                        
                        <li><a href="medicament.php">Médicaments</a></li>
                        <li>
                <a href="">Contact</a>
                <div class="uk-navbar-dropdown uk-navbar-dropdown-width-2">
                        <div class="uk-navbar-dropdown-grid uk-child-width-1-2" uk-grid>
                            <div>
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li ><a href="#">Réseaux sociaux</a></li>
                                    <ul>
                                    <li><a href="https://www.facebook.com/naoufala2" uk-icon="icon: facebook"></a> naoufal alaa</li>
                        <li><a href="https://www.instagram.com/naoufal_alaa/" uk-icon="icon: instagram"></a> naoufal_alaa</li>
                        <li class="user-select-all"><p uk-icon="icon: whatsapp"></p> +212 622975254</li>
                        </ul>
                                </ul>
                            </div>
                            <div>
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li ><a href="#">Autre Affiliations</a></li>
                                    <li><a href="http://wifakatlas.tk">Wifak Atlas</a></li>
                                
                                </ul>
                            </div>
                        </div>
                    </div>
            </li>
        <div style="border-left:1px grey solid;height:50px;margin-top:12px;opacity:0.5"></div>
                <div class="uk-navbar-right">

                <ul class="uk-navbar-nav">
                <li><?php if(empty($_SESSION['id'])){?>
                <a href="connect.php"><i class="fas fa-users"></i>&nbsp; Login</a>
            </li>
            <li>
                <a href="sign.php"><i class="fas fa-sign-in-alt"></i>&nbsp; S'inscrire</a>
            
            <?php }else{?>
            <a href="#"><i class="fas fa-user-circle"></i>&nbsp; <?=$name ?>&nbsp; <i class="fas fa-sort-down"></i>&nbsp;&nbsp; <?php if(empty($_SESSION['cat']) AND $panniers->rowCount()>0){ ?><span class="uk-label uk-label-danger"><?=$panniers->rowCount() ?></span><?php }?></a>
                <div class="uk-navbar-dropdown uk-width-large">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li ><a href="#">Mon Profil</a></li>
                        <li><a href="<?php if(isset($ex)){echo $ex;}?>profil.php?id=<?=$_SESSION['id']?>"><span uk-icon="icon: cog; ratio: 2"></span></i> Profil</a></li>
                        <li><a href="<?php if(isset($ex)){echo $ex;}?>deconnexion.php?id=<?=$_SESSION['id']?>"><i class="fas fa-sign-out-alt"></i> Se deconnecter</a></li>
                        <?php if(empty($_SESSION['cat'])){?>
                        <li class="uk-nav-header">Mes commandes</li>
                        <li><a href="pannier.php">Pannier <span class="uk-badge"><?=$panniers->rowCount() ?></span></a></li>
                        <li><a href="commande.php?id=<?=$_SESSION['id'] ?>">Commandes Arrivées <span class="uk-badge"><?=$commandes ?></span></a></a></li>
                        <li class="uk-nav-divider"></li>
                        <li><a href="commande.php?id=<?=$_SESSION['id'] ?>">Commande en Cours <span class="uk-badge"><?=$encours ?></span> </a></li>
                        <?php }?>
                    </ul>
                </div>
            <?php }?>
                
            </li>
                </ul>
            </div>
                        </ul>
                    </div>
                </nav>
        </div>
       

    <!--navbar-->
<!--navbar-->
