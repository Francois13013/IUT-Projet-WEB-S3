// LogoHamburger = document.getElementById('hamburger');
// LogoUser = document.getElementById('user');
// menuHamburger = document.querySelector('.menuphonehamburger');
// menuUser = document.querySelector('.menuphoneuser');
//
// inputusername = document.getElementById('usernameinput');
// inputpassword = document.getElementById('passwordinput');
//
// inputpassword.onclick = function (){
//     if(inputpassword.getAttribute('value') == 'password'){
//         inputpassword.setAttribute('value', '');
//     }
// };
//
// window.onresize = function () {
//     // menuUser.style.display = "none";
//     // menuHamburger.style.display = "none";
//     menuUser.classList.remove('offmenu');
//     menuHamburger.classList.remove('offmenu');
//     menuUser.classList.remove('menuuserpcoff');
//     // menuUser.style.transitionDuration = "0.4s";
//     // menuHamburger.style.transitionDuration = "0.4s";
// };
//
// inputusername.onclick = function (){
//     if(inputusername.getAttribute('value') == 'username'){
//         inputusername.setAttribute('value', '');
//     }
// };
//
// LogoHamburger.onclick = function(){
//     menuUser.classList.remove('offmenu');
//     menuHamburger.classList.toggle("offmenu");
// };
//
// LogoUser.onclick = function(){
//     menuHamburger.classList.remove('offmenu');
//     menuUser.classList.toggle("offmenu");
// };
//
// document.getElementById('userpc').onclick = function() {
//     document.querySelector('.menuphoneuser').classList.toggle('menuuserpcoff');
// };
//
// document.getElementById("mainimg").onclick = function() {document.location.href="/Index";};
// document.getElementById("mainimg2").onclick = function() {document.location.href="/Index";};


logoElement = document.getElementById('logoUser');
menuElement = document.querySelector('.userMenu');
// menuSize = menuElement.style.top;
//
// logoElement.onclick = function (){
//     // alert('test');
//     if(menuElement.style.top != '0') {
//         menuElement.style.transitionDuration = '0.3s';
//         menuElement.style.top = '0';
//     } else {
//         menuElement.style.transitionDuration = '0.3s';
//         menuElement.style.top = menuSize;
//     }
// }
toggle = true;

logoElement.onclick = function(){
    if(toggle == true) {
        menuElement.setAttribute("id", "userMenuOff");
        toggle =false;
    } else {
        menuElement.setAttribute("id", "");
        toggle=true;
    }
    // menuElement.classList.toggle('userMenuOff');
}