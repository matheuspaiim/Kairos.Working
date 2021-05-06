
var btnContact = document.querySelector('.kw-btn-contact')
var toggleModal = document.querySelectorAll('.kw-toggle-modal')

/* ABRINDO E FECHANDO INFORMAÇÕES DE CONTATO */
btnContact.addEventListener('click', function() {
    var boxContact = document.querySelector('.kw-contact-info')
    boxContact.classList.toggle('kw-is-open');
    this.classList.toggle('kw-change-icon');
});

/* ABRINDO E FECHANDO O MODAL DE LOGIN */

for(var i = 0; i < toggleModal.length; i++) {
    toggleModal[i].addEventListener('click', function() {
        var overlay = document.querySelector('.kw-overlay')
        var modalLogin = document.querySelector('#kw-modal-login')

        overlay.classList.toggle('kw-is-open');
        modalLogin.classList.toggle('kw-is-open');
        modalLogin.classList.toggle('kw-slide-in');
    });
}   