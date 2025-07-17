    <h2>trajet</h2>
    <p><a class="btn btn-primary" href="<?= hlien("trajet", "edit", "id", 0) ?>">Nouveau trajet</a></p>
    <table class="table table-striped table-bordered table-hover">
    	<thead>
    		<tr>

    			<th>id</th>
    			<th>depart</th>
    			<th>depart : date et heure</th>
    			<th>destination</th>
    			<th>arrivée : date et heure</th>
    			<th>fournisseur</th>
    			<th>moyen de transport</th>
    			<th>arrets intermediaires</th>
    			<th>date creation</th>
    			<th>modifier</th>
    			<th>supprimer</th>
    			<th>inscrit</th>
			</tr>
    	</thead>
    	<tbody>
    		<?php
			foreach ($data as $row) {
				extract(array_map("mhe",$row)); ?>
    			<tr>

    				<td><?= $row['tra_id'] ?></td>
    				<td><?= $row['tra_depart'] ?></td>
					<td><?= $row['tra_date_heure_depart'] ?></td>
    				<td><?= $row['tra_destination'] ?></td>
					<td><?= $row['tra_date_heure_arrivee'] ?></td>
					<td><?= $uti_nom?> <?=$uti_prenom ?></td>
    				<td><?= $row['tra_moyen_de_transport'] ?></td>   			    				
    				<td><?= $row['tra_arret_intermediaire'] ?></td>
    				<td><?= $row['tra_date_creation'] ?></td>
    				
    				<td><a class="btn btn-warning" href="<?= hlien("trajet", "edit", "id", $row["tra_id"]) ?>">Modifier</a></td>
    				<td><a class="btn btn-danger" href="<?= hlien("trajet", "delete", "id", $row["tra_id"]) ?>">Supprimer</a></td>
    				<td><a class="btn btn-warning" href="<?= hlien("trajet", "inscrit", "id", $row["tra_id"]) ?>">Inscrit</a></td>
				</tr>
    		<?php } ?>
    	</tbody>
    </table>