document.getElementsByClassName('btn-signup')[0].addEventListener('click', (e) => {
    const values = document.querySelectorAll('input');
    for (const value of values) {
        if(value != 'undefined') {
            swal.fire({
                title: 'Berhasil',
                text: 'Akun anda telah terdaftar sebagai siswa!',
                icon: 'success',
                confirmButton: true,
            }).then((result) => {
                if(result.isConfirmed) {
                    window.location.href = 'signin.html';
                }
            })
        } 
    }
    e.preventDefault();
})