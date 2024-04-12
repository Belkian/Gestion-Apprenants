function ApprenantON() {
    let Apprenant = document.querySelector('#Apprenant');
    Apprenant.classList.add('border-2', 'rounded-t-md', 'border-x-neutral-200', 'border-t-neutral-200', 'border-b-transparent');

}

function PromotionsON() {
    let Promotion = document.querySelector('#Promotions');
    Promotion.classList.add('border-2', 'rounded-t-md', 'border-x-neutral-200', 'border-t-neutral-200', 'border-b-transparent');
}

function AccueilON() {
    let AccueilDashboard = document.querySelector('#AccueilDashboard');
    AccueilDashboard.classList.add('border-2', 'rounded-t-md', 'border-x-neutral-200', 'border-t-neutral-200', 'border-b-transparent');
}

function NavOFF() {
    let Apprenant = document.querySelector('#Apprenant').classList;
    let Promotion = document.querySelector('#Promotions').classList;
    let AccueilDashboard = document.querySelector('#AccueilDashboard').classList;
    Apprenant.forEach(liste => {
        Apprenant.remove(liste);
    });
    Promotion.forEach(liste => {
        Promotion.remove(liste);
    });
    AccueilDashboard.forEach(liste => {
        AccueilDashboard.remove(liste);
    });
    Apprenant.add('border-b-2', 'border-b-neutral-200');
    Promotion.add('border-b-2', 'border-b-neutral-200');
    AccueilDashboard.add('border-b-2', 'border-b-neutral-200');
}


function AfficheNewPromotion() {
    let Promotion = document.querySelector('#Include_Promotions').classList;
    let CreatePromotion = document.querySelector('#Include_newPromotion').classList;
    Promotion.toggle('hidden');
    CreatePromotion.toggle('hidden');
}

function Accueil() {
    const request = new XMLHttpRequest();
    request.open('POST', 'http://gestionapprenant/accueil', true);
    request.setRequestHeader('Content-Type', 'application/json');
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            let affiche = document.querySelector('main');
            affiche.innerHTML = '';
            affiche.innerHTML += request.responseText;
            window.history.replaceState(null, document.title, "/");
        }
    }
}


function PanneauOFF() {
    let cours = document.querySelector('#Include_Cours').classList;
    let promotions = document.querySelector('#Include_Promotions').classList;
    let apprenant = document.querySelector('#Include_Apprenant').classList;
    cours.add('hidden');
    promotions.add('hidden');
    apprenant.add('hidden');
}


function AccueilDashboard() {
    PanneauOFF();
    NavOFF();
    AccueilON();
    let cours = document.querySelector('#Include_Cours').classList;
    cours.toggle('hidden');
    window.history.replaceState(null, document.title, "/dashboard/accueil");
}

function Promotions() {
    PanneauOFF();
    NavOFF();
    PromotionsON();
    let promotions = document.querySelector('#Include_Promotions').classList;
    promotions.toggle('hidden');
    window.history.replaceState(null, document.title, "/dashboard/promotions");
}

function Apprenant() {
    PanneauOFF();
    NavOFF();
    ApprenantON();
    let apprenant = document.querySelector('#Include_Apprenant').classList;
    apprenant.toggle('hidden');
    window.history.replaceState(null, document.title, "/dashboard/apprenant");
}




function Register() {
    let EmailConnexion = document.querySelector('#Emailconnexion').value;
    let PasswordConnexion = document.querySelector('#passwordconnexion').value;
    let Data = {
        "Email": EmailConnexion,
        "Password": PasswordConnexion
    }
    const request = new XMLHttpRequest();
    request.open('POST', 'http://gestionapprenant/connexion', true);

    request.setRequestHeader('Content-Type', 'application/json');

    Data = JSON.stringify(Data);

    request.send(Data);

    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            let affiche = document.querySelector('main');
            let header = document.querySelector('#header');
            let btnCo = document.querySelector('#btnCo');
            header.removeChild(btnCo);
            header.innerHTML += '<button id="btnDeco" onclick="deconnexion()" class="font-medium">Déconnexion</button>';

            affiche.innerHTML = '';
            affiche.innerHTML += request.responseText;
            AccueilDashboard();
        }
    }

}


function RegisterApprenant() {
    let NomApprenant = document.querySelector('#NomApprenant').value;
    let PrenomApprenant = document.querySelector('#PrenomApprenant');
    let EmailApprenant = document.querySelector('#EmailApprenant');
    let data = {
        "NomApprenant": NomApprenant,
        "PrenomApprenant": PrenomApprenant,
        "EmailApprenant": EmailApprenant,
    }
    const request = new XMLHttpRequest();

    request.open('POST', 'http://gestionapprenant/dashboard/apprenant', true);

    request.setRequestHeader('Content-Type', 'application/json');

    request.send(data);

    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            affiche.innerHTML += request.responseText;
        }
    }
}

function deconnexion() {
    const request = new XMLHttpRequest();
    request.open('GET', 'http://gestionapprenant/dashboard/deconnexion', true);
    request.setRequestHeader('Content-Type', 'application/json');
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            window.history.replaceState(null, document.title, "/");
            document.body.innerHTML = request.responseText;
        }
    }
}
