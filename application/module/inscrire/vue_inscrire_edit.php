    <form method="post" action="<?=hlien("inscrire","save")?>">
		<input type="hidden" name="ins_id" id="ins_id" value="<?= $id ?>" />
		
                        <div class='form-group'>
                            <label for='ins_utilisateur'>Ins_utilisateur</label>
                            <select id='ins_utilisateur' name='ins_utilisateur' class='form-select'><?=Table::HTMLselect('select * from utilisateur', 'uti_id', 'uti_id', $ins_utilisateur)?></select>
                        </div>
                        <div class='form-group'>
                            <label for='ins_trajet'>Ins_trajet</label>
                            <select id='ins_trajet' name='ins_trajet' class='form-select'><?=Table::HTMLselect('select * from trajet', 'tra_id', 'tra_id', $ins_trajet)?></select>
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
		<input class="btn btn-warning" type="button" name="annuler" value="Annuler" onclick="history.back()" />
	</form>              