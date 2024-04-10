


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
        }
    }

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