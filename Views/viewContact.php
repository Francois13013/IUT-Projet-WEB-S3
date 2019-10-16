<head>
    <link rel="stylesheet" href="css/stylefooter.css">
</head>
<form id="contactform" action="php/contact.php" method="post">

    <a>Surname</a>
    <input class="inputcontact" type="text" name="Surname">
    <a>Email</a>
    <input class="inputcontact" type="text" name="Email">
    <select id="reasontype" name="reasontype">
        <option value="1">Questions</option>
        <option value="2">Bug report</option>
        <option value="3">Suggestions </option>
    </select>
    <a>Your message</a>
    <input class="inputcontact2" type="textarea" name="Your Message">
    <input id="subb" type="submit" value="Send message">
</form>
<?php
?>