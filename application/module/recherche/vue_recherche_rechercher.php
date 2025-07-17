<h2>Rechercher un hotel</h2>
<style>
    #map {
        height: 400px;
        width: 50%;
    }
</style>
    <div>
        <label for="recherche">indiquer un code postal, une ville, un hotel :</label>
        <input type="text" name="recherche" id="recherche">
    </div>
    <div>
        <p> <label for='categorie'>Catégorie d'Hotel:</label></p>
        <select id='categorie' name='categorie'
            class='form-select '>
            <option value="-1">-- Selectionner --</option>
        <?php
        foreach($categorie as $cle => $valeur) {
            foreach ($valeur as $cat) {
            echo "<option value='$valeur'>$cat</option>";
            }
        }
        ?>
    </select>
    </div>
    <hr>
    <button class="btn btn-warning" id="btrechercher">Rechercher</button>
    <hr>
    <div id="hotel" class="row row-cols-1 row-cols-md-3 g-4">
    </div>
    <div id="map"></div>

<script>
    btrechercher.addEventListener("click", chercherHotel);
    categorie.addEventListener("change", chercherCatHotel);


    async function chercherHotel(e) {

        e.preventDefault()
        let response = await fetch('<?= hlien("recherche", "ajax_hotel") ?>&recherche=' + recherche.value)
        let data = await response.json()
        hotel.innerHTML = ""
        for (let i = 0; i < data.length; i++) {
            hotel.innerHTML += `<div class="col">
            <div class="card bg-dark text-white mb-3">
                <div class="d-flex align-items-start">
                    <img src="../www/_images/Hotel${data[i].hot_id}.png" class="card-img-top w-50" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">${data[i].hot_nom} - ${data[i].cat_nom}</h5>
                        <h6 class="card-title">${data[i].hot_adresse}</h6>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text"> Description : ${data[i].hot_description}</p>
                    <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#details-${data[i].hot_id}" aria-expanded="false" aria-controls="details-${data[i].hot_id}" onclick="getAjaxService(${data[i].hot_id})">Plus d'information</button>
                    <a class="btn btn-success ms-4" id="btChoisir" href="<?= hlien("hotel", "choisir", "id", '${data[i].hot_id}', "cat_nom", '${data[i].cat_nom}') ?>">Choisir</a>
                    <div class="collapse mt-3" id="details-${data[i].hot_id}">
                        <div class="card card-body bg-secondary">
                        <p id="detail"> Service Disponible :
                        </p></div>
                    </div>
                </div>
            </div>
        </div>`;
        }

    }

    async function chercherCatHotel(c) {
        c.preventDefault();
        let response = await fetch('<?= hlien("recherche", "ajax_cat_hotel") ?>&categorie=' + categorie.value);
        let data = await response.json();
        hotel.innerHTML = "";
        for (let i = 0; i < data.length; i++) {
            hotel.innerHTML += `<div class="col">
            <div class="card bg-dark text-white mb-3">
                <div class="d-flex align-items-start">
                    <img src="../www/_images/Hotel${data[i].hot_id}.png" class="card-img-top w-50" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">${data[i].hot_nom} - ${data[i].cat_nom}</h5>
                        <h6 class="card-title">${data[i].hot_adresse}</h6>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text"> Description : ${data[i].hot_description}</p>
                    <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#details-${data[i].hot_id}" aria-expanded="false" aria-controls="details-${data[i].hot_id}" onclick="getAjaxService(${data[i].hot_id})">Plus d'information</button>
                    <a class="btn btn-success ms-4" id="btChoisir" href="<?= hlien("hotel", "choisir", "id", '${data[i].hot_id}', "cat_nom", '${data[i].cat_nom}') ?>">Choisir</a>
                    <div class="collapse mt-3" id="details-${data[i].hot_id}">
                        <div class="card card-body bg-secondary">
                        <p id="detail"> Service Disponible :
                        </p></div>
                    </div>
                </div>
            </div>
        </div>`;
        }
    }
    
    async function getAjaxService(hot_id) {
        let response = await fetch('<?= hlien("recherche", "ajax_service") ?>&hot_id=' + hot_id)
        let service = await response.json()
        let detailElement = document.querySelector('#details-' + hot_id + ' #detail')

        detailElement.innerHTML = "Service Disponible :"
        for (let i = 0; i < service.length; i++) {
            detailElement.innerHTML += "<br>" + service[i].ser_type
        }
    }
</script>