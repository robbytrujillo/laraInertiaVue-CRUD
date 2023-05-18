<template>
    <Head>
        <title>Crud Mahasiswa</title>
    </Head>

    <div class="container">
        <div class="card-mt-5">
            <div class="card-body">
                <form @submit.prevent="handleSearch">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="/student/create" class="btn btn-primary"
                                >Tambah</a
                            >
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="search"
                                    placeholder="Cari mahasiswa"
                                    aria-label="Cari mahasiswa"
                                    aria-describedby="button-addon2"
                                />
                                <button
                                    class="btn btn-outline-secondary"
                                    type="submit"
                                    id="button-addon2"
                                >
                                    Cari
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <table class="table table-striped mt-4">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Nim</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody v-if="students.data.length > 0">
                        <tr
                            v-for="(student, index) in students.data"
                            :key="index"
                        >
                            <td>{{ student.name }}</td>
                            <td>{{ student.jurusan }}</td>
                            <td>{{ student.kelas }}</td>
                            <td>{{ student.nim }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-warning">Edit</a>
                                    <button class="btn btn-danger">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tbody v-else>
                        <tr>
                            <td colspan="6" class="text-center">
                                data tidak ada
                            </td>
                        </tr>
                    </tbody>
                </table>

                <Pagination :Links="students.links" align="end" />
            </div>
        </div>
    </div>
</template>

<script>
// import head and link from Inertia
import { Head, Link } from "@inertiajs/inertia-vue3";

import Pagination from "resources/js/Components/Pagination.vue";

// import ref from vue
import { ref } from "vue";

// import inertia adapter
import { Inertia } from '@inertiajs/inertia'

export default {
    // register componet
    components: {
        Head,
        Link,
        Pagination,
    },

    // props
    props: {
        students: Object,
    },

    setup() {

        // define state search
        const search = ref('' || (new URL(document.location)).searchParams.get('q'));

        // define method search
        const handleSearch = () => {
            Inertia.get('/student', {
                // send params "q" with value from state "search"
                q: search.value,
            });
        }

        //return
        return {
            search,
            handleSearch,
        }
    }
};
</script>

<style></style>
