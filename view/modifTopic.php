<form action="#" class="p-0" method="post">
    
    <?php  foreach($data['sujet'] as $sujet){ ?>
<div class=" w-100  d-flex justify-content-center m-2">
    <input type="text" class="text-white" value="<?php echo $sujet->getNomTopic() ?>" name="nomTopic" >
</div>
<div class=" w-100  d-flex justify-content-center m-2">
 <textarea name="corpSujet"  id="" cols="30" rows="10"> <?php echo $sujet->getCorpSujet() ?></textarea>
</div>
<div class="   m-auto d-flex justify-content-center m-2" >
    <select class="bg-dark text-white" name="categorie" id="">
    <?php }foreach($data['categorie'] as $cat){ ?> 
   <option value="<?php echo $cat->getId() ?>"><?php echo $cat->getNomCategorie() ?></option>
<?php } ?>
     </select>
     <input type="checkbox" class="ml-4 text-white" name="statut" id="remember"> <label class="text-white" > sujet ouvert </label>
</div>
<div  class=" link d-flex align-midle justify-content-around " >
<input type="hidden" name="csrf_token" value="<?= $csrf_token ?>" >
 <div id="divRemember" class="mt-2"></div>
 <input  type="submit" value="modifier">
 </div>
</form>
