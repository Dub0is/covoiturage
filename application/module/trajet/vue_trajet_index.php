    <h2>trajet</h2>
    <p><a class="btn btn-primary" href="<?=hlien("trajet","edit","id",0)?>">Nouveau trajet</a></p>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				
			<th>tra_id</th>
			<th>tra_depart</th>
			<th>tra_destination</th>
			<th>tra_moyen_de_transport</th>
			<th>tra_date_heure_depart</th>
			<th>tra_date_heure_arrivee</th>
			<th>tra_arret_intermediaire</th>
			<th>tra_date_creation</th>
			<th>tra_fournisseur</th>
				<th>modifier</th>
				<th>supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $data as $row) { 
			extract($row); ?>
		<tr>
			
			<td><?=mhe($row['tra_id'])?></td>
			<td><?=mhe($row['tra_depart'])?></td>
			<td><?=mhe($row['tra_destination'])?></td>
			<td><?=mhe($row['tra_moyen_de_transport'])?></td>
			<td><?=mhe($row['tra_date_heure_depart'])?></td>
			<td><?=mhe($row['tra_date_heure_arrivee'])?></td>
			<td><?=mhe($row['tra_arret_intermediaire'])?></td>
			<td><?=mhe($row['tra_date_creation'])?></td>
			<td><?=mhe($row['tra_fournisseur'])?></td>
			<td><a class="btn btn-warning" href="<?=hlien("trajet","edit","id",$row["tra_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("trajet","delete","id",$row["tra_id"])?>">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>