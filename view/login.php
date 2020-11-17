

<?php
if(App\Session::getUser()){
    echo "<h2>Vous êtes déjà connecté sous le nom ".App\Session::getUser()."</h2>";
}

?>


<h1 class="text-center text-white m-4">Le Forum</h1>

<div id="connect" class="bg-dark d-flex flex-wrap flex-column align-middle m-auto col-sm-6">
    <h3 class="text-white m-2 text-center">se connecter</h3>
    <?php

    if (isset($_SESSION['erreur_email']) && (time (  $_SESSION['erreur_email'] > 15 ))  ) { ?>
      <p class="text-danger p-1 text-center m-0" > <?php echo $_SESSION['erreur_email']; ?> </p>

   <?php unset($_SESSION['erreur_email']); }

if(isset(  $_SESSION['erreur_password']) && (time (  $_SESSION['erreur_password'] > 15 )) ) { ?>
<p class="text-danger p-1 text-center m-0" > <?php echo $_SESSION['erreur_password']; ?> </p>
   <?php unset($_SESSION['erreur_password']); } 

   if(isset(  $_SESSION['succes']) && (time (  $_SESSION['succes'] > 15 )) ) { ?>
<p class="text-success p-1 text-center m-0" > <?php echo $_SESSION['succes']; ?> </p>
   <?php unset($_SESSION['succes']); } ?>

    <form action="?ctrl=Security&method=login" method="post">

        <div class=" w-100  d-flex justify-content-center m-2">
            <i class="  m-2 text-white fa fa-user"></i>
            <input type="text" name="username" id="email" placeholder="email">
        </div>
        <div class="w-100  d-flex justify-content-center m-2">
            <i class=" m-2  text-white  fa fa-key"></i> <input class="" type="password" name="password" id="mdp" placeholder="mot de passe">
        </div>

        <div class=" link d-flex align-midle justify-content-around ">
            <div id="divRemember" class="mt-2"><input type="checkbox" class="ml-4" name="remember" id="remember"> <label class="text-white" for="remember"> se souvenir de moi </label></div>
            <a class="nav-link text-white mr-4" href="#">pas encore inscrit ? </a>
        </div>
        <div class="justify-content-center d-flex">
            <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>" >
            <input id="connectValider" class="connectValider" type="submit" value="Valider">
        </div>
    </form>
   
</div>