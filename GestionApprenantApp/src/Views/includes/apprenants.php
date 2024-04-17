<div class="hidden" id="Include_Apprenants">
    <div class="m-2">
        <div class="flex justify-between *:m-3">
            <h2 class="text-3xl">Tout les apprenants</H2>
            <button class="font-medium bg-sky-500 text-white p-1 rounded" onclick="AfficheNewApprenant()">Ajouter un apprenant</button>
        </div>
        <p>Tableau des apprenants</p>

    </div>
    <div class="m-auto w-full m-2 mb-3 border-b-black border-solid flex items-center justify-start border-b-2 border-b-neutral-300">
        <input type="checkbox" class="size-4 mr-1" name="checkall" id="checkall">
        <p class="w-2/12">Nom de famille</p>
        <p class="w-2/12">Prénom</p>
        <p class="w-2/12">Email</p>
        <p class="w-2/12">Compte activé</p>
        <p class="w-2/12">Rôle</p>
    </div>
    <div id="TableauApprenants">
        <?php

        if (isset($apprenant) && !empty($apprenant)) {
            foreach ($apprenant as $key) {
                echo  '<div id="apprenant' . $key->getIdUser() . '" class="m-auto w-full m-2  mb-2 border-b-gray-200 border-solid flex items-center justify-start border-b-2 border-b-neutral-100">
                <input type="checkbox" class="size-4 mr-1">
                <p class="w-2/12">' . $key->getNom() . '</p>
                <p class="w-2/12">' . $key->getPrenom() . '</p>
                <p class="w-2/12">' . $key->getEmail() . '</p>
                <p class="w-2/12">oui</p>
                <p class="w-2/12">' . $key->getIdRole() . '</p>
                <div class="*:m-1 w-2/12">
                    <button class="text-blue-500" onclick="VoirApprenant(' . $key->getIdUser() . ')">Voir</button>
                    <button class="text-blue-500" onclick="EditerApprenant(' . $key->getIdUser() . ')">Editer</button>
                    <button class="text-blue-500" onclick="SupprimerApprenant(' . $key->getIdUser() . ')">Supprimer</button>
                </div>
            </div>';
            }
        }
        ?>
    </div>

</div>