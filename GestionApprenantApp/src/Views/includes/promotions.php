<div class="hidden" id="Include_Promotions">
    <div class="m-2">
        <div class="flex justify-between *:m-3">
            <h2 class="text-3xl">Toutes les promotions</H2>
            <button class="font-medium bg-sky-500 text-white p-1 rounded" onclick="AfficheNewPromotion()">Ajouter promotion</button>
        </div>
        <p>Tableau des promotions de Simplon</p>

    </div>
    <div class="m-auto w-full m-2 mb-3 border-b-black border-solid flex items-center justify-start border-b-2 border-b-neutral-300">
        <input type="checkbox" class="size-4 mr-1" name="checkall" id="checkall">
        <p class="w-2/12">Promotion</p>
        <p class="w-2/12">Début</p>
        <p class="w-2/12">Fin</p>
        <p class="w-2/12">Places</p>
    </div>

    <div id="TableauPromos">
        <?php
        if (isset($classe) && !empty($classe)) {
            foreach ($classe as $key) {
                if (empty($key->getIdClasse())) {
                } else {
                    $start = date_create($key->getDateDebut());
                    $end = date_create($key->getDateFin());
                    echo  '<div id="classe' . $key->getIdClasse() . '"  class="m-auto w-full m-2  mb-2 border-b-gray-200 border-solid flex items-center justify-start border-b-2 border-b-neutral-100">
                <input type="checkbox" class="size-4 mr-1">
                <p class="w-2/12">' . $key->getNomClasse() . '</p>
                <p class="w-2/12">' . date_format($start, "d/m/Y") . '</p>
                <p class="w-2/12">' . date_format($end, "d/m/Y") . '</p>
                <p class="w-2/12">' . $key->getNombreApprenant() . '</p>
                <div class="*:m-1 w-2/12 w-max">
                <button class="text-blue-500" onclick="VoirClasse(' . $key->getIdClasse() . ')">Voir</button>
                <button class="text-blue-500" onclick="EditerClasse(' . $key->getIdClasse() . ')">Editer</button>
                <button class="text-blue-500" onclick="SupprimerClasse(' . $key->getIdClasse() . ')">Supprimer</button>
                </div>
                </div>';
                }
            }
        }
        ?>
    </div>

</div>