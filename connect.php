<?php
session_start();
if(!empty($_SESSION['id']) AND empty($_SESSION['cat'])){
    header('location: profil.php?id='.$_SESSION['id']);
}
elseif(isset($_SESSION['cat'])){
    header('location: admin/profile.php?id='.$_SESSION['id']);

}
else{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=delivery', 'root', '');
    if(isset($_POST['login'])){
        $id=$_POST['identifiant'];
        $password=md5($_POST['password']);
        $connect=$bdd->prepare('SELECT * FROM user WHERE (email=? OR phone=?) AND password=?');
        $connect->execute(array($id,$id,$password));
        $user=$connect->fetch();
        $userexist = $connect->rowCount();
        if($userexist == 1) {
        $_SESSION['id']=$user['id'];
        header('location: profil.php?id='.$_SESSION['id']);
}

    else{
        $message='<div class="alert alert-danger">Mauvais mail ou mot de passe !</div>';
    }
}
    
?>
<!DOCTYPE html>
<html lang="en" style="word-wrap: break-word;scroll-behavior:smooth;">
<head>
    <meta charset="UTF-8">
    <title>DELIVERY - Home</title>
    <link rel="icon" type="png" href="assets/img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.7/css/uikit.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body bgcolor="#F8F8F8">
    <div >
<svg style="position:absolute" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e6e6e6" fill-opacity="1" d="M0,320L48,304C96,288,192,256,288,202.7C384,149,480,75,576,64C672,53,768,107,864,128C960,149,1056,139,1152,117.3C1248,96,1344,64,1392,48L1440,32L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
</div>
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
                   <li class="uk-nav-header"><a href="#agence">À propos</a></li>
                   <li class="uk-nav-divider"></li>
                   <li class="uk-nav-header">Nourriture</li>
                   <li><a href="fatsfood.php">Fast Food</a></li>
                   <li><a href="legumefruit.php">Légumes et Fruits</a></li>
                   <li><a href="viande.php">Viandes</a></li>
                   <li class="uk-nav-divider"></li>
                   <li class="uk-nav-header"><a href="medicament.php">Médicaments</a></li>
                   <li class="uk-nav-divider"></li>
                   <li class="uk-nav-header"><a href="contact.php">Contact</a></li>
                   
                   <li class="uk-nav-divider"></li>
               
               
               <li>
                <a href="connect.php"><i class="fas fa-users"></i>&nbsp; Login</a>
            </li>
            <li>
                <a href="sign.php"><i class="fas fa-sign-in-alt"></i>&nbsp; S'inscrire</a>
            
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
                        <li><a href="index.php/#agence">À propos</a></li>
                        <li>
                            <a href="#">Nourriture</a>
                            <div class="uk-navbar-dropdown">
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li><a href="fastfood.php">Fast Food</a></li>
                                    <li><a href="legumefruit.php">Fruits et Légumes</a></li>
                                    <li><a href="viande.php">Viandes</a></li>
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
        <div style="border-left:1px grey solid;height:50px;margin-top:12px;opacity:0.5"></div>
                <div class="uk-navbar-right">

                <ul class="uk-navbar-nav">
                    <li class="uk-active">
                        <a href="connect.php"><i class="fas fa-users"></i>&nbsp; Login</a>
                    </li>
                    <li>
                        <a href="sign.php"><i class="fas fa-sign-in-alt"></i>&nbsp; S'inscrire</a>                
                    </li>
                </ul>
            </div>
                        </ul>
                    </div>
                </nav>
        </div>

    <!--navbar-->
<!--navbar-->

<?php 
    if(isset($message)){
        echo $message;
    }
?>
<div>
<form method="post" class="needs-validation p-5" align="center" novalidate>
<p class="h4 mb-4">WELCOME BACK!</p>
  <div class="form-row mb-4 d-flex justify-content-center">
    <div class="col-md-3">
      <input name="identifiant" type="text" class="form-control" id="validationCustom01" placeholder="E-mail, téléphone.." required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-3">
      <input name="password" type="password" class="form-control" id="validationCustom01" placeholder="Password.." required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
  
  <div class="d-flex justify-content-center">
  <button name="login" class="btn btn-light my-4 btn-block col-md-3 d-flex justify-content-center" style="background-color:#e6e6e6" type="submit">Login</button></div>
   <!-- Social register -->
   <p>or contact us on:</p>

<a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f"></i></a>
<a href="#" class="mx-2" role="button"><i class="fab fa-twitter"></i></a>
<a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in "></i></a>
<a href="#" class="mx-2" role="button"><i class="fab fa-github"></i></a>

<hr>

<!-- Terms of service -->
<p>By clicking
    <em>Sign up</em> you agree to our
    <a href="" target="_blank">terms of service</a>

</form>

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
<div class="uk-background-muted uk-padding uk-panel inc" style="background-color:white; margin-bottom: -55px;top: 0px;height:150px;z-index:10">
    <div class="uk-h1">OUR ACTIVITY</div></div>

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
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
            <?php }?>