LogoHamburger = document.getElementById('hamburger');
LogoUser = document.getElementById('user');
menuHamburger = document.querySelector('.menuphonehamburger');
menuUser = document.querySelector('.menuphoneuser');

LogoHamburger.onclick = function(){
    menuHamburger.classList.toggle("offmenu");
}

LogoUser.onclick = function(){
    menuUser.classList.toggle("offmenu");
}

// window.onclick =function (){
//     alert('100');
// }