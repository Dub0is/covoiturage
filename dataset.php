<?php
//connexion à la base de données
$link = mysqli_connect("localhost", "root", "", "autoecole");
//configuration du jeu de carcatères des données reçues
mysqli_set_charset($link, "utf8");

/**
 * table de type (id, nom)
 * génére $nb row et retourne $nb
 */
function table_basic(string $nomTable,int $nbrow) : int
{
    global $link;

    echo "<h3>$nomTable</h3>";   
    $row = [];
    for ($i = 1; $i <= $nbrow; $i++) {
        $row[] = "(null,'nom$i')";
    }
    $sql = "insert into $nomTable values " . implode(",", $row);
    mysqli_query($link, $sql);
    echo "$nbrow $nomTable créés";
    return $nbrow;
}

function lecon(int $nblecon,int $nbmoniteur,int $nbvoiture) : int {
    global $link;

    echo "<h3>Lecon</h3>";   
    $row = [];
    for ($i = 1; $i <= $nblecon; $i++) {
        $d=date("Y-m-d",mktime(0,0,0,mt_rand(1,12),mt_rand(1,31),2024));
        $ts=mktime(mt_rand(8,17),mt_rand(0,59), 0);
        $hdebut=date("H:i:s",$ts);
        $duree=3600 + 60*mt_rand(15,60);
        $hfin=date("H:i:s",$ts+$duree);
        $lec_type=mt_rand(0,1)==0 ? "code" : "conduite";
        $id_moniteur=mt_rand(1,$nbmoniteur);
        $id_voiture=mt_rand(0,10) == 0 ? "null" : mt_rand(1,$nbvoiture);        
        $row[] = "(null,'$d','$hdebut','$hfin','$lec_type',$id_moniteur,$id_voiture)";
    }
    $sql = "insert into lecon values " . implode(",", $row);
    mysqli_query($link, $sql);
    echo "$nblecon lecon créées";
    return $nblecon;
}

function recevoir($nbclient,$nblecon) : int {
    $cpt=0;

    global $link;

    echo "<h3>recevoir</h3>";   
    $row = [];
    for ($i = 1; $i <= $nblecon; $i++) {
        //nombre d'inscrits à cette lecon
        $nbinscrit = mt_rand(1, 10);
        $clients = range(1, $nbclient);
        shuffle($clients);
        for ($j = 1; $j <= $nbinscrit; $j++) {            
            $rec_client=$clients[$j];
            $rec_lecon=$i;
            $row[] = "($rec_client,$rec_lecon)";
            $cpt++;
        }
    }
    $sql = "insert into recevoir values " . implode(",", $row);
    mysqli_query($link, $sql);
    echo "$cpt recevoir créés";
    return $cpt;
}

$nbclient=table_basic("client",1000);
$nbmoniteur=table_basic("moniteur",10);
$nbvoiture=table_basic("voiture",10);
$nblecon=lecon(5000,$nbmoniteur,$nbvoiture); 
$nbrecevoir=recevoir($nbclient,$nblecon);
