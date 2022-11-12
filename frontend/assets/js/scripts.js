document.addEventListener('DOMContentLoaded', () => {
    // events in the hamburger
    document.getElementsByClassName('hamburger-container')[0].addEventListener('click', () => {
        document.getElementsByClassName('container-menu')[0].classList.toggle('active');
    })

    // carousel
    const firstSlide = document.getElementsByClassName('first')[0];

    let count = 1;
    setInterval(() => {
        count++;

        if(count > 3) {
            count = 1;
        }

        switch (count) {
            case 1:
                firstSlide.style.marginLeft = '0';
                break;
            case 2:
                firstSlide.style.marginLeft = '-100%';
                break;
            case 3:
                firstSlide.style.marginLeft = '-200%'
            default:
                break;
        }
    }, 5000);
})