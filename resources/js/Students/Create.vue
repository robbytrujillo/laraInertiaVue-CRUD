<template>
    <Head>
        <title>Tambah Mahasiswa</title>
    </Head>

    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Tambah Mahasiswa</h2>
            </div>
            <div class="card-body">
                <form @submit.prevent="submit">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" v-model="form.name" :class="{
                            'is-invalid': errors.name}" id="name" placeholder="Masukan nama" />
                        <div v-if="errors.name" class="invalid-feedback">
                             {{ errors.name }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select class="form-select" v-model="form.jurusan" id="jurusan" 
                        aria-label="Default select example" :class="{ 'is-invalid': errors.jurusan }">
                    <option selected disabled value="">Pilih Jurusan</option>
                    <option value="Teknik industri">Teknik industri</option>
                    <option value="Informatika">Informatika</option>
                    <option value="Hukum">Hukum</option>
                    <option value="Seni">Seni</option>
                    <option value="Biologi">Biologi</option>
                    <option value="Fisika">Fisika</option>
                    <option value="Kedokteran">Kedokteran</option>
                    </select>
                    <div v-if="errors.jurusan" class="invalid-feedback">
                        {{ errors.jurusan }}
                        </div>
                        </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select class="form-select" v-model="form.kelas" :class="{'is-invalid':errors.kelas }" 
                        id="kelas" aria-label="Default select example">
                        <option selected disabled value="">Pilih kelas</option>
                        <option value="01">01</option> 
                        <option value="02">02</option> 
                        <option value="03">03</option> 
                        <option value="04">04</option> 
                        <option value="05">05</option> 
                        <option value="06">06</option> 
                    </select>
                    <div v-if="errors.kelas" class="invalid-feedback">
                        {{ errors.kelas }}
                    </div>
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">Nim</label>
                        <input type="text" class="form-control" v-model="form.nim" :class="{ 'is-invalid': errors.kelas }" 
                        id="nim" placeholder="Masukan Nama">
                        <div v-if="errors.nim" class="invalid-feedback">
                            {{ errors.nim }}
                        </div>
                    </div>
                    <div class="mb-3 text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</template>

<script>
// import Head and Link from Inertia
import { Head, Link } from '@inertiajs/inertia-vue3';

// import reactive from vue
import { reactive } from 'vue';

// import inertia adapter
import { Inertia } from '@inertiajs/inertia';

// import sweet alert2
import Swal from 'sweetalert2';

export default {

    // register components
    components: {
        Head,
        Link
    },

    // props
    props: {
        errors: Object,
    },

    // composition API
    setup() {

        // define from with reactive
        const form = reactive({
            name: '',
            jurusan: '',
            kelas: '',
            nim: '',
    });

    // method "submit"
    const submit = () => {

        // send data to server
        Inertia.post('/student', {
            // data
            name: form.name,
            jurusan: form.jurusan,
            kelas: form.kelas,
            nim: form.nim,
        }, {
            onSuccess: () => {
                // show success alert
                Swal.fire({
                    title: 'Success!',
                    text: 'Mahasiswa berhasil disimpan',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
            });
        },
});
    }
    return {
        form,
        submit,
    }
}
}
</script>

<style></style>
