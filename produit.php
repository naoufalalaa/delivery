<?php
include 'controllers/connector.php';
include 'controllers/produit.php';
$page='Produits';
include 'elements/head.php';
include 'elements/navbar.php';
?>
<div style="top:0px;left:0px; position:absolute;opacity:0.12">
        <div align="center" class="uk-width-1-3" style="margin-left:100%;position: absolute;top:0" uk-parallax="y: 900;">
        <img src="assets/img/rond4.png" alt="">
        </div>
        <div align="center" class="uk-width-2-3" uk-parallax="x: 600;y:500">
            <img src="assets/img/rond5.png" alt="">
        </div>
        <div align="center" class="uk-width-1-3" style="margin-left:50%" uk-parallax="y: -600;x: -200">
        <img src="assets/img/rond6.png" alt="">
        </div>
        <div align="center" class="uk-width-2-3" style="margin-left:70%;position: absolute;top:10%" uk-parallax="x: -200;y: -900">
        <img src="assets/img/rond4.png">
        </div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" style="position:absolute;top:0;left:0" viewBox="0 0 1440 320"><path fill="#ffd700" fill-opacity="1" d="M0,32L48,42.7C96,53,192,75,288,74.7C384,75,480,53,576,80C672,107,768,181,864,213.3C960,245,1056,235,1152,208C1248,181,1344,139,1392,117.3L1440,96L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>




<div class="uk-grid-small uk-match-grid" style="margin-left:30px;" uk-grid>
        <div id="side" class="uk-card uk-card-default uk-card-body uk-width-1-4@s" style="position: relative;opacity:0.5;margin-top:100px;margin-bottom:100px;border-radius:20px">
            <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
            <?php if(isset($_GET['nom_f']) OR isset($recherche)){ ?><div align="center"><a class="btn btn-light" href="produit.php"><li class="uk-active uk-nav-header"><i class="fas fa-angle-left"></i> RETOURNER</li></a></div><?php }?>
                <li class="uk-active uk-nav-header">
                    <form class="uk-search uk-search-default" method="post">
                        <input style="border-radius:10px" class="uk-search-input" <?php if(isset($_POST['keyword'])){ ?>value="<?=$_POST['keyword'] ?>"<?php }?> name="keyword" type="text" placeholder="Search...">
                        <button type="submit" name="search" class="uk-search-icon-flip" uk-search-icon></button>
                    </form>
                </li>
                <li class="uk-active uk-nav-header">Nourriture</li>
                <hr class="uk-divider-small"  style="margin:5px">

                <li class="uk-parent">
                    <a href="#"><span class="uk-margin-small-right"></span>FastFood</a>
                    <ul class="uk-nav-sub">
                    <?php
                        while($fastf=$fastfoods->fetch()){
                    ?>
                        <li><a href="produit.php?nom_f=<?=$fastf['nom_fournisseur'] ?>"><?=$fastf['nom_fournisseur'] ?></a></li>
                        <?php }?>
                    </ul>
                </li>
                <li class="uk-parent">
                    <a href="#"><span class="uk-margin-small-right"></span>Produit Bio</a>
                    <ul class="uk-nav-sub">
                        <li><a href="produit.php?nom_f=fruitleg">Fruits et Légumes</a></li>
                        <li><a href="produit.php?nom_f=viandes">Viandes</a></li>
                    </ul>
                </li>
                
                <li class="uk-nav-header">Services</li>
                <hr class="uk-divider-small" style="margin:5px">

                <li><a href="medicament.php"><span class="uk-margin-small-right"></span> Médicaments</a></li>
                <li><a href="#"><span class="uk-margin-small-right"></span> Autres</a></li>
                </ul>
