<?php
session_start();
if(empty($_SESSION['id']) OR isset($_SESSION['cat'])){
    header('location: connect.php');
}
else{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=delivery', 'root', '');
    $getid=$_GET['id'];
    $requser = $bdd->prepare("SELECT * FROM user WHERE id= ?");
      $requser->execute(array($getid));
      $userexist = $requser->rowCount();
    if($userexist==1){
       
    $userinfo=$bdd->prepare('SELECT * FROM user WHERE id=?');
    $userinfo->execute(array($getid));
    $user=$userinfo->fetch();
    $name=$user['prenom']." ".$user['nom'];
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

    $comm=$bdd->prepare('SELECT * FROM commandes WHERE id_user=? LIMIT 5 ORDER BY id DESC');
    $comm->execute(array($getid));
    $all=$comm->fetch();
    $nouveau=$bdd->query('SELECT * FROM produits ORDER BY id_prod DESC');
    $nrowsp=$bdd->query('SELECT COUNT(*) FROM produits ORDER BY id_prod DESC')->fetchColumn();
    $panniers=$bdd->prepare('SELECT * FROM pannier WHERE id_user=? ORDER BY id_pannier DESC');
    $panniers->execute(array($_SESSION['id']));

?>
<?php
$page=$name;
include 'elements/head.php';
include 'elements/navbar.php';
?>

    
<br>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="position:absolute;top:0px"><path fill="#F3F4F5" fill-opacity="1" d="M0,128L720,224L1440,128L1440,0L720,0L0,0Z"></path></svg>

<div class="uk-grid-divider uk-child-width-expand@s text-muted" style="margin-top:50px" uk-grid="parallax: 300">
    <div align="center">
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
        </li>
    </ul>
    <?php
        if($getid==$_SESSION['id']){
    ?>
    <div align="right">
    <a href="modify.php?id=<?=$_SESSION['id'] ?>" class="btn btn-light"><i class="fas fa-user-edit"></i></a></div>
        <?php }?>

    </div>
    <div align="center">
    <h1 class="uk-text-lead">Historique Commandes <span class="uk-label uk-label-success"><?=$commandes?></span>
        </h1>
        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Prise?</th>
      <th scope="col">Produit</th>
      <th scope="col">Quantité</th>
      <th scope="col">Date heure</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $commande=$bdd->prepare('SELECT * FROM commandes WHERE id_user=? AND terminer=0');
    $commande->execute(array($_SESSION['id']));
    while($co=$commande->fetch()){
    $pannierr=$bdd->query('SELECT * FROM pannier WHERE id_pannier='.$co['id_pannier']);
    $pa=$pannierr->fetch();
    $produit=$bdd->query('SELECT * FROM produits WHERE id_prod='.$pa['id_prod']);
    $prod=$produit->fetch();
    $time=strtotime($co['date_time_commande']);
    if($co['prendre']==1){
        echo'<tr class="alert alert-info">';}else{
  ?>
    <tr><?php }?>
      <th scope="row" align="center"><?php if($co['prendre']==0){ echo'<i style="color:red; font-size:30px" class="far fa-clipboard"></i>';}else{ echo'<i style="color:green; font-size:30px" class="fas fa-clipboard-check"></i>';} ?></th>
      <td><?=$prod['nom_produit'] ?></td>
      <td><?=$pa['quantity'] ?></td>
      <td><?=date("d M à H:I") ?></td>
    </tr>
        <?php }?>
  </tbody>
</table>


    </div>
    <div align="center">
        <h1 class="uk-text-lead">Les nouveautés</h1>
        <div class="uk-child-width-1-2@s uk-grid-match" uk-grid>
            <?php
            if($nrowsp>0){
            while($nv=$nouveau->fetch()){
                ?>
                
                <div class="uk-text-center">
                    <a href="produit.php?id_prod=<?=$nv['id_prod'] ?>"><div class="uk-inline-clip uk-transition-toggle" tabindex="0">
                        <img src="admin/produit/<?=$nv['id_prod'] ?>.jpg" alt="">
                        <div class="uk-transition-fade uk-position-cover uk-position-small uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle">
                            <p class="uk-h4 uk-margin-remove"><?=$nv['nom_produit'] ?></p>
                            <p class="uk-h6 uk-margin-remove"><?=$nv['prix'] ?> Dh</p>
                        </div>
                    </div></a>
                </div>
            <?php }}?>
            </div>

    </div>
</div>





</body>
    <div class="uk-background-muted uk-padding uk-panel inc" style="margin-bottom: -55px;top: 0px;height:150px;z-index:10"><div class="uk-h1">OUR ACTIVITY</div></div>

    <div class="mapouter">
        <div class="gmap_canvas">
            <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=marrakech&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
                <style>
                .mapouter{position:relative;text-align:right;height:400px;width:100%;}
                .gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}
                </style>
    </div>

    <div class="uk-card-secondary uk-padding uk-panel inc" style="z-index:100;margin-top:-100px;top:50px;padding-bottom:100px;box-shadow:none"><div class="uk-h1" align="right">IS ON MARRAKECH</div></div>

    <div class="uk-card-secondary uk-padding uk-panel" id="contact" style="z-index:10;padding-top:50px">
            <div class="uk-section">
                <div class="uk-container">
                    <h3>À propos</h3>

                    <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
                    <div style="width:345px; height:89px">
                    <img src="assets/img/deliveryWhi.png" >
                    </div>
                    <div>
                        <p>D-delivery est une entreprise créer par une jeune entrepreneur Marocaine Alaa DUNIA, ce projet a pour but de limiter les deplacements des gens quelle qui soient leurs conditions.</p>
                    </div>
                    <div>
                    <ul class="uk-list uk-list-divider">
                        <li><a href="" uk-icon="icon: facebook"></a> naoufal alaa</li>
                        <li><a href="" uk-icon="icon: instagram"></a> naoufal_alaa</li>
                        <li><a href="" uk-icon="icon: whatsapp"></a> +212 0000000</li>
                    </ul>
                    </div>
                </div>

            </div>
        </div>
        <a href="contact.php"><div class="uk-card-primary uk-padding uk-panel" align="center"style="background-color:#d69d00">
        copyright &copy; 2019: Naoufal Alaa
        </div></a>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.7/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</html>
            <?php }
else{
    header('location: profil.php?id='.$_SESSION['id']);
}}?>