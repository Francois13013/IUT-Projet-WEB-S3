</div>
<script src="js/menu.js"></script>

<script src="js/logged.js"></script>
<?php
    echo $_SESSION['login'];
    if($_SESSION['login'] == 'ok') {
     echo '<script type="text/javascript">' . 'loggedMenu();'     . '</script>';
} ?>
</body>

</html>
