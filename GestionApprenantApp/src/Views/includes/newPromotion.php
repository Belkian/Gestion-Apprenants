<div class="hidden" id="Include_newPromotion">
    <div class="m-auto w-full *:w-full bg-gray-100 p-5">
        <h2 class="text-3xl">Création d'une promotion</h2>
        <label for="NomDeLaPromo">Nom de la promotion</label>
        <input type="text" name="NomDeLaPromo" id="NomDeLaPromo" value="" class="mb-3">
        <label for="DateDebut">Date de début</label>
        <input type="date" name="DateDebut" id="DateDebut" value="" class="mb-3">
        <label for="DateFin">Date de Fin</label>
        <input type="date" name="DateFin" id="DateFin" value="" class="mb-3">
        <label for="PlacesDispo">Place(s) disponible(s)</label>
        <input type="number" name="PlacesDispo" id="PlacesDispo" value="" class="mb-3" min="0">
    </div>
    <div class="flex justify-between">
        <button class="font-medium bg-sky-500 text-white p-1 rounded m-2" onclick="AfficheNewPromotion()">retour</button>
        <button class="font-medium bg-sky-500 text-white p-1 rounded m-2" onclick="newPromotion()">Valider</button>
    </div>
</div>