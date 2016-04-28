function addobject($item){
    var object  = document.getElementById('#object');
    var submit = document.getElementById('startbutton');
    var img = document.getElementById('picture');
    base_url = '../assets/img/objects/';
    img.src = base_url.concat($item, '.png');
    img.classList.remove("hidden");
    img.classList.add("obj");
    submit.disabled = false;
}
