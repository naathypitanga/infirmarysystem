const body = document.querySelector('body');
window.addEventListener('scroll', onScroll);


onScroll();

function onScroll() {
    showNavOnScroll();
}

function showNavOnScroll(){
    if(scrollY > 100){
        body.classList.remove('hide')
        }else {
            body.classList.add('hide')
        }
}

