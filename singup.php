<?php include_once('header.php') ?>
<form id="singupform" action="php/singup.php" method="post">
        <a>FirstName</a>
        <input class="inputsingup" type="text" name="FirstName">
        <a>LastName</a>
        <input class="inputsingup" type="text" name="LastName">
        <a>Surname</a>
        <input class="inputsingup" type="text" name="Surname">
        <a>Email</a>
        <input class="inputsingup" type="text" name="Email">
        <a>Password</a>
        <input class="inputsingup" type="password" name="Password">
        <a>PasswordTwice</a>
        <input class="inputsingup" type="password" name="PasswordTwice">
        <input class="inputsingup" type="checkbox" name="checkbox" value="close">
        <input id="submitform" type="submit" value="submit">
    </form>
<?php include_once('footer.php') ?>
