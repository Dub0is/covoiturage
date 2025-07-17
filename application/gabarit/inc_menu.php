<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <?php if (isset($_SESSION["uti_id"])) { ?>
          <?php if ($_SESSION["uti_profil"] == 2) { ?>
            <li><a class='nav-link' href='<?=hlien("inscrire","index")?>'>Inscrire</a></li>
            <li><a class='nav-link' href='<?=hlien("profil","index")?>'>Profil</a></li>
            <li><a class='nav-link' href='<?=hlien("trajet","index")?>'>Trajet</a></li>
            <li><a class='nav-link' href='<?=hlien("utilisateur","index")?>'>Utilisateur</a></li>
            <li><a class="nav-link" href='<?= hlien("recherche", "rechercher") ?>'>Recherche</a></li>
            <?php } ?>
          <?php if ($_SESSION["uti_profil"] == 1 || $_SESSION["uti_profil"] == 3) { ?>
            <li><a class='nav-link' href='<?=hlien("trajet","index")?>'>Trajet</a></li>
            <li><a class='nav-link' href='<?=hlien("inscrire","index")?>'>Inscrire</a></li>
            <li><a class="nav-link" href='<?= hlien("recherche", "rechercher") ?>'>Recherche</a></li>
          <?php } ?>
        <?php } ?>
      </ul>
      <ul class="navbar-nav ml-auto">
          <?php if (isset($_SESSION["uti_id"])) { ?>
              <li><a class="nav-link" href="<?= hlien("authentification", "deconnexion") ?>">Déconnexion</a></li>
              <span class="text-info"><?= isset($_SESSION["uti_nom"]) ? $_SESSION["uti_nom"] : '' ?> <?= isset($_SESSION["uti_prenom"]) ? $_SESSION["uti_prenom"] : '' ?></span>
          <?php } else { ?>
              <li><a class="nav-link" href="<?= hlien("authentification", "inscription") ?>">Inscription</a></li>
              <li><a class="nav-link" href='<?= hlien("authentification", "connexion") ?>'>Connexion</a></li>
          <?php } ?>
      </ul>
    </div>
  </div>
</nav>