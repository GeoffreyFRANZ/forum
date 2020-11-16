<?php



App\Session::getUser();






?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="public/style.css">
</head>

<body>

  <nav class="navbar navbar-dark bg-dark">
    <a style="width: 5%;" href="?ctrl=Home&method=index"><img width="100%" class="m-2" src="public/image/logo.png" alt=""></a>

    <?php if( isset($_SESSION['user']) AND $_SESSION['user']->getRang() === '1' ) { ?>

      <a href="?ctrl=Home&method=panneauAdmin"> panneau administrateur</a>
    <?php } ?>
    <a href="?ctrl=Home&method=listUtilisateur"> utilisateur</a>

    <div class="d-flex flex-row">
     
        <?php  if(app\Session::getUser()) { ?>
          <a href="?ctrl=Home&method=connectedUser" class="nav-link text-white d-flex  justify-content-center"> <img class="pr-3 imgProfile" src="<?= App\Session::getUser()->getAvatar() ?>" alt="">
        </a>
          <p class="p-2 text-white "><?php echo app\Session::getUser()->getPseudo() ?></p>
          <a href="?ctrl=Security&method=logout" class="nav-link text-white pt-2"> se déconnecter </a>
          <?php } else { ?>
            <a class="nav-link text-white" href="?ctrl=Security&method=login"> <i class="fa fa-key"></i> se connecter</a>
            <a class="nav-link text-white" href="?ctrl=Security&method=register"> <i class="fa fa-key"></i> s'inscrire</a>
        <?php  } ?>
     
          </div>
  </nav>


  <main >


    <div class="mb-5 pb-5 " >

      <?=

        $page;
      ?>
    </div>

  </main>




  <footer class="  navbar fixed-bottom d-flex justify-content-around  navbar-dark bg-dark">

    <ul class="nav d-flex  text-center justify-content-center ">
      <h3 class="w-100 text-white  ">rejoignez nous</h3>
      <li class="nav-item"><a href="#" class="nav-link"> <i class="fab  text-white fa-facebook-square"></i> </a></li>
      <li class="nav-item"><a href="#" class="nav-link"><i class="fab   text-white fa-twitter-square"></i></a></li>
      <li class="nav-item"><a href="#" class="nav-link"> <i class="fab  text-white fa-discord"></i> </a></li>
    </ul>
    <div class="text-white text-sm font-italic d-flex justify-content-around ">
      <p>mentions legal</p>
      <p>crédit</p>
    </div>
  </footer>


</body>
<script src="public/search.js"></script>
</html>