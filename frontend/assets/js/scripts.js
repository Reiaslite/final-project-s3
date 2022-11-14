// events in the hamburger
document.getElementsByClassName('hamburger-container')[0].addEventListener('click', () => {
    document.getElementsByClassName('container-menu')[0].classList.toggle('active');
});

const bottoms = document.getElementsByClassName('bottom');
for (const bottom of bottoms) {
    bottom.addEventListener('click', () => {
        swal.fire({
          html: '<h5 class="important5">Nama Calon</h5>' + '<h5 class="important5">Kelas Calon</h5>' + '<h4 class="important4">Visi</h4>' + '<p class="importantp">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi veniam tempora minima consequatur ipsum sunt.</p>' + '<h4 class="important4">Misi</h4>' +'<p class="importantp">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam nesciunt officia at adipisci dolore facere.</p>',
          imageUrl: 'assets/img/4.jpeg',
          imageWidth: 150,
          imageHeight: 'auto',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Pilih',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Batal',
        }).then((result) => {
          if(result.isConfirmed) {
            Swal.fire({
              title: 'Apakah kamu yakin?',
              text: "Ingin memilih calon ini!",
              icon: 'question',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya',
              cancelButtonText: 'Tidak'
            }).then((result) => {
              if (result.isConfirmed) {
                Swal.fire(
                  'Berhasil!',
                  'Anda berhasil memilih calon ini!',
                  'success'
                )
              } else {
                swal.fire(
                  'Batal!',
                  'Anda batal memilih Calon ini!',
                  'error'
                )
              }
            })
          } else {
            swal.fire(
              'Batal!',
              'Anda batal memilih Calon ini!',
              'error'
            )
          }
        })
    });
};