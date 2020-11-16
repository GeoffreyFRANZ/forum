

<form action="?ctrl=home&method=changePseudo&id=<?php echo $_GET['id'] ?>" method="post">
    <input type="text" name="pseudo" placeholder="url">
    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>" >
    <input type="submit" value="changer">
</form>