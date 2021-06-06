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
                   <li class="uk-nav-header"><a href="#propos">À propos</a></li>
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
                        <li><a href="<?=$ex?>profil.php?id=<?=$_SESSION['id']?>"><span uk-icon="icon: cog; ratio: 2"></span></i> Profil</a></li>
                        <li><a href="<?=$ex?>deconnexion.php?id=<?=$_SESSION['id']?>"><i class="fas fa-sign-out-alt"></i> Se deconnecter</a></li>
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
        <style>
        .bond{
        animation: bounce 0.8s ease infinite alternate; 
        } 
        @keyframes bounce{ from {transform: translateY(20px);} to {transform: translateY(-20px);}}
        </style>

   <!--navbar-->
       <div class="uk-position-relative">
           <div class="uk-position-relative uk-visible-toggle uk-dark"  tabindex="-1" uk-slideshow="ratio: 7:3;autoplay: true; animation: scale">
           
           <div class="bond" onMouseOver="" style="z-index:100; position:absolute; top:77%; left:49%">
                   <a href="#services"><img src="assets/img/scrollB.png" width="40px" alt=""></a>
                   </div>
           <ul class="uk-slideshow-items">
               <li>
                   <div style=" overflow:hidden">
                       <div class="uk-overflow-hidden">
                           <img src="assets/img/grocery.jpg" alt="Example image" uk-scrollspy="cls: uk-animation-kenburns; repeat: true">
                       </div>
                   </div>                    </li>
               <li>
                   <div style="overflow:hidden">
                       <div class="uk-overflow-hidden">
                           <img src="assets/img/fastfood.jpg" alt="Example image" uk-scrollspy="cls: uk-animation-kenburns; repeat: true">
                       </div>
                   </div>                    </li>
               <li>
                   <div style=" overflow:hidden">
                       <div class="uk-overflow-hidden">
                           <img src="assets/img/medicines.jpg" alt="Example image" uk-scrollspy="cls: uk-animation-kenburns; repeat: true">
                       </div>
                   </div>
               </li>
               <li>
                   <div style=" overflow:hidden">
                       <div class="uk-overflow-hidden">
                           <img src="assets/img/deliver.jpg" alt="Example image" uk-scrollspy="cls: uk-animation-kenburns; repeat: true">
                       </div>
                   </div>
               </li>
           </ul>

           <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
           <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

       </div> 

       <div class="uk-position-top uk-visible@m">
           <nav class="uk-navbar-container uk-navbar-transparent" style="color:red" uk-navbar="mode: click">
               <div class="uk-navbar-center">
                   <ul class="uk-navbar-nav">
                   <li><a href="#"><img src="assets/img/delivery.png" width="150px"></a></li>
                   <li ><a href="">Acceuil</a></li>
                       <li><a href="#propos">À propos</a></li>
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
                                <li><a href="https://www.facebook.com/naoufala2" uk-icon="icon: facebook"></a> naoufal alaa</li>
                        <li><a href="https://www.instagram.com/naoufal_alaa/" uk-icon="icon: instagram"></a> naoufal_alaa</li>
                        <li class="user-select-all"><p uk-icon="icon: whatsapp"></p> +212 622975254</li>
                               
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
    <div style="border-left:1px grey solid;height:50px;margin-top:12px;opacity:0.4"></div>
           <div class="uk-navbar-right">

        <ul class="uk-navbar-nav">
            <li><?php if(empty($_SESSION['id'])){?>
                <a href="connect.php"><i class="fas fa-users"></i>&nbsp; Login</a>
            </li>
            <li>
                <a href="sign.php"><i class="fas fa-sign-in-alt"></i>&nbsp; S'inscrire</a>
            
            <?php }else{?>
                <a href="#"><i class="fas fa-user-circle"></i>&nbsp; <?=$name ?>&nbsp; <i class="fas fa-sort-down"></i></a>
                <div class="uk-navbar-dropdown uk-width-large">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li ><a href="#">Mon Profil</a></li>
                        <li><a href="<?=$ex?>profil<?=$e?>.php?id=<?=$_SESSION['id']?>">Profil</a></li>
                        <li><a href="<?=$ex?>deconnexion.php">Se deconnecter</a></li>
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
    <div class="uk-background-muted uk-padding uk-panel inc" style="margin-bottom: -55px;top: -30px;height:55px;z-index:10"></div>

   </div>
    <!--navbar-->
<!--navbar-->

