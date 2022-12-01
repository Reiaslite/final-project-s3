//view
const views = document.getElementsByClassName('view');
for (const view of views) {
    view.addEventListener('click', async () => {
        const id = view.getAttribute('data-id');
        console.log(id);
        const response = await fetch(`../../api/getkandidat.php?id=${id}`);
        const json= await response.json();
        const data = json.data;
        Swal.fire({
            text: 'Modal with a custom image.',
            imageUrl: '../../assets/img/4.jpeg',
            imageWidth: 100,
            imageHeight: 100,
            imageAlt: 'Custom image',
            html:`<h5 class="important5">${data.nama}</h5>
                <h5 class="important5">${data.kelas}</h5>
                <h4 class="important4">Visi</h4>
                <p class="important">${data.visi}</p>
                <h4 class="important4">Misi</h4>
                <p class="importantp">${data.misi}</p>
                `,
        })
    })
};
//== end view

//add
document.getElementsByClassName('add')[0].addEventListener('click', () => {
    Swal.fire({
        text: 'Modal with a custom image.',
        html:`
        <h2>Tambah Data Kandidat</h2>
        <form method="post" class="form" id="form-id">
            <input type="text" placeholder="nama" name="nama" class="form-control input" id='name'>
            <input type="text" placeholder="kelas" name="kelas" class="form-control input" id='kelas'>
            <textarea type="text" placeholder="visi" name="visi" class="form-control textarea" id='visi'></textarea>
            <textarea type="text" placeholder="misi" name="misi" class="form-control textarea" id='misi'></textarea>
            <input type="file" placeholder="file" name="file" class="form-control input" id='gambar'>
            </form>
            `,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tambah',
        cancelButtonText: 'Batal',
        focusConfirm: false,
        //===========================================================
        preConfirm: () => {
            const nama = Swal.getPopup().querySelector('#name').value
            const kelas = Swal.getPopup().querySelector('#kelas').value
            const visi = Swal.getPopup().querySelector('#visi').value
            const misi = Swal.getPopup().querySelector('#misi').value

            if(!nama || !kelas || !visi || !misi){
                Swal.showValidationMessage("Tolong isi dengan lengkap")
            }

            return { nama, kelas, visi, misi}
        }    
    }).then(async (result)=>{
        if(result.value){
            const _=document.querySelector('#form-id');
            const form = new FormData(_);



            const res = await fetch (`../../api/admin.php`, {
                method: "POST",
                body: form,
            })
            console.log(res)
        }

    })


});
//======================end add

//update
const updates = document.getElementsByClassName('update');
for (const update of updates) {

    //==ini yang gw tambahin
    update.addEventListener('click', async() => {
        const id = update.getAttribute('data-id');
         console.log(id);

        const response = await fetch(`../../api/getkandidat.php?id=${id}`);
        const json= await response.json();
        const data = json.data;
        // //==batas==

        Swal.fire({
            text: 'Modal with a custom image.',
            html:`
            <h2>Ubah Data Kandidat</h2>
            <form method="post" class="form" id="form-id">

                <input type="text" placeholder="id" name="id" class="form-control input" id='id' value='${data.id}' readonly='readonly'>
                <input type="text" placeholder="nama" name="nama" class="form-control input" id='name' value='${data.nama}'>
                <input type="text" placeholder="kelas" name="kelas" class="form-control input" id='kelas' value='${data.kelas}'>
                <textarea type="text" placeholder="visi" name="visi" class="form-control textarea" id='visi'>${data.visi}</textarea>
                <textarea type="text" placeholder="misi" name="misi" class="form-control textarea" id='misi'>${data.misi}</textarea>
                <input type="file" placeholder="file" name="file" class="form-control input">
                </form>
                `,
            showCancelButton: true,
            confirmButtonColor: '#ffc107',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ubah',
            cancelButtonText: 'Batal',

            preConfirm: () => {
                const id = Swal.getPopup().querySelector('#id').value
                const nama = Swal.getPopup().querySelector('#name').value
                const kelas = Swal.getPopup().querySelector('#kelas').value
                const visi = Swal.getPopup().querySelector('#visi').value
                const misi = Swal.getPopup().querySelector('#misi').value
    
                if(!nama || !kelas || !visi || !misi){
                    Swal.showValidationMessage("Tolong isi dengan lengkap")
                }
    
                return { id, nama, kelas, visi, misi}
            }


        }).then(async (result)=>{
            if(result.value){
                const _=document.querySelector('#form-id');
                const form = new FormData(_);
    
    
    
                const res = await fetch (`../../api/admin-update.php`, {
                    method: "POST",
                    body: form,
                })
                console.log(res)
            }
    
        })
    })
}