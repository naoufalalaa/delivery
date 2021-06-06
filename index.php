<?php
include 'controllers/connector.php';
include 'controllers/home.php';
$page='Home';
include 'elements/head.php';
include 'elements/navbarhome.php';
?>

<div class="uk-background-muted uk-padding uk-panel" style="z-index:11" id="services">


    <div class="uk-h2" align="center">Nos Services de Livraison</div>
    <hr class="uk-divider-icon">

    <div class="uk-child-width-1-4@m uk-grid-match" uk-grid="parallax: 100">
    <div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-media-top">
                    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: scale;autoplay: true">

                        <ul class="uk-slideshow-items">
                            <li>
                                <img src="assets/img/marjane.jpg" alt="" uk-cover>
                            </li>
                            <li>
                                <img src="assets/img/carrefour.jpg" alt="" uk-cover>
                            </li>
                            <li>
                                <img src="assets/img/aswakassala.jpg" alt="" uk-cover>
                            </li>
                            <li>
                                <img src="assets/img/bim.jpg" alt="" uk-cover>
                            </li>
                        </ul>

                        <a class="uk-position-center-left uk-position-small" href="#" style="color:#00284f" uk-slidenav-previous uk-slideshow-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small" href="#" style="color:#00284f" uk-slidenav-next uk-slideshow-item="next"></a>

                    </div>
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">SuperMarché</h3>
                    <p>On fait vos courses et on vous fait gagner du temps de deplacement plus charge de transport vers les grandes surfaces.</p>
                </div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-body">
                    <h3 class="uk-card-title">Médicaments</h3>
                    <p>Vu nos relation avec les pharmacies, votre medicament vous sera fourni en un non de temps.</p>
                </div>
                <div class="uk-card-media-bottom" style="padding-bottom:0px">
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" style="margin-top:50px" uk-slideshow="animation: scale" uk-slideshow="animation: scale; autoplay: true">

                    <ul class="uk-slideshow-items">
                    <li>
                            <img src="assets/img/medicament.jpg" alt="" uk-cover>
                        </li>
                        <li>
                            <img src="assets/img/pills.jpg" alt="" uk-cover>
                        </li>
                        <li>
                            <img src="assets/img/med.jpg" alt="" uk-cover>
                        </li>
                        <li>
                            <img src="assets/img/medd.jpg" alt="" uk-cover>
                        </li>
                    </ul>

                    <a class="uk-position-center-left uk-position-small" href="#" style="color:red" uk-slidenav-previous uk-slideshow-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small" href="#" style="color:red" uk-slidenav-next uk-slideshow-item="next"></a>

                </div>
                </div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-media-top">
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: scale;autoplay: true">

                    <ul class="uk-slideshow-items">
                    <li>
                            <img src="assets/img/legumes.jpg" alt="" uk-cover>
                        </li>
                        <li>
                            <img src="assets/img/potatos.jpg" alt="" uk-cover>
                        </li>
                        <li>
                            <img src="assets/img/fruits.jpg" alt="" uk-cover>
                        </li>
                        <li>
                            <img src="assets/img/fruit.jpg" alt="" uk-cover>
                        </li>
                    </ul>

                    <a class="uk-position-center-left uk-position-small" href="#" style="color:white" uk-slidenav-previous uk-slideshow-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small" href="#" style="color:white" uk-slidenav-next uk-slideshow-item="next"></a>

                </div>
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">Aliments bio</h3>
                    <p>Un paradis pour les Végétariens, des aliments en provenance de la source.</p>
                </div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-body">
                    <h3 class="uk-card-title">Fast food</h3>
                    <p>Vous n'avez pas le temps pour vous faire un plaisir, choisissez un des menus des géants du fast food.</p>
                </div>
                <div class="uk-card-media-bottom">
                <div class="uk-position-relative uk-visible-toggle uk-light" style="margin-top:50px" tabindex="-1" uk-slideshow="animation: scale;autoplay: true">

                    <ul class="uk-slideshow-items">
                        <li>
                            <img src="assets/img/starbucks.jpg" alt="" uk-cover>
                        </li>
                        <li>
                            <img src="assets/img/otacos.jpg" alt="" uk-cover>
                        </li>
                        <li>
                            <img src="assets/img/dominospizza.jpg" alt="" uk-cover>
                        </li>
                        <li>
                            <img src="assets/img/mcdonalds.jpg" alt="" uk-cover>
                        </li>
                        <li>
                            <img src="assets/img/quick.jpg" alt="" uk-cover>
                        </li>
                        <li>
                            <img src="assets/img/pizzahut.jpg" alt="" uk-cover>
                        </li>
                    </ul>

                    <a class="uk-position-center-left uk-position-small" href="#" style="color:#14350c" uk-slidenav-previous uk-slideshow-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small" href="#" style="color:#14350c" uk-slidenav-next uk-slideshow-item="next"></a>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" style="position:absolute;margin-top:40px;"  viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="1" d="M0,0L80,5.3C160,11,320,21,480,48C640,75,800,117,960,112C1120,107,1280,53,1360,26.7L1440,0L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
