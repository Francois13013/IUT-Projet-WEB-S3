LogoHamburger = document.getElementById('hamburger');
LogoUser = document.getElementById('user');
menuHamburger = document.querySelector('.menuphonehamburger');
menuUser = document.querySelector('.menuphoneuser');

inputusername = document.getElementById('usernameinput');
inputpassword = document.getElementById('passwordinput');

inputpassword.onclick = function (){
    // alert(inputpassword.getAttribute('value'));
    if(inputpassword.getAttribute('value') == 'password'){
        // alert("test");
        inputpassword.setAttribute('value', '');
    }
    //!= 'password') {
    //
    // }
}

inputusername.onclick = function (){
    if(inputusername.getAttribute('value') == 'username'){
        inputusername.setAttribute('value', '');
    }
}

LogoHamburger.onclick = function(){
    timetmp = menuUser.style.transitionDuration;
    menuUser.style.transitionDuration = '0s';
    menuUser.classList.remove('offmenu');
    menuHamburger.classList.toggle("offmenu");
    menuUser.style.transitionDuration = timetmp.toString();
}

LogoUser.onclick = function(){
    timetmp = menuHamburger.style.transitionDuration;
    menuHamburger.style.transitionDuration = '0s';
    menuHamburger.classList.remove('offmenu');
    menuUser.classList.toggle("offmenu");
    menuHamburger.style.transitionDuration = timetmp.toString();
}



// window.onclick =function (){
//     alert('100');
// }