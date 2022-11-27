// events in the hamburger
document.getElementsByClassName('hamburger-container')[0].addEventListener('click', () => {
    document.getElementsByClassName('container-menu')[0].classList.toggle('active');
});

const bottoms = document.getElementsByClassName('bottom');
for (const bottom of bottoms) {

    bottom.addEventListener('click',async () => {
        const id = bottom.getAttribute('data-id');
        const response = await fetch(`api/getkandidat.php?id=${id}`);
        const json= await response.json();
        const data = json.data;
        console.log(id);
        swal.fire({
          html:`<h5 class="important5">${data.nama}</h5>
          <h5 class="important5">${data.kelas}</h5>
          <h4 class="important4">Visi</h4>
          <p class="important">${data.visi}</p>
          <h4 class="important4">Misi</h4>
          <p class="importantp">${data.misi}</p>
         `,
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
            }).then(async (result) => {
              if (result.isConfirmed) {
                const form = new FormData();
                const id = bottom.getAttribute("data-id");
                const count = bottom.getAttribute("data-count");
                form.append("user_id", getCookieKey("id"));
                form.append("id", id);
                form.append("count", count);

                const response = await fetch('api/accept.php', {
                  method: 'POST',
                  body: form
                });
                console.log(response);
                const json = await response.json();
                console.log(json);
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

// events links on click
const links =  document.getElementsByClassName('page-scroll');
for (const link of links) {
  link.addEventListener('cl', (e) => {
    const attr = link.getAttribute('href');
    const elementHref = document.querySelector(attr);
    // console.log(elementHref.offsetTop)
    const offset = elementHref.offsetTop - 70;
    document.querySelector('html, body').scrollTop = offset;
    e.preventDefault();
  })
}

const getCookieKey = (key) => {
  const cookie = document.cookie;
  
  return cookie.split(`${key}=`)[1].split(';')[0];
}