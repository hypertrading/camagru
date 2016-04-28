<?php
include("header.php");
?>
<section class="main">
    <div class="objects">
        <article>
            <img src="../assets/img/objects/corde.png">
            <input type="radio" name="option" value="1" onclick="addobject(1)">Add<br>
        </article>
        <article>
            <img src="../assets/img/objects/cadre.png">
            <input type="radio" name="option" value="2" onclick="addobject(2)">Add<br>
        </article>
        <article>
            <img src="../assets/img/objects/lunettes.png">
            <input type="radio" name="option" value="3" onclick="addobject(3)">Add<br>
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