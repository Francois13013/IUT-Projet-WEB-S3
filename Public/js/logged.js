function loggedMenu(Pseudo){
    var menu = document.querySelector('.userMenu');
    menu.innerHTML = 'Bonjour, ' + Pseudo;
    var btn = document.createElement("BUTTON");
    btn.innerHTML = "Déconnexion ";
    var btn2 = document.createElement("BUTTON");
    btn.setAttribute('formaction','/Controllers/controllerLogOff.php');
    btn2.setAttribute('formaction','/MyProfile');
    btn2.innerHTML = "Mon profil ";
    document.querySelector('.userMenu').appendChild(btn);
    document.querySelector('.userMenu').appendChild(btn2);
}