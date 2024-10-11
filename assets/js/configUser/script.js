$(tel).mask('(00) 0 0000-0000');

var input = document.querySelector('#foto');
input.addEventListener('change',function(event){
    var reader = new FileReader();

    reader.onload = function (e) {
    $('#preview').attr('src', e.target.result);
    }
    reader.readAsDataURL(event.srcElement.files[0]);

    document.querySelector('#arquivo').innerHTML = event.srcElement.files[0].name;
});