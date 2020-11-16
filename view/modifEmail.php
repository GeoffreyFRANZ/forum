<form action="?ctrl=home&method=changeEmail&id=<?php echo $_GET['id'] ?>" method="post">
    <input type="email" name="email" placeholder="url">
    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>" >
    <input type="submit" value="changer">
</form>