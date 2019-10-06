</div>
<script src="js/menu.js"></script>


<script src="js/logged.js"></script>
<?php
if(isset($_SESSION)) {
    echo '<script type="text/javascript">' . 'loggedMenu();' . '</script>';
}
?>
</body>

</html>
