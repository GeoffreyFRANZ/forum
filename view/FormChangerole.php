

<form action="?ctrl=home&method=changeRole&id=<?= $_GET['id']?>" method="post">
<select name="role" id="">
    <option value="3">utilisateur</option>
    <option value="2">modérateur</option>
    <option value="1">administrateur</option>
</select>
<input type="hidden" name="csrf_token" value="<?= $csrf_token ?>" >
<input type="submit" value="changer">
</form>