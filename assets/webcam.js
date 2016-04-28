(function() {

    var streaming = false,
        video        = document.querySelector('#video'),
        cover        = document.querySelector('#cover'),
        canvas       = document.querySelector('#canvas'),
        photo        = document.querySelector('#photo'),
        startbutton  = document.querySelector('#startbutton'),
        width = 320,
        height = 0;

    navigator.getMedia = ( navigator.getUserMedia ||
    navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia ||
    navigator.msGetUserMedia);

    navigator.getMedia(
        {
            video: true,
            audio: false
        },
        function(stream) {
            if (navigator.mozGetUserMedia) {
                video.mozSrcObject = stream;
            } else {
                var vendorURL = window.URL || window.webkitURL;
                video.src = vendorURL.createObjectURL(stream);
            }
            video.play();
        },
        function(err) {
            console.log("An error occured! " + err);
        }
    );

    video.addEventListener('canplay', function(ev){
        if (!streaming) {
            height = video.videoHeight / (video.videoWidth/width);
            video.setAttribute('width', width);
            video.setAttribute('height', height);
            canvas.setAttribute('width', width);
            canvas.setAttribute('height', height);
            streaming = true;
        }
    }, false);

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

    function takepicture(item) {
        canvas.width = width;
        canvas.height = height;
        canvas.getContext('2d').drawImage(video, 0, 0, width, height);
        var data = canvas.toDataURL('image/png');
        send_img(data, item);
    }

    startbutton.addEventListener('click', function(ev){
        var item = document.querySelector('input[name="option"]:checked').value;
        takepicture(item);
        ev.preventDefault();
    }, false);

})();