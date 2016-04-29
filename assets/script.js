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
function send_img(pict, item)
{
    var form = document.createElement('form');
    form.setAttribute('action', '../controllers/create_img.php');
    form.setAttribute('method', 'post');
    var inputvar = document.createElement('input');
    inputvar.setAttribute('type', 'hidden');
    inputvar.setAttribute('name', 'pict');
    inputvar.setAttribute('value', pict);
    form.appendChild(inputvar);
    var inputitem = document.createElement('input');
    inputitem.setAttribute('type', 'hidden');
    inputitem.setAttribute('name', 'item');
    inputitem.setAttribute('value', item);
    form.appendChild(inputitem);
    document.body.appendChild(form);
    form.submit();
}

function send(){
    var filename = document.getElementById('file').value;
    alert (filename);
    if(filename.length != 0)
    {
        if (filename.split('.').pop() == "jpeg" || filename.split('.').pop() == "jpg")
        {
            var item = document.querySelector('input[name="option"]:checked').value;
            send_img(filename, item);
        }
        else
            document.getElementById("file").classList.add('border-red');
    }
    else
        document.getElementById("file").classList.add('border-red');
}
