<?php $utilisateur = $data['utilisateur'];

     $inscription =  date_create($utilisateur->getInscription())?>

<div class="bg-dark w-80 d-flex flex-wrap justify-content-between align-middle ml-auto mr-auto mt-3 ">
    <div class="d-flex flex-wrap">
        <img class="img" src="<?= $utilisateur->getAvatar() ?>" alt="photo de profil"></i></a>

        <div class="ml-3">
        
            <h3 class="text-white"><?php echo $utilisateur->getPseudo() ?></h3>
            <p class="text-white">à rejoint le  <?php  echo date_format($inscription, 'd/m/Y')  ?>  </p>
            
 
        </div>
        
    </div>    
    <h2 class="w-100 text-white text-center"> messages écrit</h2>
    
</div>