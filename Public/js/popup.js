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
    imgClose.onclick = function (){
        backgroundDivError.remove();
    }
}