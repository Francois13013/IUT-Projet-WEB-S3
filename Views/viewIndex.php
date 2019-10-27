<?php require_once('Controllers/controllerIndex.php')?>

<div id="mainIndex">
<link rel="stylesheet" href="../Public/css/styleIndex.css">
<!--<h1>Bievenue sur l'accueil</h1>-->
    <div id='containerInfoTop'>
         <div class="container" id="containerInfo">
           <p>e depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser
            un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique
            informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant
               des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de
               des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de
               des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de
               des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de

            des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de
            texte, comme Aldus PageMaker. </p>
         </div>
         <div class="container" id="containerTop">
         </div>
    </div>
    <div class="container" id="containerTopic">
            <form id="createTopic" method="post"  onsubmit="<?php controllerAddTopic();?>" >
                <label></label>
                <input type="text" name="nameTopic">
                <button action="submit"> Créer nouveau topic </button>
            </form>
            <?php Request();?>
    </div>



</div>
<?php

?>