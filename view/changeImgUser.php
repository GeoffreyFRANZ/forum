

   <form action="?ctrl=home&method=changeimg&id=<?php echo $_GET['id'] ?>" method="post"  enctype="multipart/form-data">
        <h2 class="text-white text-center" >modifier votre photo de profile</h2>
        <label class="text-white" for="fileUpload">Fichier:</label>
        <input class="text-white" type="file" name="photo" id="fileUpload"><br>
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>" >
        <input type="submit" name="submit" value="Upload">

    </form>
 

<?php

