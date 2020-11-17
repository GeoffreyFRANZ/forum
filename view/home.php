<?php

use Model\Manager\TopicManager;
use Model\Manager\MessageManager;
use Model\Manager\UtilisateurManager;

$sujet =  new TopicManager();
$countMessage = new MessageManager();
$utilisateur =  new  UtilisateurManager();



?>


<form class="my-lg-3" method="GET" action="index.php">
  <input id="search" class="form-control mr-sm-2 bg-dark text-white" name="search" type="search" placeholder="Search" aria-label="Search">
</form>
<?php if (isset($_GET['search'])) {

  foreach ($data["result"] as $result) { ?>

    <div class="w-100  ">
      <p class="text-white"><?php echo $result->getNomTopic();  ?></p>
    </div>
<?php }
}
?>
<div class=" d-flex flex-wrap m-1 ">
  <h1  class="text-center text-white w-100 m-3">Le Forum</h1>
  <div class="allCat"  >

    <?php
    foreach ($data['categories'] as $cat) {
 
      $id = $cat->getId();
      $sujetByCat  = $sujet->findOneByLimite($id);
    ?>
      <div class="bg-dark d-flex flex-wrap flex-column align-middle ml-auto mr-auto  mt-3 w-75">

        <h2 class="text-white p-3 text-center"><a href='?ctrl=Forum&method=allTopicsByCat&id=<?= $id ?>'><?php echo $cat->getNomCategorie(); ?></a> </h2>

        <?php foreach ($sujetByCat as $s) {
          $count =  $countMessage->countMessageBySujet($s->getId());
          $userId = $s->getUserId();


        ?>
          <div class="d-flex m-2 justify-content-between align-items-center ">
            <a class="d-flex align-items-center" href="?ctrl=Forum&method=allMessageBySujet&id=<?= $s->getId() ?>"> <i class="fas text-white pr-3 mb fa-3x fa-clipboard-list"></i>
              <p class="text-white"> <?php echo $s->getNomTopic(); ?></p>
            </a>

            <?php
            if (empty($count)) {
            ?>
              <p class="text-white"><?php echo  0; ?> réponse </p>

            <?php } else {  ?>
              <p class="text-white"><?php echo  $count[0]['countMessage']  ?> réponses </p>
            <?php } ?>
            <p class="text-white"><?php echo $utilisateur->findOneById($userId)->getPseudo() ?></p>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
  <aside>
    <div class="bg-dark m-1">
      <h4 class="text-white m-0 text-center  p-3">derniers membres inscrit</h4>

      <?php
       
      foreach ($data["inscrit"] as $inscrit) { ?>

        <div class="d-flex align-items-center"> <img class=" imgProfile p-2" src="<?= $inscrit->getAvatar() ?>" alt="coucou">
          <p class="text-white"><?php echo $inscrit->getPseudo() ?></p>
        </div>

      <?php  } ?>
    </div>
    <div class="m-1 p-2 bg-dark">
      <h4 class="text-white text-center">Top Sujet</h4>
      <div class="d-flex justify-content-between">
        <p class="text-white"><?php echo    $sujet->findBy($data['count'][0]['sujetId'])->getNomTopic() ?> </p>
        <p class="text-white"><?php echo $data['count'][0]['countMessage'];  ?> messages </p>
      </div>
      <div class="d-flex justify-content-between">
        <p class="text-white"><?php echo    $sujet->findBy($data['count'][1]['sujetId'])->getNomTopic() ?> </p>
        <p class="text-white"><?php echo   $data['count'][1]['countMessage'];  ?> messages </p>
      </div>
      <div class="d-flex justify-content-between">
        <p class="text-white"><?php echo    $sujet->findBy($data['count'][2]['sujetId'])->getNomTopic() ?> </p>
        <p class="text-white"><?php echo  $data['count'][2]['countMessage'];  ?> messages </p>
      </div>

    </div>
    <div class="d-flex flex-wrap m-1 bg-dark ">
      <h4 class="text-white text-center w-100 p-2 ">derniers messages postés</h4>

      <?php foreach ($data['message'] as $msg) {

        $dateMessage = new DateTime($msg->getDateMessage()) ?>

        <div class="p-2 text-white w-100 d-flex flex-wrap justify-content-around">
          <p class="w-100 text-justify p-2 " ><?php echo $msg->getCorpMessage() ?></p>
          <p><?php echo $utilisateur->findOneById($msg->getUserId())->getPseudo() ?></p>
          <p><?php echo date_format($dateMessage, 'd/m/Y') ?></p>
        </div>

      <?php  } ?>
    </div>
    <div class="d-flex flex-wrap m-1 bg-dark ">
      <h4 class="text-white w-100 text-center p-2">Statistique</h4>

        <p class="text-white w-100 text-center"> <?php echo  $data['userCount'][0]['countUtilisateur']  ?>  Utilisateurs inscrit </p>
        <p class="text-white w-100 text-center">  <?php echo $data['messageCount'][0]['countMessage'] ?> messages  posté</p>
        <p class="text-white w-100 text-center">  <?php echo $data['sujetCount'][0]['countSujet'] ?> sujets crée</p>
        

    </div>
  </aside>
</div>