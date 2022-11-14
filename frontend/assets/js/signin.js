document.getElementsByClassName('btn-signin')[0].addEventListener('click', (e) => {
    const values = document.querySelectorAll('input');
    for (const value of values) {
        if(value != 'undefined') {
            swal.fire({
                title: 'Berhasil',
                text: 'Anda berhasil login!',
                icon: 'success',
                confirmButton: true,
            }).then((result) => {
                if(result.isConfirmed) {
                    window.location.href = 'index.html';
                }
            })
        } 
    }
    e.preventDefault();
  })