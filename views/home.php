<?php
include "header.php";
?>
<div class="section">
    <div class="objects">
        <h3>New creation</h3>
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
        <button disabled class="startbutton" id="startbutton">Take the picture</button>
    </div>

    <canvas id="canvas" hidden></canvas>
    <div class="clear"></div>

    <p>or upload directly your picture : <small>(jpeg only)</small></p>
    <input type="file" name="file" id="file">
    <br>
    <button disabled id="submit" onclick="send()">Send</button>
</div>
<div class="aside">
    <h3>Your old creations</h3>

</div>
<div class="clear"></div>
<script src="../assets/webcam.js" type="text/javascript"></script>
<script src="../assets/script.js" type="text/javascript"></script>
<?php
include 'footer.php';
?>