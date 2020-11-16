<?php 


foreach($data['message'] as $message){
    $msg =  $message->getCorpMessage();
   $id = $message->getId();
}

?>

<form class="d-flex align-items-center flex-column m-2 " action="?ctrl=forum&method=modifMessage&id=<?= $id ?>" method="post">
    <textarea  name="message" id="" cols="30" rows="10"><?php echo $msg ?></textarea>
    <input class=" ml-4  mt-1 tranform-translate" type="submit" value="modifier">
    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>" >
</form>