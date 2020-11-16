<?php
use model\Manager\UtilisateurManager;
?>
<?php
$userMan = new UtilisateurManager();



?>
    <h1 class="text-white text-center m-3 "><?php echo $data['titre']->getNomTopic() ?></h1>

<p class="w-100 text-white text-center text-justify "><?php echo $data['titre']->getCorpSujet() ?></p>
    <?php


    foreach ($data['msg'] as $msg) {
        $user =  $userMan->findOneById($msg->getUserId());
        // $id = $msg->getId() 
    

    
    ?>


        <div class="d-flex justify-content-center">
            <div class="w-75 bg-dark mt-2 ">

                <img class=" p-1 m-2 imgProfile" src="<?= $user->getAvatar() ?>" alt="image de profile">
                <span class="text-white"><?php echo $user->getPseudo() ?></span>
                <p class="text-white p-2 text-justify "><?php echo $msg->getCorpMessage()  ?>
            </div>
            <?php if (isset($_SESSION['user']) and $user->getEmail() === $_SESSION['user']->getEmail() OR isset($_SESSION['user']) AND $user->getRang() < 3 ) { ?>
                <a href="?ctrl=forum&method=formulaireModifMessage&id=<?= $msg->getId() ?>"><i class="fas fa-pen  p-2 text-white"></i></a>
                <a href="?ctrl=forum&method=deleteMessage&id=<?= $msg->getId() ?>"><i class="fas fa-times text-danger"></i></a> </p>
            <?php }?>
        </div> <?php
            
        } ?>

<?php if (isset($_SESSION['user']) and $data['titre']->getStatut() === '0') { ?>
    <form action="?ctrl=forum&method=addMessage&id=<?= $_GET['id'] ?>" class="d-flex m-4 align-items-center flex-column" method="post">
        <textarea class="m-1" name="message" placeholder="afin  de garder un forum agréable merci de rester  courtois" id="" cols="30" rows="10"></textarea>
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>" >
        <input type="submit" class="tranform-translate" value="envoyer">
    </form>
<?php } ?>