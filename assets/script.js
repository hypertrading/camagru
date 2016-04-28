function addobject($img){
    var object  = document.getElementById('#object');
    var submit = document.getElementById('startbutton');
    var img = document.getElementById('picture');
    if ($img == 1)
        img.src = '../assets/img/objects/corde.png';
    else if ($img == 2)
        img.src = '../assets/img/objects/cadre.png';
    else if ($img == 3)
        img.src = '../assets/img/objects/lunettes.png';
    img.classList.remove("hidden");
    img.classList.add("obj");
    submit.disabled = false;
}
