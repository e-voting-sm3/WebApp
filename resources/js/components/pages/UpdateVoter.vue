<template>
  	<div>
		<!--navigation-->
      <sidebar-component />
		<!--end navigation-->
        
		<!--start header -->
			<header-component/>	
		<!--end header -->
		
		<!--start page wrapper -->
      <h2 class="text-center mt-3 mb-5">Update Data Candidate</h2>
      <form @submit.prevent="updateCandidate">
        <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="name" class="form-label">name</label>
              <input
                type="text"
                class="form-control"
                id="name"
                placeholder="input name"
                v-model="candidate.name"
              />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="visi_misi" class="form-label">visi_misi</label>
              <input
                type="text"
                class="form-control"
                id="visi_misi"
                placeholder="input visi_misi"
                v-model="candidate.visi_misi"
              />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-6">
            <div class="mb-3">
              <div class="row">
                <div class="col-sm-6">
                  <label for="photo" class="form-label">Foto</label>
                  <input
                    type="file"
                    class="form-control"
                    id="photo"
                    name="photo"
                    placeholder="input image"
                    ref="myImage"
                    @change="previewFiles"
                  />
                </div>
                <div class="col-sm-6 customPadding">
                  <p>{{ fileName }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
  
        <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-6">
                <router-link to="/candidate" class="btn btn-outline-danger mb-5"
                  >Back</router-link
                >
              </div>
              <div class="col-sm-6">
                <button type="submit" class="btn btn-outline-primary float-end">
                  Update
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
		<!--end page wrapper -->
	</div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        candidate: [],
        fileName: '',
        itemID: null,
      };
    },
    methods: {
      async fetchData() {
        this.itemID = this.$route.params.id;
        const response = await axios.get(`https://voting.surabayawebtech.com/api/auth/candidates/${this.itemID}`, {
            headers: {
              Authorization: 'Bearer ' + localStorage.getItem('token')
            }
          });
        console.log(this.itemID);
        this.candidate = response.data.data;
      },
  
      updateCandidate() {
        let formData = new FormData();
        formData.append("name", this.candidate.name);
        formData.append("visi_misi", this.candidate.visi_misi);
        formData.append("photo", this.$refs.myImage.files[0]);
  
        console.log(this.candidate.name)
        console.log(this.candidate.visi_misi)
        console.log(this.$refs.myImage.files[0])
  
        axios
    .post(`https://voting.surabayawebtech.com/api/auth/candidates/${this.itemID}`, formData, {
      headers: {
        Authorization: 'Bearer ' + localStorage.getItem('token')
      }
    })
    .then((response) => {
      console.log(response);
    });
        this.candidate.name = "";
        this.candidate.visi_misi = "";
        this.candidate.photo = "";
        this.showAlert()
      },
  
      previewFiles() {
        const file = this.$refs.myImage.files[0];
        this.fileName = file.name;
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = (e) => {
          this.candidate.photo = e.target.result;
        };
      },
      showAlert() {
        // Use sweetalert2
        this.$swal('Data Berhasil di update!!').then(() => {
          // Redirect to a specific page
          this.$router.push('/candidate');
          window.location.href = '/voter';
        });
      }
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
      this.fetchData();
  },
    mounted() {
      // Panggil method fetchData setiap kali nilai itemID berubah
      this.$watch("itemID", this.fetchData);
    },
  };
  </script>
  
  <style scoped>
  .customPadding{
    padding-top: 35px;
  }
  </style>
  
  
  