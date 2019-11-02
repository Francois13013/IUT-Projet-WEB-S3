<?php
?>
<div id="FindUser">
    <p>Rechercher par</p>
    <form action="../Controllers/controllerAdmin.php" method="POST">
        <div>
            <label for="inputTextAdmin">Email</label>
            <input id="inputTextAdmin" name="inputTextAdmin" type="text">
            <label for="inputTextId">Id</label>
            <input id="inputTextId" name="inputTextId" type="text">
            <label for="inputTextPseudo">Pseudo</label>
            <input id="inputTextPseudo" name="inputTextPseudo" type="text">
        </div>
        <div>
            <button type="submit">Chercher</button>
            <button type="submit">Supprimer</button>
        </div>
    </form>
<!--    <div id="InfoUser">-->
<!--        <label for="inputTextAdmin">Email</label>-->
<!--        <input id="inputTextAdmin" type="text">-->
<!--        <label for="inputTextId">Id</label>-->
<!--        <input id="inputTextId" type="text">-->
<!--        <label for="inputTextPseudo">Pseudo</label>-->
<!--        <input id="inputTextPseudo" type="text">-->
<!--    </div>-->

</div>
