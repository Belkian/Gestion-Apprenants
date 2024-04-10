<div class="hidden" id="Include_Apprenant">
    <H3>Création d'un apprenant</H3>
    <div class="m-auto w-full *:w-full bg-gray-100 p-5">
        <label for="NomApprenant">Nom</label>
        <input type="text" name="NomApprenant" id="NomApprenant" require>
        <label for="PrenomApprenant">Prenom</label>
        <input type="text" name="PrenomApprenant" id="PrenomApprenant" require>
        <label for="EmailApprenant">Email</label>
        <input type="mail" name="EmailApprenant" id="EmailApprenant" require>
        <label for="PasswordApprenant">Password</label>
        <input type="password" name="PasswordApprenant" id="PasswordApprenant" require>
        <div class="m-3">
            <input class="m-1" type="checkbox" name="CompteActiver" id="CompteActiver"><label for="CompteActiver">Compte activé</label>
        </div>
        <button onclick="RegisterApprenant()" class="font-medium bg-sky-500 text-white p-3 rounded ">Sauvegarder</button>
    </div>
</div>