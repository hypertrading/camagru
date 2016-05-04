function addobject($item)
{
    var object  = document.getElementById('#object');
    var takephoto = document.getElementById('startbutton');
    var submit = document.getElementById('submit');
    var img = document.getElementById('picture');
    base_url = '../assets/img/objects/';
    img.src = base_url.concat($item, '.png');
    img.classList.remove("hidden");
    img.classList.add("obj");
    takephoto.disabled = false;
    submit.disabled = false;
}
function send_img(item)
{
    var form = document.createElement('form');
    form.setAttribute('action', '../controllers/create_img.php');
    form.setAttribute('method', 'post');
    form.setAttribute('enctype', 'multipart/form-data');
    var inputpict = document.getElementById('my-file');
    form.appendChild(inputpict);
    var inputitem = document.createElement('input');
    inputitem.setAttribute('type', 'text');
    inputitem.setAttribute('name', 'item');
    inputitem.setAttribute('value', item);
    form.appendChild(inputitem);
    document.body.appendChild(form);
    form.submit();
}

function send(){
    var filename = document.getElementById('my-file').value;
    if(filename.length != 0)
    {
        if (filename.split('.').pop() == "jpeg" || filename.split('.').pop() == "jpg")
        {
            var item = document.querySelector('input[name="option"]:checked').value;
            send_img(item);
        }
        else
            document.getElementById("my-file").classList.add('border-red');
    }
    else
        document.getElementById("my-file").classList.add('border-red');
}


// Fonction for class .button
document.querySelector("html").classList.add('js');
var fileInput  = document.querySelector( ".input-file" ),
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");
button.addEventListener( "click", function( event ) {
    fileInput.focus();
    return false;
});
fileInput.addEventListener( "change", function( event ) {
    the_return.innerHTML = this.value;
});
