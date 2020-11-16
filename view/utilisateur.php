<?php $inscription = new DateTime($_SESSION['user']->getInscription()) ?>




<div class="bg-dark w-80 d-flex flex-wrap justify-content-between align-middle ml-auto mr-auto mt-3 ">
    <div class="d-flex flex-wrap">
        <img class="img" src="<?= $_SESSION['user']->getAvatar() ?>" alt="photo de profil"> <a href="?ctrl=home&method=formChangeImg&id=<?= $_SESSION['user']->getid() ?>"><i class="fas fa-pen  p-2 text-white"></i></a>

        <div class="ml-3">
            <h3 class="text-white"><?php echo $_SESSION['user']->getPseudo() ?><a href="?ctrl=home&method=formPseudo&id=<?= $_SESSION['user']->getid() ?>"><i class="fas fa-pen small p-2 text-white"></i></a></h3>
            <p class="text-white">à rejoint le  <?php echo  date_format($inscription, 'd/m/Y') ?> </p>
            
            <p class="m-3 text-white"><?php echo $_SESSION['user']->getEmail() ?> <a href="?ctrl=home&method=formMail&id=<?= $_SESSION['user']->getid() ?>"><i class="fas fa-pen  p-2 text-white"></i></a> </p>   
            <i class="fas text-danger fa-exclamation-triangle"></i> <a class="text-danger" href="?ctrl=home&method=confirmChangeMdp&id=<?= $_SESSION['user']->getid() ?>">changer  de mot de passe</a>
        </div>
        
    </div>
    <div><a href="#" class="text-white align-self-end "> se désincrire </a></div>
    
    <h2 class="w-100 text-white text-center">dernier message écrit</h2>
    
</div>