<template>
    <div>
      <sidebar-component />
      <header-component />
      <h2 class="text-center customMargin">Create Data Candidate</h2>
      <form @submit.prevent="handleSubmit" enctype="multipart/form-data">
        <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input
                type="text"
                class="form-control"
                id="name"
                placeholder="input name"
                v-model="form.name"
              />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="name" class="form-label">Visi Misi</label>
              <input
                type="text"
                class="form-control"
                id="visi_misi"
                placeholder="input visi_misi"
                v-model="form.visi_misi"
              />
            </div>
          </div>
        </div>
  
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="name" class="form-label">Foto</label>
                <input
                  type="file"
                  class="form-control"
                  id="photo"
                  v-on:change="onFileChange"
                />
              </div>
            </div>
          </div>
  
        <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-6">
                <router-link to="/portfolio" class="btn btn-outline-danger mb-5"
                  >Back</router-link
                >
              </div>
              <div class="col-sm-6">
                <button type="submit" class="btn btn-outline-primary float-end">
                  Submit
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <footer-admin-component/>
      <change-color-component/>
    </div>
  </template>
    
    <script>
  export default {
    data() {
      return {
        form: {
          name: "",
          visi_misi: "",
          photo:""
        },
      };
    },
    methods: {
      onFileChange(event) {
          this.form.photo = event.target.files[0];
      },
      handleSubmit() {
        let formData = new FormData();
        formData.append("name", this.form.name);
        formData.append("visi_misi", this.form.visi_misi);
        formData.append("photo", this.form.photo);
  
        axios.post("http://voting.surabayawebtech.com/api/auth/candidates", formData, {
          headers: {
            Authorization: 'Bearer ' + localStorage.getItem('token')
          }
        } ).then((response) => {
          console.log(response);
        });
        this.form.name = "";
        this.form.visi_misi = "";
        this.showAlert();
      },
  
      showAlert() {
        // Use sweetalert2
        this.$swal('Data Berhasil di inputkan!!').then(() => {
          // Redirect to a specific page
          this.$router.push('/vote');
        });
      }
  
    },
  };
  </script>
    
    <style scoped>
  .customMargin {
    margin-top: 100px;
    margin-bottom: 50px;
  }
  </style>