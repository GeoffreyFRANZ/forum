<?php if(  isset($_SESSION['password_erreur'])&& (time ())) { ?>
                <p class="text-danger p-1 text-center m-0"> <?php echo $_SESSION['password_erreur']; ?></p>
              <?php unset( $_SESSION['password_erreur']); }  

              if(isset(  $_SESSION['succes']) && (time ()) ) { ?>
                <p class="text-success p-1 text-center m-0" > <?php echo $_SESSION['succes']; ?> </p>
                   <?php unset($_SESSION['succes']); } ?>
<form class="m-4" action="?ctrl=home&method=formChangeMdp&id=<?php echo $_GET['id']?>"  method="post">

    <input type="password" name="ancien" placeholder="ancien mot de passe">
    <input type="password" name="newMdp" placeholder="nouveau mot de passe">
    <input type="password" name="confirmNewMdp" placeholder="confirmation du nouveau mot de passe ">
    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>" >
    <input type="submit" value="changer">
</form>

