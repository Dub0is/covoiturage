<?php
//connexion à la base de données
$link = mysqli_connect("localhost", "root", "", "covoiturage");
//configuration du jeu de carcatères des données reçues
mysqli_set_charset($link, "utf8");

function utilisateur(int $nbutilisateur,int $nbprofil): int
{
    global $link;

    echo "<h3>utilisateur</h3>";
    $row = [];
    $cpt = 0;
    $cpt2 = 0;
    $cpt3 = 0;
    for ($i = 1; $i <= $nbutilisateur; $i++) {
        $p = mt_rand(1, 3);
        if ($p == 5 and $cpt < 10) {
            $cpt++;
            $row[] = "(null,'nom$i','$p')";
        } else if ($p == 4 and $cpt2 < 10) {
            $cpt2++;
            $row[] = "(null,'nom$i','$p')";
        } else if ($p == 3 and $cpt3 < 10) {
            $cpt3++;
            $row[] = "(null,'nom$i','$p')";
        } else {
            $p = mt_rand(1, 2);
            $row[] = "(null,'nom$i','$p')";
        }
    }
    $sql = "insert into utilisateur values " . implode(",", $row);
    mysqli_query($link, $sql);
    echo "$nbutilisateur utilisateur créés";
    return $nbutilisateur;
}
$nbutilisateur = utilisateur("utilisateur", 10000);

function profil(): int
{
    global $link;
    $tab = ["UTILISATEUR", "ADMIN", "GESTIONNAIRE"];

    echo "<h3>profil</h3>";
    $row = [];
    foreach ($tab as $i => $valeur) {
        $row[] = "(null,'$valeur')";
    }
    $sql = "insert into profil values " . implode(",", $row);
    mysqli_query($link, $sql);
    echo "profil créés";
    return count($tab);
}
$nbprofil = profil();

function trajet(int $nbtrajet,int $nbfournisseur) : int {
    global $link;

    echo "<h3>Trajet</h3>";   
    $row = [];
    for ($i = 1; $i <= $nbtrajet; $i++) {
        $d=date("Y-m-d",mktime(0,0,0,mt_rand(1,12),mt_rand(1,31),2025));
        $ts=mktime(mt_rand(8,17),mt_rand(0,59), 0);
        $hdebut=date("H:i:s",$ts);
        $duree=3600 + 60*mt_rand(15,60);
        $hfin=date("H:i:s",$ts+$duree);
        $lec_type=mt_rand(0,1)==0 ? "code" : "conduite";
        $id_fournisseur=mt_rand(1,$nbmoniteur);
        $row[] = "(null,'$d','$hdebut','$hfin','$lec_type',$id_moniteur,$id_voiture)";
    }
    $sql = "insert into trajet values " . implode(",", $row);
    mysqli_query($link, $sql);
    echo "$nbtrajet trajet créées";
    return $nbtrajet;
}

function hotel(string $nomTable, int $nbrow): int
{
    global $link;
    $ville = ["Paris", "Caen", "Bordeaux", "Nantes", "Montpellier", "Strasbourg", "Nice", "Cannes", "Lyon", "Marseille"];
    $rue = ["rue", "avenue", "boulevard"];
    $nom = explode(" ", "Lorem ipsum dolor sit amet");
    $description = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum officia qui molestias quo, minus, nam ipsum, expedita saepe eius voluptate corrupti veritatis omnis? Odit quas voluptatem numquam. Voluptate impedit esse nobis, molestiae aut necessitatibus sit, adipisci, facere hic optio officiis sunt. Totam libero distinctio molestias officia veritatis quis repellendus itaque?";
    $tab = ["actif", "supprimé", "en travaux"];
    echo "<h3>$nomTable</h3>";
    $row = [];
    for ($i = 1; $i <= $nbrow; $i++) {
        $num = mt_rand(1, 100);
        $v = $ville[array_rand($ville)];
        $r = $rue[array_rand($rue)];
        $n = $nom[array_rand($nom)];
        $hot_cat = mt_rand(1, 5);
        if ($i <= 9) {
            $statut = $tab[0];
        } else {
            $statut = $tab[2];
        }

        $row[] = "(null,'hotel$i','$num $r $n $v', '$hot_cat', '$description', '$statut')";
    }
    $sql = "insert into $nomTable values " . implode(",", $row);
    mysqli_query($link, $sql);
    echo "$nbrow $nomTable créés";
    return $nbrow;
}
$nbhotel = hotel("hotel", 10);

