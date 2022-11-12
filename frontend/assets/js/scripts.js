document.addEventListener('DOMContentLoaded', () => {
    // events in the hamburger
    document.getElementsByClassName('hamburger-container')[0].addEventListener('click', () => {
        document.getElementsByClassName('container-menu')[0].classList.toggle('active');
    })

    const bottoms = document.getElementsByClassName('bottom');
    for (const bottom of bottoms) {
        bottom.addEventListener('click', () => {
            document.getElementsByClassName('candidate-pair-details')[0].classList.add('active');
        })
    }
    
    document.getElementsByClassName('close-container')[0].addEventListener('click', () => {
        document.getElementsByClassName('candidate-pair-details')[0].classList.remove('active');
    })
})