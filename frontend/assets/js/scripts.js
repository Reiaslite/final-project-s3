document.addEventListener('DOMContentLoaded', () => {
    // events in the hamburger
    document.getElementsByClassName('hamburger-container')[0].addEventListener('click', () => {
        document.getElementsByClassName('container-menu')[0].classList.toggle('active');
    })
})