function chambre(string $nomTable, $nbtype, $nbtype_lit, $nbhotel): int
{
    global $link;
    $tab = ["oui", "non"];
    $description = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur dolore itaque esse quisquam, quae explicabo totam aperiam molestias cupiditate animi?";
    $s = ["actif", "supprimé", "en travaux"];

    echo "<h3>$nomTable</h3>";

    $row = [];
    for ($l = 1; $l <= $nbhotel; $l++) {
        $nchambre = mt_rand(10, 200);
        for ($i = 1; $i <= $nchambre; $i++) {
            $surface = mt_rand(12, 60);
            $lit = mt_rand(1, $nbtype_lit);
            $option1 = $tab[array_rand($tab)];
            $option2 = $tab[array_rand($tab)];
            $option3 = $tab[array_rand($tab)];
            $option4 = $tab[array_rand($tab)];
            $option5 = $tab[array_rand($tab)];
            $option6 = $tab[array_rand($tab)];
            $type_chambre = mt_rand(1, $nbtype);
            $k = mt_rand(0, 2);
            $statut = $s[$k];

            $row[] = "(null,'$surface m²','$lit', '$description', '$option1', '$option2', '$option3', '$option4', '$option5', '$option6', '$type_chambre', '$statut', '$l')";
        }
    }
    $sql = "insert into $nomTable values " . implode(",", $row);
    mysqli_query($link, $sql);
    echo "$nomTable créés";
    return $nchambre;
}
$nbchambre = chambre("chambre", $nbtype, $nbtype_lit, $nbhotel);

function proposer(string $nomTable, $nbservices, $nbhotel): int
{
    global $link;

    $tab = range(1, $nbservices);
    $prix = ["0", "5", "10", "15"];
    $row = [];
    echo "<h3>$nomTable</h3>";

    for ($i = 1; $i <= $nbhotel; $i++) {
        $tab = range(1, $nbservices);
        $smax = mt_rand(1, $nbservices);
        for ($j = 1; $j <= $smax; $j++) {
            $cle = array_rand($tab);
            $services = $tab[$cle];
            unset($tab[$cle]);
            $tarif = $prix[array_rand($prix)];
            $row[] = "(null,'$i','$services','$tarif')";
        }
    }

    $sql = "insert into $nomTable values " . implode(",", $row);
    mysqli_query($link, $sql);
    echo "$nomTable créés";
    return $nbhotel;
}
$nbproposer = proposer("proposer", $nbservices, $nbtype);

function tarifer(string $nomTable, $nbcategorie, $nbtype): int
{
    global $link;
    $tab = ["standard" => ["50", "70", "85", "120", ''], "superieure" => ["60", "80", "110", "230", ''], "luxe" => ["70", "90", "150", "999", "1200"], "suite" => ["80", "100", "200", "1500", "2100"]];
    $row = [];
    echo "<h3>$nomTable</h3>";
    $i = 0;
    $j = 1;
    foreach ($tab as $cle) {
        foreach ($cle as $valeur) {
            if ($i < $nbcategorie) {
                $i++;
            } else {
                $i = 1;
                $j++;
            }
            if ($valeur == null) {
                $row[] = "(null,$i,$j,null)";
            } else {
                $row[] = "(null,$i,$j,$valeur)";
            }
        }
    }

    $sql = "insert into $nomTable values " . implode(",", $row);
    mysqli_query($link, $sql);
    echo "$nomTable créés";
    return count($tab);
}
$nbtarifer = tarifer("tarifer", $nbcategorie, $nbtype);


function reservation($nomTable, $nbrow, $nbutilisateur, $nbhotel, $nbchambre): int
{
    global $link;
    $statut = ["initialisée", "validée", "annulée", "en attente"];
    $type = ["en ligne", "src", "hotel"];
    echo "<h3>$nomTable</h3>";
    $row = [];
    for ($i = 1; $i <= $nbrow; $i++) {
        $ts = mktime(0, 0, 0, mt_rand(1, 12), mt_rand(1, 30), 2024);
        $dtjour = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
        while ($ts > $dtjour) {
            $ts = mktime(0, 0, 0, mt_rand(1, 12), mt_rand(1, 30), 2024);
        }
        $creation = date("Y-m-d", $ts);
        if ($i < 500) {
            $ts += mt_rand(5, 10) * 24 * 60 * 60;
            $date_maj = date("Y-m-d", $ts);
            $res_statut = $statut[mt_rand(1, 3)];
        }
        $res_statut = $statut[0];
        $debut = mktime(15, 00, 00, mt_rand(1, 12), mt_rand(1, 30), mt_rand(2024, 2025));
        while ($debut < $ts) {
            $debut = mktime(15, 00, 00, mt_rand(1, 12), mt_rand(1, 30), mt_rand(2024, 2025));
        }
        $res_debut = date("Y-m-d H:i:s", $debut);
        $fin = $debut + mt_rand(1,3) * 24 * 60 * 60;
        $res_fin = date("Y-m-d H:i:s", $fin);
        $res_type = $type[mt_rand(0, 2)];
        $res_utilisateur = mt_rand(1, $nbutilisateur);
        $res_hotel = mt_rand(1, $nbhotel);
        $res_chambre = mt_rand(1, $nbchambre);
        $fin = date("Y-m-d", $ts);
        $row[] = "(null,'$creation','$date_maj','$res_debut','$res_fin','$res_statut','$res_type','$res_utilisateur','$res_hotel','$res_chambre')";
    }
    $sql = "insert into $nomTable values " . implode(",", $row);
    echo $res_debut;
    mysqli_query($link, $sql);
    echo "$nomTable créées";
    return $nbrow;
}
$nbreservation = reservation("reservation", 1000, $nbutilisateur, $nbhotel, $nbchambre);
