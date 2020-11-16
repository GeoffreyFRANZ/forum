<form class="my-lg-3" method="POST" action="?ctrl=home&method=rechercheUser">
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
<ul>
 <?php
foreach($data['utilisateur'] as $user): ?>

<li class="nav" >
<ul> <a href="?ctrl=home&method=infoUtilisateur&id=<?= $user->getId() ?>"><img class="imgProfile" src="<?=  $user->getAvatar() ?>" alt="vgre"> <p class="text-white"> <?php echo $user->getPseudo() ?></p></a></ul>
</li>

<?php endforeach;

?>
</ul>


