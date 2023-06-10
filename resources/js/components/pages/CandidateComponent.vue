<template>
  <div>
    <sidebar-component/>
	<header-component/>
    <div class="page-wrapper">
      <div class="page-content">
        <div class="card">
          <div class="card-body">
            <div class="mb-3">
              <form @submit.prevent="handleSubmit" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="formFile" class="form-label">Foto Kandidat</label>
                  <input class="form-control" type="file" id="formFile" ref="myImage" @change="previewFiles" />
                </div>
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" v-model="form.name" />
                </div>
                <div class="mb-3">
                  <label for="visi_misi" class="form-label">Visi dan Misi</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="form.visi_misi"></textarea>
                </div>
                <button type="submit" class="btn btn-md btn-primary">Save</button>
                <button type="reset" class="btn btn-md btn-warning">Reset</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
// import router from "@/router";

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
      formData.append("photo", this.form.photo);

      axios
        .post("http://127.0.0.1:8000/api/auth/candidates", formData, {
          headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
          },
        })
        .then((response) => {
          console.log(response);

          this.form.name = "";
          this.form.visi_misi = "";
          this.form.photo = null;
          this.$refs.myImage.value = null;

          Swal.fire({
            icon: "success",
            title: "Data saved successfully!",
            showConfirmButton: false,
            timer: 1500,
          }).then(() => {
            // router.push("/halaman-lain");
            this.$router.push('/candidate');
          });
        })
        .catch((error) => {
          console.log(error);

          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "An error occurred while saving the data.",
          });
        });
    },
    previewFiles() {
      this.form.photo = this.$refs.myImage.files[0];
    },
  },
};
</script>

<style>
</style>
