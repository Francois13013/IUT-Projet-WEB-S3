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
