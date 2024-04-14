<div class="hidden" id="Include_newApprenant">
    <h2 class="text-3xl">Création d'un apprenant</H2>
    <div class="m-auto w-full *:w-full p-5">
        <label for="NomApprenant">Nom</label>
        <input type="text" name="NomApprenant" id="NomApprenant" require value="Saulle">
        <label for="PrenomApprenant">Prenom</label>
        <input type="text" name="PrenomApprenant" id="PrenomApprenant" require value="Clément">
        <label for="EmailApprenant">Email</label>
        <input type="mail" name="EmailApprenant" id="EmailApprenant" require value="saulle@gmail.com">
        <button onclick="RegisterApprenant()" class="my-3 font-medium bg-sky-500 text-white p-3 rounded">Sauvegarder</button>
    </div>
    <div class="flex justify-between">
        <button class="font-medium bg-sky-500 text-white p-1 rounded m-2" onclick="AfficheNewApprenant()">retour</button>
        <button class="font-medium bg-sky-500 text-white p-1 rounded m-2" onclick="CreateApprenant()">Valider</button>
    </div>

</div>