<template>
    <div>
        <sidebar-component />
        <header-component />
        <div class="page-wrapper">
            <div class="page-content">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <form
                                @submit.prevent="handleSubmit"
                                enctype="multipart/form-data"
                            >
                                <div class="mb-3">
                                    <label
                                        for="formFile"
                                        class="form-label form-label-lg"
                                        >Foto Kandidat</label
                                    >
                                    <input
                                        class="form-control"
                                        type="file"
                                        id="formFile"
                                        ref="myImage"
                                        @change="previewFiles"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="nama"
                                        class="form-label form-label-lg"
                                        >Nama</label
                                    >
                                    <input
                                        class="form-control form-control-md"
                                        type="text"
                                        aria-label=".form-control-sm example"
                                        v-model="form.name"
                                    />
                                </div>

                                <div class="mb-3">
                                    <label
                                        for="visi_misi"
                                        class="form-label form-label-lg"
                                        >Visi dan Misi</label
                                    >
                                    <textarea
                                        class="form-control"
                                        id="exampleFormControlTextarea1"
                                        rows="3"
                                        v-model="form.visi_misi"
                                    ></textarea>
                                </div>

                                <button
                                    type="reset"
                                    class="btn btn-md btn-warning"
                                >
                                    Reset
                                </button>
                                <button
                                    type="submit"
                                    class="btn btn-md btn-primary"
                                >
                                    Save
                                </button>
                            </form>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    data() {
        return {
            form: {
                name: "",
                visi_misi: "",
                photo: null,
            },
        };
    },
    methods: {
        handleSubmit() {
            let formData = new FormData();
            formData.append("name", this.form.name);
            formData.append("visi_misi", this.form.visi_misi);
            formData.append("photo", this.form.photo); // tambahkan field image ke objek FormData

            axios
                .post(
                    "http://voting.surabayawebtech.com/api/auth/candidates",
                    formData,
                    {
                        headers: {
                            Authorization:
                                "Bearer " + localStorage.getItem("token"),
                        },
                    }
                )
                .then((response) => {
                    console.log(response);
                    // reset form
                    this.form.name = "";
                    this.form.visi_misi = "";
                    this.form.photo = null;
                    // reset input file
                    this.$refs.myImage.value = null;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        previewFiles() {
            this.form.photo = this.$refs.myImage.files[0];
        },
    },
};
</script>
<style></style>
