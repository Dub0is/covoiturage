    <form method="post" action="<?=hlien("utilisateur","save")?>">
		<input type="hidden" name="uti_id" id="uti_id" value="<?= $id ?>" />
		
                        <div class='form-group'>
                            <label for='uti_nom'>Uti_nom</label>
                            <input id='uti_nom' name='uti_nom' type='text' size='80' value='<?=$uti_nom?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='uti_prenom'>Uti_prenom</label>
                            <input id='uti_prenom' name='uti_prenom' type='text' size='80' value='<?=$uti_prenom?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='uti_adresse_mail'>Uti_adresse_mail</label>
                            <input id='uti_adresse_mail' name='uti_adresse_mail' type='text' size='80' value='<?=$uti_adresse_mail?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='uti_mdp'>Uti_mdp</label>
                            <input id='uti_mdp' name='uti_mdp' type='text' size='80' value='<?=$uti_mdp?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='uti_profil'>Uti_profil</label>
                            <select id='uti_profil' name='uti_profil' class='form-select'><?=Table::HTMLselect('select * from profil', 'pro_id', 'pro_id', $uti_profil)?></select>
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
		<input class="btn btn-warning" type="button" name="annuler" value="Annuler" onclick="history.back()" />
	</form>              