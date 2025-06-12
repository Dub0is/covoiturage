    <form method="post" action="<?=hlien("profil","save")?>">
		<input type="hidden" name="pro_id" id="pro_id" value="<?= $id ?>" />
		
                        <div class='form-group'>
                            <label for='pro_type'>Pro_type</label>
                            <input id='pro_type' name='pro_type' type='text' size='80' value='<?=$pro_type?>'  class='form-control' />
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
		<input class="btn btn-warning" type="button" name="annuler" value="Annuler" onclick="history.back()" />
	</form>              