// events in the hamburger
document.getElementsByClassName('hamburger-container')[0].addEventListener('click', () => {
    document.getElementsByClassName('container-menu')[0].classList.toggle('active');
});

const bottoms = document.getElementsByClassName('bottom');
for (const bottom of bottoms) {
    bottom.addEventListener('click', () => {
        document.getElementsByClassName('candidate-pair-details')[0].classList.add('active');
        document.getElementsByClassName('contents-detail')[0].classList.add('active');
    });
};

document.getElementsByClassName('close-container')[0].addEventListener('click', () => {
    document.getElementsByClassName('candidate-pair-details')[0].classList.remove('active');
});

document.getElementsByClassName('btn-cancel')[0].addEventListener('click', () => {
    setTimeout(() => {
        document.getElementsByClassName('candidate-pair-details')[0].classList.remove('active');
    }, 0);
});

document.getElementsByClassName('btn-select')[0].addEventListener('click', () => {
    swal({
        title: "Apakah kamu yakin?",
        text: "Ingin memilih calon kandidat ini!",
        icon: "warning",
        buttons: ['Tidak', 'Ya'],
        dangerMode: true,
    })
      .then((willDelete) => {
        if (willDelete) {
          swal("Berhasil","Anda telah berhasil memilih calon kandidat ini!", {
            icon: "success",
          });
        } else {
          swal("Anda batal memilih calon kandidat ini!", {
            icon: "error",
          });
        }

        setTimeout(() => {
            document.getElementsByClassName('candidate-pair-details')[0].classList.remove('active');
        }, 0);
    });
})