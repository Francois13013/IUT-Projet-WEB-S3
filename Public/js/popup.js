function showPopup(errorText)
{
    // alert('1');
    imgClose = document.createElement('p');
    imgClose.setAttribute("id", "textClose");
    imgClose.innerText = 'Fermer';

    titleText = document.createElement('p');
    titleText.setAttribute("id","errorTitle");
    titleText.innerText = 'Vous avez une erreur';


    divError = document.createElement('div');
    divError.setAttribute("id","topErrorDiv");

    divError.appendChild(titleText);
    divError.appendChild(imgClose);

    newText = document.createElement('p');
    newText.setAttribute("id","errorText");
    newText.innerText = errorText;

    newElement = document.createElement('div');
    newElement.setAttribute("id","errorDiv");

    backgroundDivError = document.createElement('div');
    backgroundDivError.setAttribute("id","backgroundDiv");


    newElement.appendChild(divError);
    newElement.appendChild(newText);

    backgroundDivError.appendChild(newElement);
    document.body.appendChild(backgroundDivError);
    imgClose.onclick = function () {
        backgroundDivError.remove();
    }
}

function popupAnotherTitle(newTitle,errorText)
{
    showPopup(errorText);
    document.querySelector('#errorTitle').innerText = newTitle;
}

Pseudo = document.querySelector("#pseudoQuestionMark");
Email = document.querySelector("#emailQuestionMark");
Password = document.querySelector("#passwordQuestionMark");

Password.onclick = function () {
    popupAnotherTitle(
        'Information','Le mot de passe doit ' +
        'être supérieur à 8 caractères et inférieur à 32 caractères.'
    );
}

Pseudo.onclick = function () {
    popupAnotherTitle(
        'Information','Le pseudo doit ' +
        'être supérieur à 3 caractères et inférieur à 16 caractères.'
    );
}

Email.onclick = function () {
    popupAnotherTitle('Information','L\'adresse doit être standard et l\'hébergeur ne doit pas être jetable.');
}