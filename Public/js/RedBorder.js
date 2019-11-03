function ErrorCall(errorname)
{
    let tmp = errorname;
    if (errorname === 'BadLog') {
        document.querySelector('#logoUser').click();
        tmp = 'usernameInput';
        ErrorCall('passwordInput');
    }
    if (errorname === 'PseudoExistant') {
        tmp = 'pseudoInput';
        document.getElementById('labelPseudo').innerHTML = document.getElementById('labelPseudo').innerHTML + ' (Pseudo déjà pris)';
    }
    if (errorname === 'EmailExistant') {
        tmp = 'emailInput';
        document.getElementById('emailLabel').innerHTML = document.getElementById('emailLabel').innerHTML + ' (Email déjà incrite)';
    }
    if (errorname === 'SecondPassword') {
        tmp = 'twicePasswordInput'; ErrorCall('passwordInputRegister');
    }
    if (errorname === 'Password') {
        tmp = 'passwordInputRegister';
    }
    if (errorname === 'Pseudo') {
        tmp = 'pseudoInput';
    }
    if (errorname === 'Email') {
        tmp = 'emailInput';
    }
    document.getElementById(tmp).style.borderWidth = '3px';
    document.getElementById(tmp).style.borderColor = 'Red';
}