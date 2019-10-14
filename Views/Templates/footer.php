</div>
<link rel="stylesheet" href="../../Public/css/stylefooter.css">
    <footer id="footer">
        <a class="bottom" href="#" onClick="MyWindow=window.open('/Index','Accueil','width=600,height=300'); return false;">Accords de confidentialité</a>
        <a class="bottom" href="#" onClick="MyWindow=window.open('/Index','Accueil','width=600,height=300'); return false;">Termes d'utilisation</a>
        <a class="bottom" href="#" onClick="MyWindow=window.open('/Index','Accueil','width=600,height=300'); return false;">Nous contacter</a>
        <a class="bottom" href="#" onClick="MyWindow=window.open('/Index','Accueil','width=600,height=300'); return false;">A propos de nous</a>
        <!--        <p>Ce site a été réaliser par un groupe d'étudiant de l'Iut d'informatique d'Aix-Marseille composé de :..... .... ..... ..... ...... ...... ...... .....</p>-->
    </footer>
<script src="../../Public/js/menu.js"></script>

<script src="../../Public/js/logged.js"></script>
<?php
////    echo $_SESSION['login'];
//    if($_SESSION['login'] == 'ok') {
//     echo '<script type="text/javascript">' . 'loggedMenu('.' \''. $_SESSION["Surname"] .'\' '.');'     . '</script>';
//} ?>

<?php
//    echo $_SESSION['login'];
if($_SESSION['login'] == 'ok') {
    echo '<script type="text/javascript">' . 'loggedMenu('.' \''. $_SESSION["Surname"] .'\' '.');'     . '</script>';
} ?>

</body>
</html>
