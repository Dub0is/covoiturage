<?php
//connexion à la base de données
$link = mysqli_connect("localhost", "root", "", "covoiturage");
//configuration du jeu de carcatères des données reçues
mysqli_set_charset($link, "utf8");
$NBUSER = 100;

function utilisateur(string $nbutilisateur): int
{
    global $link;

    echo "<h3>utilisateur</h3>";
    $row = [];
    $cpt = 0;
    $cpt2 = 0;
    for ($i = 1; $i <= $nbutilisateur; $i++) {
        $mdp = password_hash("mdp", PASSWORD_DEFAULT);
        $p = mt_rand(1, 3);

        if ($p == 2 and $cpt <= 20) {
            $cpt++;
            $row[] = "(null,'nom$i','prenom$i','mail$i@toto.fr','$mdp','$p')";
        } else if ($p == 3 and $cpt2 <= 30) {
            $cpt2++;
            $row[] = "(null,'nom$i','prenom$i','mail$i@toto.fr','$mdp','$p')";
        } else {
            $p = 1;
            $row[] = "(null,'nom$i','prenom$i','mail$i@toto.fr','$mdp','$p')";
        }

    }
    $sql = "insert into utilisateur values " . implode(",", $row);
    mysqli_query($link, $sql);
    echo "$nbutilisateur utilisateur créés";
    return $nbutilisateur;
}


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


function trajet(int $nbtrajet, int $nbutilisateur): int
{
    global $link;

    echo "<h3>Trajet</h3>";
    $row = [];
    for ($i = 1; $i <= $nbtrajet; $i++) {
        $d = date("Y-m-d", mktime(0, 0, 0, mt_rand(1, 12), mt_rand(1, 31), 2025));
        $ts = mktime(mt_rand(0, 23), mt_rand(0, 59), 0, mt_rand(1, 12), mt_rand(1, 31), 2025);

        $tra_depart = "PARIS";
        $tra_destination = "REIMS";
        $tra_moyen_de_transport = "voiture";
        $tra_date_heure_depart = date("Y-m-d H:i:s", $ts);
        $duree = mt_rand(3600, 3 * 3600);
        $tra_date_heure_arrivee = date("Y-m-d H:i:s", $ts + $duree);
        $tra_arret_intermediaire = "NANCY";
        $tra_date_creation = date("Y-m-d");
        $tra_fournisseur = mt_rand(1, $nbutilisateur);

        $row[] = "(null,'$tra_depart','$tra_destination','$tra_moyen_de_transport','$tra_date_heure_depart','$tra_date_heure_arrivee','$tra_arret_intermediaire','$tra_date_creation','$tra_fournisseur')";
    }
    $sql = "insert into trajet values " . implode(",", $row);
    mysqli_query($link, $sql);
    echo "$nbtrajet trajet créées";
    return $nbtrajet;
}

function inscrire(int $nbutilisateur, int $nbtrajet): int
{
    global $link;

    echo "<h3>Inscrire</h3>";
    $row = [];
    for ($i = 1; $i <= $nbtrajet; $i++) {
        //entre 1 et 4 inscriptions
        $nb=mt_rand(1,4);
        for($j=1; $j<=$nb; $j++) {
            $uti_id=mt_rand(1,$nbutilisateur);
            $row[] = "(null,'$uti_id','$i')";
        }        
    }
    $sql = "insert into inscrire values " . implode(",", $row);
    mysqli_query($link, $sql);
    echo "inscription terminées";
    return $nbtrajet;
}

//PROGRAMME PRINCIPAL
profil();
utilisateur($NBUSER);
trajet(20,$NBUSER);
inscrire($NBUSER,20);
