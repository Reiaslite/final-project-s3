const views = document.getElementsByClassName('view');
for (const view of views) {
    view.addEventListener('click', () => {
        Swal.fire({
            text: 'Modal with a custom image.',
            imageUrl: '../../assets/img/4.jpeg',
            imageWidth: 100,
            imageHeight: 100,
            imageAlt: 'Custom image',
            html:`<h5 class="important5">Haikal</h5>
                <h5 class="important5">IF21</h5>
                <h4 class="important4">Visi</h4>
                <p class="important">blbalbala</p>
                <h4 class="important4">Misi</h4>
                <p class="importantp">blbalbala</p>
                `,
        })
    })
};

document.getElementsByClassName('add')[0].addEventListener('click', () => {
    Swal.fire({
        text: 'Modal with a custom image.',
        html:`
        <h2>Tambah Data Kandidat</h2>
        <form action="" method="post" class="form">
            <input type="text" placeholder="nama" name="nama" class="form-control input">
            <input type="text" placeholder="kelas" name="kelas" class="form-control input">
            <textarea type="text" placeholder="visi" name="visi" class="form-control textarea"></textarea>
            <textarea type="text" placeholder="misi" name="misi" class="form-control textarea"></textarea>
            <input type="file" placeholder="file" name="file" class="form-control input">
            </form>
            `,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tambah',
        cancelButtonText: 'Batal'
    })
});

const updates = document.getElementsByClassName('update');
for (const update of updates) {
    update.addEventListener('click', () => {
        Swal.fire({
            text: 'Modal with a custom image.',
            html:`
            <h2>Ubah Data Kandidat</h2>
            <form action="" method="post" class="form">
                <input type="text" placeholder="nama" name="nama" class="form-control input">
                <input type="text" placeholder="kelas" name="kelas" class="form-control input">
                <textarea type="text" placeholder="visi" name="visi" class="form-control textarea"></textarea>
                <textarea type="text" placeholder="misi" name="misi" class="form-control textarea"></textarea>
                <input type="file" placeholder="file" name="file" class="form-control input">
                </form>
                `,
            showCancelButton: true,
            confirmButtonColor: '#ffc107',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ubah',
            cancelButtonText: 'Batal'
        })
    })
}