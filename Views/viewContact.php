<head>
    <link rel="stylesheet" href="./../Public/css/styleContact.css">
</head>
<form id="contactform" action="php/contact.php" method="post">
    <div class="containerContact">
        <label for="contactInput">Surname</label>
        <input class="inputContact" id='contactInput' type="text" name="Surname">
    </div>
    <div class="containerContact">
        <label for="contactEmail">Email</label>
        <input class="inputContact" id='contactInput' type="text" name="Email">
    </div>
    <select class="containerContact" id="reasontype" name="reasontype">
        <option value="1">Questions</option>
        <option value="2">Bug report</option>
        <option value="3">Suggestions </option>
    </select>
    <div class="containerContact" id="text">
        <label for="response">Your Message</label>
        <textarea name="response" id="response" class="u-full-width area-style"></textarea>
    </div>
    <input id="subb" type="submit" value="Send message">





    <!--    <div class="four columns">-->
    <!--        <a>Email</a>-->
    <!--        <input class="inputcontact" type="text" name="Email">-->
    <!--    </div>-->
    <!--    <div class="four columns">-->
    <!--        <select id="reasontype" name="reasontype">-->
    <!--            <option value="1">Questions</option>-->
    <!--            <option value="2">Bug report</option>-->
    <!--            <option value="3">Suggestions </option>-->
    <!--        </select>-->
    <!--   </div>-->
    <!--    <div class="row">-->
    <!--        <label for="response">Your Message</label>-->
    <!--        <textarea name="response" id="response" class="u-full-width area-style"></textarea>-->
    <!--    </div>-->
    <!--    <input id="subb" type="submit" value="Send message">-->
</form>
<?php
?>