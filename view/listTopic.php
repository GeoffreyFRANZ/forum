<?php

use Model\Manager\UtilisateurManager;
use model\Manager\MessageManager;

$messageMan =  new MessageManager();
$userMan = new UtilisateurManager(); ?>




<?php

$titre =  $data['titre']; ?>
<h1 class=" text-center higest text-white"><?php echo $titre->getNomCategorie() ?></h1>



<?php
foreach ($data['topic'] as $topics) {

  $utilisateur = $userMan->findOneById($topics->getUserId());
  $count =  $messageMan->countMessageBySujet($topics->getId())
?>
  <div class="mr-auto  ml-auto w-75 ">
    
    <div class="nav-item d-flex flex-row justify-content-center ">
      <?php if ($topics->getStatut() == 1) { ?>
      
        <i class="  text-danger fas fa-lock"></i>
      
      <?php } ?>

      <div class="bg-dark  bd-highlight  d-flex flex-row w-75  ">
        <a class="nav-link text-white flex-fill bd-highlight" href="?ctrl=Forum&method=allMessageBySujet&id=<?= $topics->getId() ?>"><?php echo $topics->getNomTopic(); ?></a>
        <p class="text-white nav-link flex-fill bd-highlight "><?php if (empty($count)) {
          echo  $count = 0;
        } else {
          echo $count[0]['countMessage'];
        }   ?> réponse</p>


<p class="text-white flex-fill bd-highlight nav-link"><?php echo $utilisateur->getPseudo() ?></p>
</div>

<?php if (isset($_SESSION['admin']) ||  isset($_SESSION['moderateur'])) { ?>
  <div><a href="?ctrl=forum&method=modifTopic&id=<?= $topics->getId() ?>"><i class="fas fa-pen small m-1 text-white"></i> </a>
  <a href="#"><i class="fas fa-times  m-1 text-danger"></i></a></div>
  <?php } ?>
  
</div>
    <div>
    </div>

  </div>

<?php   }  ?>


<?php if (isset($_SESSION['user'])) { ?>

  <form action="?ctrl=forum&method=addTopics&id=<?= $_GET['id'] ?>" class="d-flex align-items-center flex-column mb-4" method="post">
    <input class="m-1" placeholder="titre de votre sujet" name="topic" type="text">
    <textarea class="m-1" name="corpTopic" placeholder="afin  de garder un forum agréable merci de rester  courtois" id="" cols="30" rows="10"></textarea>
    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>" >
    <input type="submit" class="tranform-translate" value="envoyer">
  </form>
<?php }  ?>