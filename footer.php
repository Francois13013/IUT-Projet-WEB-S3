</div>
<link rel="stylesheet" href="css/stylefooter.css">
<div>
    <footer id="footer">
                <p>©2019 Ce site a été réaliser par un groupe d'étudiant de l'Iut informatique d'Aix-Marseille.</p>
                <a href="contact.php"> Feedback </a>
    </footer>
</div>
<script src="js/menu.js"></script>

<script src="js/logged.js"></script>
<?php
    echo $_SESSION['login'];
    echo $_SESSION['firstName'];
    if($_SESSION['login'] == 'ok') {
     echo '<script type="text/javascript">' . 'loggedMenu('.' \''. $_SESSION['Surname'] .'\' '.');'     . '</script>';
} ?>
</body>

</html>
