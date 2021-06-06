<?php
session_start();
if(empty($_SESSION['id']) OR empty($_SESSION['cat'])){
    header('location: index.php');
}
else{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=delivery', 'root', '');
    
       
    $admininfo=$bdd->prepare('SELECT * FROM administrateur WHERE id=?');
    $admininfo->execute(array($_SESSION['id']));
    $admin=$admininfo->fetch();
    $name=$admin['nom'].' '.$admin['prenom'];
    $email=$admin['email'];
    $profil='../assets/img/young.png';
    if(isset($_POST['add'])) {
        if(!empty($_POST['nomprod']) AND !empty($_POST['produit_descript']) AND !empty($_POST['prix'])) {
           $ration=htmlspecialchars($_POST['ration']);
           $produit_titre = ucfirst(htmlspecialchars($_POST['nomprod']));
           $produit_descripion = ucfirst(htmlspecialchars($_POST['produit_descript']));
           $produit_prix = htmlspecialchars($_POST['prix']);
           $produit_fournisseur = ucfirst(htmlspecialchars($_POST['produit_four']));
            $cat=$bdd->prepare('SELECT * FROM fournisseur WHERE nom_fournisseur=?');
            $cat->execute(array($produit_fournisseur));
            $categorie=$cat->fetch();
            $cate=$categorie['categorie'];
           $ins = $bdd->prepare('INSERT INTO produits (nom_produit,nom_f,cat, descript,ration, prix, date_ajout) VALUES (?,?,?,?,?,?, NOW())');
           $ins->execute(array($produit_titre,$produit_fournisseur,$cate, $produit_descripion,$ration ,$produit_prix));
            $lastid=$bdd->lastInsertId();
     
           $message = '<div class="alert alert-success" role="alert\>
           <h4 class="alert-heading">produit posté!</h4>
           <p>Votre produit <strong><i>'.ucfirst($produit_titre).'</i></strong> a bien été mis en ligne par Vous</p>
           </div>';
            $valid=1;
     
     
     
           if(isset($_FILES['produit']) AND !empty($_FILES['produit']['name'])) {
             if(exif_imagetype($_FILES['produit']['tmp_name']) == 2) {
                $chemin = 'produit/'.$lastid.'.jpg';
                move_uploaded_file($_FILES['produit']['tmp_name'], $chemin);
             } else {
                $message = 'Votre image doit être au format jpg';
             }
          }
          $i=1;
          while($i<=5){
          if(isset($_FILES['p'.$i.'']) AND !empty($_FILES['p'.$i.'']['name'])) {
             if(exif_imagetype($_FILES['p'.$i.'']['tmp_name']) == 2) {
                $chemin = 'produit/'.$lastid.'p'.$i.'.jpg';
                move_uploaded_file($_FILES['p'.$i.'']['tmp_name'], $chemin);
             } else {
                $message = 'Votre image doit être au format jpg';
             }
          }
          $i++;
         }
        }
        
        else {
           $message = '<div class="alert alert-warning alert-dismissible fade show w-50" role="alert">
           <strong>Tous les champs ne sont pas remplit</strong> Veuillez remplir tous les champs!
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>';
         $valid=0;
        }
     }

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
                   <li class="uk-nav-header"><a href="#agence">À propos</a></li>
                   <li class="uk-nav-divider"></li>
                   <li class="uk-nav-header">Nourriture</li>
                   <li><a href="../fatsfood.php">Fast Food</a></li>
                   <li><a href="../legumefruit.php">Légumes et Fruits</a></li>
                   <li><a href="../viande.php">Viandes</a></li>
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
                        <li><a href="../index.php/#agence">À propos</a></li>
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
    </ul>
        <div align="right">
            <a href="modify.php?id=<?=$_SESSION['id'] ?>" class="btn btn-light"><i class="fas fa-user-edit"></i></a>
        </div>
        <button class="uk-button uk-button-default uk-margin-small-right" type="button" uk-toggle="target: #offcanvas-nav-primary"><span uk-icon="menu"></span> Actions</button>


            <div id="offcanvas-nav-primary" class="uk-dark" uk-offcanvas="overlay: true" align="left">
                <div align="left" class="uk-offcanvas-bar uk-flex uk-flex-column">

                    <ul class="uk-nav uk-nav-primary uk-margin-auto-vertical" align="left">
                        <li><a href="profile.php?id=<?=$_SESSION['id'] ?>">Acceuil</a></li>
                        <li class="uk-parent uk-active">
                            <a href="#"><span uk-icon="chevron-right"></span> Actions</a>
                            <ul class="uk-nav-sub">
                                <li class="uk-active"><a href="ajouterprod.php"><span uk-icon="plus"></span> Ajouter Produit</a></li>
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


        
    </div>
    <div align="center" class="uk-width-expand@m">
        <?php
            if(isset($message)){
                echo $message;
            }
        ?>
        <h1 class="uk-text-lead">Nouveau produit <span class="uk-label uk-label-success"></span></h1>
        <div>
            <form method="post" class="needs-validation p-5" align="center" novalidate enctype="multipart/form-data">
            <div class="form-row mb-4 d-flex justify-content-center">
                <div class="col-md-6">
                <input name="nomprod" type="text" class="form-control" id="validationCustom01" placeholder="Nom du Produit" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                </div>
            </div>
            <div class="form-row mb-4 d-flex justify-content-center">
            <div class="col-md-3">
                <input name="prix" type="text" class="form-control" id="validationCustom01" placeholder="Prix du Produit" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <select name="produit_four" class="form-control" id="" placeholder="Fournisseur" required>
                    <?php
                        $four=$bdd->query('SELECT * FROM fournisseur ORDER BY nom_fournisseur');
                        while($f=$four->fetch()){
                    ?>
                    <option value="<?=$f['nom_fournisseur'] ?>"><?=$f['nom_fournisseur'] ?></option>
                        <?php }?>
                </select>
                <div class="invalid-feedback">
                Please provide a valid answer.
                </div>
            </div>
            </div>
            <div class="form-row mb-4 d-flex justify-content-center">
            <div class="col-md-3">
                <textarea name="produit_descript" class="form-control" id="validationCustom01" placeholder="Description du Produit" required></textarea>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <input name="ration" type="text" class="form-control" id="validationCustom01" placeholder="Combien de personnes peuvent manger" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            </div>
            <br>
            <ul class="uk-list uk-list-divider">
                <li>Image 1 <input name="produit" type="file" required></li>
                <li>Image 2 <input name="p1" type="file"></li>
                <li>Image 3 <input name="p2" type="file"></li>
                <li>Image 4 <input name="p3" type="file"></li>
                <li>Image 5 <input name="p4" type="file"></li>
                <li>Image 6 <input name="p5" type="file"></li>
            </ul>
            
            <div class="d-flex justify-content-center">
            <button name="add" class="btn btn-light my-4 btn-block col-md-3 d-flex justify-content-center" style="background-color:#e6e6e6" type="submit">Ajouter l'article</button></div>
            </form>

        </div>
    </div>
    
</div>


<script>

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>




</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.7/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.7/js/uikit-icons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</html>
<?php 
}

?>