// function translator(errorname){
//     if(errorname == 'Password'){
//         return 'Password';
//     }
// }
//

// alert('500');
function RedBorder(errorname){
    var tmp = errorname;
    if(errorname == 'PseudoExistant'){
        tmp = 'Surname';

    }
    if(errorname == 'EmailExistant'){ tmp = 'Email'}
    if(errorname == 'SecondPassword'){ tmp = 'RepeterMDP'}

    // var bypass = translator(errorname);
    document.getElementById(tmp).style.borderColor = 'Red';
    // document.getElementById(errorname).style.borderColor = '';
}