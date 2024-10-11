window.addEventListener('mousemove',(event) => {   //Código para movimentar o background
    var elemento= document.getElementById('fundo')
    var x = event.clientX/10+'px';
    var y = event.clientY/10+'px';
   elemento.style.top=x
   elemento.style.left=y
});

const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#floatingPass');

togglePassword.addEventListener('click', (e) => {   //Código para esconder/mostrar a senha
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    togglePassword.classList.toggle('fa-eye-slash');
});

const togglePassword2 = document.querySelector('#togglePassword2');
const password2 = document.querySelector('#floatingPass2');

togglePassword2.addEventListener('click', (e) => {  //Código para esconder/mostrar a senha
    const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
    password2.setAttribute('type', type);
    togglePassword2.classList.toggle('fa-eye-slash');
});