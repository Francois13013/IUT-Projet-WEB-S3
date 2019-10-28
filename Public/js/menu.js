logoElement = document.getElementById('logoUser');
menuElement = document.querySelector('.userMenu');
toggle = true;

logoElement.onclick = function(){
    if(toggle == true) {
        menuElement.setAttribute("id", "userMenuOff");
        toggle =false;
    } else {
        menuElement.setAttribute("id", "");
        toggle=true;
    }
}

document.getElementById('logoFreenote').onclick = function() {
    document.location.href='/';
}