function loggedMenu(Pseudo)
{
    const menu = document.querySelector('.userMenu');
    menu.innerHTML = '<a id="pseudologged"> Bonjour, ' + Pseudo + '</a>';
    const btn = document.createElement("BUTTON");
    btn.innerHTML = "Déconnexion ";
    const btn2 = document.createElement("BUTTON");
    btn.setAttribute('formaction','/Controllers/controllerLogOff.php');
    btn2.setAttribute('formaction','/MyProfile');
    btn2.innerHTML = "Mon profil ";
    document.querySelector('.userMenu').appendChild(btn);
    document.querySelector('.userMenu').appendChild(btn2);
}