LogoHamburger = document.getElementById('hamburger');
LogoUser = document.getElementById('user');
menuHamburger = document.querySelector('.menuphonehamburger');
menuUser = document.querySelector('.menuphoneuser');

inputusername = document.getElementById('usernameinput');
inputpassword = document.getElementById('passwordinput');

inputpassword.onclick = function (){
    if(inputpassword.getAttribute('value') == 'password'){
        inputpassword.setAttribute('value', '');
    }
};

window.onresize = function () {
    // menuUser.style.display = "none";
    // menuHamburger.style.display = "none";
    menuUser.classList.remove('offmenu');
    menuHamburger.classList.remove('offmenu');
    menuUser.classList.remove('menuuserpcoff');
    // menuUser.style.transitionDuration = "0.4s";
    // menuHamburger.style.transitionDuration = "0.4s";
};

inputusername.onclick = function (){
    if(inputusername.getAttribute('value') == 'username'){
        inputusername.setAttribute('value', '');
    }
};

LogoHamburger.onclick = function(){
    menuUser.classList.remove('offmenu');
    menuHamburger.classList.toggle("offmenu");
};

LogoUser.onclick = function(){
    menuHamburger.classList.remove('offmenu');
    menuUser.classList.toggle("offmenu");
};

document.getElementById('userpc').onclick = function() {
    document.querySelector('.menuphoneuser').classList.toggle('menuuserpcoff');
}