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

function AccueilDashboard() {
    NavOFF();
    AccueilON();
    window.history.replaceState(null, document.title, "/dashboard/accueil");
}

function Promotions() {
    NavOFF();
    PromotionsON();
    window.history.replaceState(null, document.title, "/dashboard/promotions");
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

            affiche.innerHTML = '';
            affiche.innerHTML += request.responseText;

            window.history.replaceState(null, document.title, "/dashboard");
            AccueilDashboard();
        }
    }

}


function RegisterApprenant() {
    let NomApprenant = document.querySelector('#NomApprenant');
    let PrenomApprenant = document.querySelector('#PrenomApprenant');
    let EmailApprenant = document.querySelector('#EmailApprenant');
    let PasswordApprenant = document.querySelector('#PasswordApprenant');
    let CompteActiver = document.querySelector('#CompteActiver');
    let data = {
        "NomApprenant": NomApprenant,
        "PrenomApprenant": PrenomApprenant,
        "EmailApprenant": EmailApprenant,
        "PasswordApprenant": PasswordApprenant,
        "CompteActiver": CompteActiver
    }
    const request = new XMLHttpRequest();

    request.open('POST', 'http://gestionapprenant/dashboard/apprenant', true);

    request.setRequestHeader('Content-Type', 'application/json');

    request.send(data);

    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            let affiche = document.querySelector('main');
            affiche.innerHTML = '';
            affiche.innerHTML += request.responseText;
            window.history.replaceState(null, document.title, "/dashboard/apprenant");
            NavOFF();
            ApprenantON();
        }
    }
}
function Apprenant() {
    window.history.replaceState(null, document.title, "/dashboard/apprenant");
    NavOFF();
    ApprenantON();
}








function Deconnexion() {

    const request = new XMLHttpRequest();
    request.open('POST', 'http://gestionapprenant/deconnexion', true);

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