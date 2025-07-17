<p><label>tra_id</label> <?=$tra_id?> </p>
<p><label>tra_depart</label> <?=$tra_depart?> </p>
<p><label>tra_destination</label> <?=$tra_destination?> </p>
<p><label>tra_moyen_de_transport</label> <?=$tra_moyen_de_transport?> </p>
<p><label>tra_date_heure_depart</label> <?=$tra_date_heure_depart?> </p>
<p><label>tra_date_heure_arrivee</label> <?=$tra_date_heure_arrivee?> </p>
<p><label>tra_arret_intermediaire</label> <?=$tra_arret_intermediaire?> </p>
<p><label>tra_date_creation</label> <?=$tra_date_creation?> </p>
<hr />
<ul>
<?php 
foreach($liste as $user) {
  extract(array_map("mhe",$user));	
  ?>
  <li><?=$uti_nom?> <?=$uti_prenom?> <a href="<?= hlien("inscrire", "delete", "id", $uti_id) ?>">Désinscrire</a></li>
  <?php
}
?>
</ul>
