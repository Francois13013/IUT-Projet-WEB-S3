function loggedMenu(firstName){
    var menu = document.querySelector('.menuphoneuser');
    menu.innerHTML = 'Bonjour,' + firstName;
    var btn = document.createElement("BUTTON");
    btn.innerHTML = "Déconnexion ";
    btn.setAttribute('formaction','php/logoff.php');
    document.querySelector('.menuphoneuser').appendChild(btn);
}