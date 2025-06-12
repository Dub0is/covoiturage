    <form method="post" action="<?=hlien("trajet","save")?>">
		<input type="hidden" name="tra_id" id="tra_id" value="<?= $id ?>" />
		
                        <div class='form-group'>
                            <label for='tra_depart'>Tra_depart</label>
                            <input id='tra_depart' name='tra_depart' type='text' size='80' value='<?=$tra_depart?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='tra_destination'>Tra_destination</label>
                            <input id='tra_destination' name='tra_destination' type='text' size='80' value='<?=$tra_destination?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='tra_moyen_de_transport'>Tra_moyen_de_transport</label>
                            <input id='tra_moyen_de_transport' name='tra_moyen_de_transport' type='text' size='80' value='<?=$tra_moyen_de_transport?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='tra_date_heure_depart'>Tra_date_heure_depart</label>
                            <input id='tra_date_heure_depart' name='tra_date_heure_depart' type='datetime-local' size='80' value='<?=$tra_date_heure_depart?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='tra_date_heure_arrivee'>Tra_date_heure_arrivee</label>
                            <input id='tra_date_heure_arrivee' name='tra_date_heure_arrivee' type='datetime-local' size='80' value='<?=$tra_date_heure_arrivee?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='tra_arret_intermediaire'>Tra_arret_intermediaire</label>
                            <input id='tra_arret_intermediaire' name='tra_arret_intermediaire' type='text' size='80' value='<?=$tra_arret_intermediaire?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='tra_date_creation'>Tra_date_creation</label>
                            <input id='tra_date_creation' name='tra_date_creation' type='date' size='80' value='<?=$tra_date_creation?>'  class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='tra_fournisseur'>Tra_fournisseur</label>
                            <select id='tra_fournisseur' name='tra_fournisseur' class='form-select'><?=Table::HTMLselect('select * from utilisateur', 'uti_id', 'uti_id', $tra_fournisseur)?></select>
                        </div>
		<input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
		<input class="btn btn-warning" type="button" name="annuler" value="Annuler" onclick="history.back()" />
	</form>              