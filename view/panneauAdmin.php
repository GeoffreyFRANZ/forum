<!-- 
// fichier   à recuper ajouter  dans le bon dossier 
// suoper global file   
// panneau admin -> list user + barre recherche
// statut pour les  method nb sujet dernier 
//  pagination 
//
// -->

<form class="my-lg-3" method="POST" action="?ctrl=home&method=panneauAdmin">
      <input class="form-control mr-sm-2 bg-dark text-white" name="search" type="search" placeholder="Search" aria-label="Search">
      <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>" >
    </form>
    <?php if (!empty($data['resultat'])) { ?>
      <div class= "w-100  ">
        <?php foreach ($data['resultat'] as $utilisateur) { ?>
        <p class="text-white"><?php echo $utilisateur->getPseudo() ?></p>
      </div>
  <?php }
      } ?>
    <h2 class="text-white text-center">list utilisateur</h2>
<ul >
 <?php
foreach($data['allUser'] as $user){ ?>

<li class="nav" >
<ul> <p class="text-white"> modifier le role de <a class="text-white" href="?ctrl=home&method=formChangeRole&id=<?= $user->getId() ?>"><strong><?php echo $user->getPseudo() ?></strong></a></p></ul>
</li>

<?php }

?>
</ul>

<h2 class="text-white text-center m-3" >list catégorie</h2>
<ul>
<?php foreach($data['categorie'] as $cat ){ ?>
    
    <p class="nav text-white"><?php echo $cat->getNomCategorie() ?> <i class="fas fa-pen  p-2 text-white"></i>
<i class="fas fa-times text-danger"></i> </p>
    
    <?php } ?>
    </ul>
