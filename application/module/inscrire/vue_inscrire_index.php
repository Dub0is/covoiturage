    <h2>inscrire</h2>
    <p><a class="btn btn-primary" href="<?=hlien("inscrire","edit","id",0)?>">Nouveau inscrire</a></p>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				
			<th>ins_id</th>
			<th>ins_utilisateur</th>
			<th>ins_trajet</th>
				<th>modifier</th>
				<th>supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ( $data as $row) { 
			extract($row); ?>
		<tr>
			
			<td><?=mhe($row['ins_id'])?></td>
			<td><?=mhe($row['ins_utilisateur'])?></td>
			<td><?=mhe($row['ins_trajet'])?></td>
			<td><a class="btn btn-warning" href="<?=hlien("inscrire","edit","id",$row["ins_id"])?>">Modifier</a></td>
			<td><a class="btn btn-danger" href="<?=hlien("inscrire","delete","id",$row["ins_id"])?>">Supprimer</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>