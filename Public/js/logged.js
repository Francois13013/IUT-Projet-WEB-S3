function loggedMenu(firstName){
    var menu = document.querySelector('.menuphoneuser');
    menu.innerHTML = 'Bonjour, ' + firstName;
    var btn = document.createElement("BUTTON");
    btn.innerHTML = "Déconnexion ";
    var btn2 = document.createElement("BUTTON");
    btn.setAttribute('formaction','Controllers/controllerLogOff.php');
    btn2.setAttribute('formaction','MyProfile');
    btn2.innerHTML = "Mon profil ";
    document.querySelector('.menuphoneuser').appendChild(btn);
    document.querySelector('.menuphoneuser').appendChild(btn2);
}