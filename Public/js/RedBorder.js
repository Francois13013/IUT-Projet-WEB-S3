function ErrorCall(errorname)
{
    let tmp = errorname;
    if (errorname === 'BadLog') {
        if (window.innerWidth <= 1100) {
            document.querySelector('.menuphoneuser').classList.toggle("offmenu");

        } else {
            document.querySelector('.menuphoneuser').classList.toggle("menuuserpcoff");
        }
        tmp = 'usernameinput';
        ErrorCall('passwordinput');
    }
    if (errorname === 'PseudoExistant') {
        tmp = 'Surname';
        document.getElementById('labelPseudo').innerHTML = document.getElementById('labelPseudo').innerHTML + ' (Pseudo déjà pris)';
    }
    if (errorname === 'EmailExistant') {
        tmp = 'Email';
        document.getElementById('labelEmail').innerHTML = document.getElementById('labelEmail').innerHTML + ' (Email déjà incrite)';
    }
    if (errorname === 'SecondPassword') {
        tmp = 'RepeterMDP'; ErrorCall('Password');
    }
    if (errorname === 'Pseudo') {
        tmp = 'Surname';
    }
    document.getElementById(tmp).style.borderWidth = '2px';
    document.getElementById(tmp).style.borderColor = 'Red';
}