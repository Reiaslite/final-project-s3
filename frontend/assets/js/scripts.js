document.addEventListener('DOMContentLoaded', () => {
    // events in the hamburger
    document.getElementsByClassName('hamburger-container')[0].addEventListener('click', () => {
        document.getElementsByClassName('container-menu')[0].classList.toggle('active');
    });

    const bottoms = document.getElementsByClassName('bottom');
    for (const bottom of bottoms) {
        bottom.addEventListener('click', () => {
            document.getElementsByClassName('candidate-pair-details')[0].classList.add('active');
        });
    };
    
    document.getElementsByClassName('close-container')[0].addEventListener('click', () => {
        document.getElementsByClassName('candidate-pair-details')[0].classList.remove('active');
    });
    
    document.getElementsByClassName('btn-cancel')[0].addEventListener('click', () => {
        setTimeout(() => {
            document.getElementsByClassName('candidate-pair-details')[0].classList.remove('active');
        }, 0);
    })

    document.getElementsByClassName('btn-select')[0].addEventListener('click', () => {
        document.getElementsByClassName('feedback-contents')[0].classList.add('active');
    });

    document.getElementById('a-1').addEventListener('click', () => {
        document.getElementsByClassName('feedback-contents')[0].classList.remove('active');
    });
    
    document.getElementsByClassName('btn-no')[0].addEventListener('click', () => {
        document.getElementsByClassName('feedback-contents')[0].classList.remove('active');
    });

    document.getElementsByClassName('btn-yes')[0].addEventListener('click', () => {
        document.getElementsByClassName('feedback-contents')[0].classList.remove('active');
        setTimeout(() => {
            document.getElementsByClassName('candidate-pair-details')[0].classList.remove('active');
        }, 0);

        setTimeout(() => {
            swal("Berhasil", "Anda telah berhail memilih calon ini", "success");
        }, 1000)
    })
})