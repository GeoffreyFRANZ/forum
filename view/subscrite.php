  

<h1 class="text-center text-white m-4">Le Forum</h1>



<div id="connect" class="bg-dark d-flex flex-column align-middle m-auto col-sm-6">
    <h3 class="text-white m-2  text-center">inscription</h3>
<?php

if(  isset($_SESSION['erreur'])){ ?>
  <p class="text-danger p-1 text-center m-0"> <?php echo $_SESSION['erreur']; ?></p>
<?php } 
if(  isset($_SESSION['erreur']) && (time (  $_SESSION['erreur'] > 15 )) ){
 session_unset();
}
 
            if(  isset($_SESSION['pseudo_erreur'])  && (time (  $_SESSION['pseudo_erreur'] > 15 )) ){ ?>
                <p class="text-danger p-1 text-center m-0"> <?php echo $_SESSION['pseudo_erreur']; ?></p>
             <?php
             session_unset(); } 


              if(  isset($_SESSION['success']) && (time (  $_SESSION['success'] > 15 )) ){ ?>
                <p class="text-success p-1 text-center m-0"> <?php echo $_SESSION['success']; ?></p>
              <?php  session_unset(); } 
              
              
               
              if(  isset($_SESSION['password_erreur'])&& (time (  $_SESSION['password_erreur'] > 15 ))) { ?>
                <p class="text-danger p-1 text-center m-0"> <?php echo $_SESSION['password_erreur']; ?></p>
              <?php session_unset(); } 
                
?>
    <form action="?ctrl=Security&method=register" class="p-0" method="post">

        <div class=" w-100  d-flex justify-content-center m-2">
            <i class="  m-2 text-white fa fa-user"></i>
            <input type="email" class="text-white" name="email" id="email" placeholder="email">
        </div>
        <div class=" w-100  d-flex justify-content-center m-2">
            <input type="text" class="text-white" name="username" id="username" placeholder="username">
        </div>
        <div class="w-100  d-flex justify-content-center m-2">
            <i class=" m-2  text-white  fa fa-key"></i> <input class="" type="password" class="text-white" name="pass1" id="mdp" placeholder="pass1">
        </div>
        <div class="   m-auto d-flex justify-content-center m-2" >
         <input class="ml-5 " class="text-white" type="password" name="pass2" placeholder="pass2" id="confirm_password">
        </div>
        <div  class=" link d-flex align-midle justify-content-around " >
         <div id="divRemember" class="mt-2"><input type="checkbox" class="ml-4 text-white" name="remember" id="remember"> <label class="text-white" for="remember"> se souvenir de moi </label></div>
          <a class="nav-link text-white mr-4" href="#">pas encore inscrit ? </a>
         </div>
        <div class="justify-content-center d-flex"> 
            <input id="connectValider" type="submit" value="Valider">
        </div>
    </form>

</div>


