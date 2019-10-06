function loggedMenu(){
    document.querySelector('.menuphoneuser').innerHTML = 'Vous êtes co';
    var btn = document.createElement("BUTTON");
    btn.innerHTML = "Déconnexion ";
    btn.setAttribute('formaction','php/logoff.php');
    document.querySelector('.menuphoneuser').appendChild(btn);
}