<div class="uk-background-secondary uk-padding uk-panel" style="padding-top:100px;z-index:0;top:150px; background-color:#f3f4f5" id="services">


    <div class="uk-h2 uk-dark" align="center">Fastfoods et Snacks</div>
    <hr class="uk-divider-icon">

    <div class="uk-child-width-1-4@m uk-grid-match" uk-grid="parallax: 100">
    <?php 
        $cat='Fastfood';
        $fournisseur=$bdd->prepare('SELECT * FROM fournisseur WHERE categorie=? ORDER BY date_ajout DESC');
        $fournisseur->execute(array($cat));
            while($f=$fournisseur->fetch()){
                $nom_f=$f['nom_fournisseur'];
                $description=$f['descript'];
        ?>
        <div>
        
            <div class="uk-card uk-card-default shadow" style="opacity:0.8">
                <div class="uk-card-media-top">
                    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: scale;autoplay: true">

                        <ul class="uk-slideshow-items">
                            <li>
                                <img src="admin/fournisseur/<?=$nom_f?>.jpg" uk-cover>
                            </li>
                            <?php
                            $i=1;
                            while($i<6){
                                $filename = 'admin/fournisseur/p'.$i.'.jpg';
                                if (file_exists($filename)){
                            ?>
                            <li>
                                <img src="admin/fournisseur/p<?=$i?>.jpg" alt="" uk-cover>
                            </li>
                                <?php } else{ $i++;} $i++;}?>
                        </ul>

                        <a class="uk-position-center-left uk-position-small" href="#" style="color:#00284f" uk-slidenav-previous uk-slideshow-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small" href="#" style="color:#00284f" uk-slidenav-next uk-slideshow-item="next"></a>

                    </div>
                </div>
                                        <div class="uk-card-body">
                                            <h3 class="uk-card-title"><?=$nom_f ?></h3>
                                            <p><?=$description?></p>
                                        </div>
            </div>
            
        </div><?php }?>
    </div>


    
</div>




<div class="uk-height-large uk-background-cover uk-light uk-flex uk-flex-top" uk-parallax="bgy: -300" style="background-image: url('assets/img/cover.jpg');">

    <h1 class="uk-width-1-2@m uk-margin-auto uk-margin-auto-vertical shadow" uk-parallax="x:-200px;y: 100,0"><img src="assets/img/deliveryWhi.png" width="400px" alt=""></h1>

</div>
<div class="uk-background-secondary uk-padding uk-panel" style="background-color:#f3f4f5;padding-top:100px;">
    <div class="uk-h2 uk-dark" align="center">SuperMarché</div>
    <hr class="uk-divider-icon">

    <div class="uk-child-width-1-4@m uk-grid-match" uk-grid="parallax: 100">
    <?php 
        $cat='Supermarche';
        $fournisseur=$bdd->prepare('SELECT * FROM fournisseur WHERE categorie=? ORDER BY date_ajout DESC');
        $fournisseur->execute(array($cat));
            while($f=$fournisseur->fetch()){
                $nom_f=$f['nom_fournisseur'];
                $description=$f['descript'];
        ?>
        <div>
        
            <div class="uk-card uk-card-default" style="opacity:0.8">
                <div class="uk-card-media-top">
                    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: scale;autoplay: true">

                        <ul class="uk-slideshow-items">
                            <li>
                                <img src="admin/fournisseur/<?=$nom_f?>.jpg" uk-cover>
                            </li>
                            <?php
                            $i=1;
                            while($i<6){
                                $filename = 'admin/fournisseur/'.$nom_f.'p'.$i.'.jpg';
                                if (file_exists($filename)){
                            ?>
                            <li>
                                <img src="<?=$filename?>" alt="" uk-cover>
                            </li>
                                <?php } else{ $i++;} $i++;}?>
                        </ul>

                        <a class="uk-position-center-left uk-position-small" href="#" style="color:#00284f" uk-slidenav-previous uk-slideshow-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small" href="#" style="color:#00284f" uk-slidenav-next uk-slideshow-item="next"></a>

                    </div>
                </div>
                                        <div class="uk-card-body">
                                            <h3 class="uk-card-title"><?=$nom_f ?></h3>
                                            <p><?=$description?></p>
                                        </div>
            </div>
            
        </div><?php }?>
    </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="1" d="M0,320L48,266.7C96,213,192,107,288,101.3C384,96,480,192,576,224C672,256,768,224,864,181.3C960,139,1056,85,1152,96C1248,107,1344,181,1392,218.7L1440,256L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>

<div class=" uk-child-width-expand@s text-muted uk-grid uk-visible@m" style="height:500px;border:0">
    
    
    <div align="center" class="uk-width-1-3" uk-parallax="x: 400;y:100">
<div class="uk-h1">On vous livre à tout moment</div>
    </div>
    <div align="center" class="uk-width-1-3" uk-parallax="y: 300;">
    <p>On est là pour vous rendre service, Contactez nous pour les services spéciaux.</p>

    </div>
    <div align="center" class="uk-width-1-3" uk-parallax="x: -400;y: 300">
    <img src="assets/img/car.png">

    </div>
</div>



<?php
include 'elements/footer.php';
?>