</div>
<div class="uk-card uk-card-body uk-width-3-4@s" style="margin-top:100px;opacity:0.9">
        <div class="uk-grid-small uk-grid-match uk-child-width-1-3@l uk-child-width-1-2@s uk-text-center" uk-grid="parallax: 100">
                            <?php 
                            if($nrows>0){
                            while($prod=$produit->fetch()){
                                $namp=$prod['nom_produit'];
                                $id=$prod['id_prod'];
                                ?>
            <div style="opacity:0.9">
                <div class="uk-card uk-card-default uk-card-body" align="left" style="border-radius:20px;padding:10px">
                    
                        <div class="uk-card-media-top">
                        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: scale" align="center">

                            <ul class="uk-slideshow-items" uk-lightbox>
                                <li>
                                    <div class="uk-position-cover uk-transform-origin-center-left">
                                        <a href="admin/produit/<?=$prod['id_prod'] ?>.jpg" class="uk-button uk-button-default"><img src="admin/produit/<?=$prod['id_prod'] ?>.jpg" style="border-radius:10px;" alt=""></a>
                                    </div>
                                </li>
                                <?php
                                $i=1;
                                    while($i<5){
                                        $filename='admin/produit/'.$prod['id_prod'].'p'.$i.'.jpg';
                                        if(file_exists($filename)){
                                        echo '<li>
                                    <div class="uk-position-cover uk-animation-kenburns uk-transform-origin-top-right">
                                        <a href="admin/produit/'.$prod['id_prod'].'p'.$i.'.jpg"  class="uk-button uk-button-default"><img src="admin/produit/'.$prod['id_prod'].'p'.$i.'.jpg" style="border-radius:10px;" alt="" ></a>
                                    </div>
                                </li>';
                                $i++;}
                                else{
                                break;
                                }
                                    }
                                ?>
                            </ul>

                            <a class="uk-position-center-left uk-position-small" href="#" style="color:#00284f" uk-slidenav-previous uk-slideshow-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small" href="#" style="color:#00284f" uk-slidenav-next uk-slideshow-item="next"></a>

                            </div>
                        </div>
                        <div class="uk-card-body" style="padding:7px">
                            <h3><?=$namp ?></h3>
                            
                            <p><a class="btn btn-warning"<?php if(!empty($_SESSION['id']) AND empty($_SESSION['cat'])){
                                echo 'href="#modal-sections'.$prod['id_prod'].'" uk-toggle ';
                            } else{ echo 'href="sign.php"';} ?>  ><i class="fas fa-cart-plus"></i><span>&nbsp; Ajouter au pannier</span></a></p>

                                    <div id="modal-sections<?=$prod['id_prod']?>" uk-modal>
                                        <div class="uk-modal-dialog">
                                            <button class="uk-modal-close-default" type="button" uk-close></button>
                                            <div class="uk-modal-header">
                                                <h2 class="uk-modal-title"><?=$namp ?></h2>
                                            </div>
                                            <div class="uk-modal-body">
                                            <p class="text-muted">Description:</p>
                                                <p class="text-muted"><?=$prod['descript'] ?>.</p>
                                                <p class="text-muted">Fournisseur:</p>
                                                <p class="text-muted"><?=$prod['nom_f'] ?>.</p>
                                                <form method="post">
                                            <input type="number" placeholder="Quantité" name="quantity<?=$id ?>" class="form-control" min="1" max="11" required>
                                            </div>
                                            
                                            <div class="uk-modal-footer uk-text-right">
                                                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                                <button class="btn btn-warning" name="add<?=$id ?>" type="submit">Add to card</button>
                                            </form>
                                            <?php
                                            $quantity='quantity'.$id;
                                            $op='add'.$id;
                                                if(isset($_POST[$op]) AND !empty($_POST[$quantity])){
                                                    $rowexist=$bdd->prepare('SELECT * FROM pannier WHERE id_user=? AND passee=0 AND id_prod=?');
                                                    $rowexist->execute(array($_SESSION['id'],$id));
                                                    $quanty=$rowexist->fetch();
                                                    $count=$rowexist->rowCount();
                                                    $prix=$prod['prix']*$_POST[$quantity];
                                                    if($count>0){
                                                        $select=$bdd->prepare('SELECT * FROM pannier WHERE id_prod=? AND id_user=?');
                                                        $select->execute(array($prod['id_prod'],$_SESSION['id']));
                                                        $new=$select->fetch();
                                                        $quant=$new['quantity'];
                                                        $quant=$quant+$_POST[$quantity];
                                                        $prix=$prix+$new['prix'];
                                                        $update=$bdd->prepare('UPDATE pannier SET quantity=?, prix=? WHERE id_prod=? AND id_user=?');
                                                        $update->execute(array($quant,$prix,$id,$_SESSION['id']));
                                                    }else{
                                                    $insert=$bdd->prepare('INSERT INTO pannier (id_prod ,id_user ,quantity, prix ,date_time) VALUES (?,?,?,?,NOW())');
                                                    $insert->execute(array($id,$_SESSION['id'],$_POST[$quantity],$prix));
                                                }
                                                $message='<div class="alert alert-success" role="alert">
                                                <h4 class="alert-heading">Ajouté!</h4>
                                                <p>L\'article <strong>'.$prod['nom_produit'].'</strong> a été ajouté.</p>
                                                <hr>
                                                <p class="mb-0">Merci de verifier votre Pannier.</p>
                                              </div>';
                                            }
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                            <p><span><i class="fas fa-dollar-sign"></i> <?=$prod['prix'] ?> Dhs</span><?php if($prod['cat']=='Fastfood'){ ?><span style="float:right"><?=$prod['ration']?> <i class="fas fa-users"></i> </span><?php }?></p>
                        </div>
                        
                </div>
            </div>
                            <?php }} else{?>
                                <div>
                <div class="uk-card uk-card-default uk-card-body" align="left" style="border-radius:20px;padding:10px">
                    
                        <div class="uk-card-media-top">
                            <img src="admin/produit/none.png" style="border-radius:10px;background:linear-gradient(180deg, rgba(255,215,0,0) 0%, rgba(255,215,0,0) 52%, rgba(0,0,0,0.39119397759103647) 100%)" alt="">
                        </div>
                        
                        
                </div>
            </div>
                            <?php }?>
        </div>
        </div>
</div>

<?php
include 'elements/footer.php';
?>