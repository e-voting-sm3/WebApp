<template>
	<div>
		<!--navigation-->
        	<sidebar-component />
		<!--end navigation-->
        
		<!--start header -->
			<header-component/>	
		<!--end header -->
		
		<!--start page wrapper -->
		    <div class="page-wrapper">
      <div class="page-content">
        <div class="card">
          <div class="card-body">
            <div class="mb-3">
              <form @submit.prevent="handleSubmit" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="formFile" class="form-label">Image</label>
                  <input class="form-control" type="file" id="formFile" ref="myImage" @change="previewFiles" />
                </div>
                <div class="mb-3">
                  <label for="nama" class="form-label">Name</label>
                  <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" v-model="form.name" />
                </div>
                <div class="mb-3">
                  <label for="visi" class="form-label">Vision</label>
                  <textarea class="form-control" id="visi" rows="3" v-model="form.visi"></textarea>
                </div>
                <div class="mb-3">
                  <label for="misi" class="form-label">Mission</label>
                  <textarea class="form-control" id="misi" rows="3" v-model="form.misi"></textarea>
                </div>
                <router-link class="btn btn-md btn-danger" to="candidate">
                  Cancel
                </router-link>
                <button type="submit" class="btn btn-md btn-primary">Save</button>
                <!-- <button type="reset" class="btn btn-md btn-warning">Reset</button> -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
		<!--end page wrapper -->
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
        visi: "",
        misi: "",
        photo: null,
      },
    };
  },
  methods: {
    handleSubmit() {
      let formData = new FormData();
      formData.append("name", this.form.name);
      formData.append("visi", this.form.visi);
      formData.append("misi", this.form.misi);
      formData.append("photo", this.form.photo);

      axios
        .post("https://voting.surabayawebtech.com/api/auth/candidates", formData, {
          headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
          },
        })
        .then((response) => {
          console.log(response);

          this.form.name = "";
          this.form.visi = "";
          this.form.misi = "";
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
  created() {
    const token = localStorage.getItem("token");
    const expires_in = localStorage.getItem("expires_in");

    // console.log(new Date());
    // console.log(new Date(expires_in));

    if (!token || !expires_in || new Date() > new Date(expires_in)) {
      // Jika token tidak ada atau kadaluarsa, redirect ke halaman utama
      localStorage.removeItem("token");
      localStorage.removeItem("expires_in");
      this.$router.push("/");
      return;
    }
  },
};
</script>

<style>
</style>
