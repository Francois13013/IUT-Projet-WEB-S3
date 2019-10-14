// function translator(errorname){
//     if(errorname == 'Password'){
//         return 'Password';
//     }
// }
//

// alert('500');
function ErrorCall(errorname){
    var tmp = errorname;
    if(errorname == 'PseudoExistant'){
        tmp = 'Surname';
        document.getElementById('labelPseudo').innerHTML = document.getElementById('labelPseudo').innerHTML + ' (Pseudo déjà pris)';
    }
    if(errorname == 'EmailExistant'){
        tmp = 'Email';
        document.getElementById('labelEmail').innerHTML = document.getElementById('labelEmail').innerHTML + ' (Email déjà incrite)';
    }
    if(errorname == 'SecondPassword'){ tmp = 'RepeterMDP'; ErrorCall('Password');}
    if(errorname == 'Pseudo'){
        tmp = 'Surname';
    }
    // var bypass = translator(errorname);
    document.getElementById(tmp).style.borderColor = 'Red';
    // document.getElementById(errorname).style.borderColor = '';
}