<?php
include("header.php");
?>
<section class="main">
    <div class="objects">
        <article>
            <img src="../assets/img/objects/corde.png">
            <input type="radio" name="option" value="corde" onclick="addobject('corde')">Add<br>
        </article>
        <article>
            <img src="../assets/img/objects/cadre.png">
            <input type="radio" name="option" value="cadre" onclick="addobject('cadre')">Add<br>
        </article>
        <article>
            <img src="../assets/img/objects/lunette.png">
            <input type="radio" name="option" value="lunette" onclick="addobject('lunette')">Add<br>
        </article>
        <article>
            <img src="../assets/img/objects/marvin.png">
            <input type="radio" name="option" value="marvin" onclick="addobject('marvin')">Add<br>
        </article>
        <div class="clear"></div>
    </div>

    <div class="cadre">
        <video id="video"></video>
        <img src="" class="hidden" id="picture">
        <button disabled id="startbutton">Prendre une photo</button>
    </div>

    <canvas id="canvas" hidden></canvas>
    <div class="clear"></div>

</section>

<script src="../assets/webcam.js" type="text/javascript"></script>
<script src="../assets/script.js" type="text/javascript"></script>