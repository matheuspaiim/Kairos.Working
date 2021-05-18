
var btnContact = document.querySelector('.btn-contact')
var toggleModal = document.querySelectorAll('.toggle-modal')

/* ABRINDO E FECHANDO INFORMAÇÕES DE CONTATO */
btnContact.addEventListener('click', function() {
    var boxContact = document.querySelector('.contact-info')
    boxContact.classList.toggle('is-open');
    this.classList.toggle('change-icon');
});

/* ABRINDO E FECHANDO O MODAL DE LOGIN */

for(var i = 0; i < toggleModal.length; i++) {
    toggleModal[i].addEventListener('click', function() {
        var overlay = document.querySelector('.overlay')
        var modalLogin = document.querySelector('#modal-login')

        overlay.classList.toggle('is-open');
        modalLogin.classList.toggle('is-open');
        modalLogin.classList.toggle('slide-in');
    });
}   