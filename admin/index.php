<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=delivery', 'root', '');
if(!empty($_SESSION['id']) AND !empty($_SESSION['cat'])){
    header('Location: profile.php?id='.$_SESSION['id']);
}
else{
if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = $_POST['mdpconnect'];
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM administrateur WHERE email = ? AND password = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['cat'] = 'admin';
         $_SESSION['prenom'] = $userinfo['prenom'];
         $_SESSION['nom'] = $userinfo['nom'];
         $_SESSION['pseudo']= $userinfo['pseudo'];
         $_SESSION['email'] = $userinfo['email'];
         header('Location: profile.php?id='.$_SESSION['id']);
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">
<head>
  <title>Accès Administrateur</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="png" href="/gharad/assets/img/icone.png">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.2/css/uikit.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.2/js/uikit.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.2/js/uikit-icons.min.js"></script>

</head>
<?php
include '../loader.php';
?>
<body style="scroll-behavior: smooth; background-color: rgb(242, 242, 242);">




<br>


<?php
         if(isset($erreur)) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Mot de passe ou identifant non valide</strong> Réessayez avec des identifiants valides!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
         }
         ?>

<div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
	<div class="uk-width-1-1">
		<div class="uk-container">
			<div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
				<div class="uk-width-1-1@m">
					<div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
						<h3 class="uk-card-title uk-text-center">Welcome back!</h3>
						<form method="post">
							<div class="uk-margin">
								<div class="uk-inline uk-width-1-1">
									<span class="uk-form-icon" uk-icon="icon: mail"></span>
									<input class="uk-input uk-form-large" type="email" placeholder="Enter email" name="mailconnect" required>
								</div>
							</div>
							<div class="uk-margin">
								<div class="uk-inline uk-width-1-1">
									<span class="uk-form-icon" uk-icon="icon: lock"></span>
									<input class="uk-input uk-form-large" type="password" placeholder="Enter password" name="mdpconnect" required>	
								</div>
							</div>
							<div class="uk-margin">
								<button class="uk-button uk-button-primary uk-button-large uk-width-1-1" type="submit" name="formconnexion">Login</button>
							</div>
							<div class="uk-text-small uk-text-center">
								Vous ne pouvez pas vous connecter? <a href="../contact.php">Contactez votre Administrateur</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

















</body>
</html>
        <?php } ?>