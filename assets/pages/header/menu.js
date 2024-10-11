// Abrir e fechar o menu mobile

function openMenu() {
  let menuMobile = document.querySelector('#menu-aberto');

   {
    if (menuMobile.classList.contains('d-none')) {
      menuMobile.classList.remove('d-none');
      document.querySelector("body").classList.add("overflowHidden");
      document.querySelector("html").classList.add("overflowHidden");
      ;
    } else {
      menuMobile.classList.add('d-none');
      document.querySelector("body").classList.remove("overflowHidden");
      document.querySelector("html").classList.remove("overflowHidden");
    }
  
  }
}
