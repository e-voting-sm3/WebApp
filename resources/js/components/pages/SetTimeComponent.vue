<template>
  <div>
    <sidebar-component />
    <header-component />
    <div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3"></div>
        <!--end breadcrumb-->
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Set Time</h6>
            <hr />
            <div class="card">
              <div class="card-body">
                <div class="mb-3">
                  <form @submit.prevent="updateTiming" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="nama" class="form-label">Tanggal mulai</label>
                      <input
                        class="form-control form-control-sm"
                        type="datetime-local"
                        aria-label=".form-control-sm example"
                        v-model="timing.start_time"
                      />
                    </div>
                    <div class="mb-3">
                      <label for="nama" class="form-label">Tanggal berakhir</label>
                      <input
                        class="form-control form-control-sm"
                        type="datetime-local"
                        aria-label=".form-control-sm example"
                        v-model="timing.end_time"
                      />
                    </div>

                    <button type="submit" class="btn btn-md btn-primary">Save</button>
                    <router-link to="/time" class="btn btn-md btn-danger">Cancel</router-link>
                  </form>
                </div>
              </div>
              <!--end row-->
            </div>
          </div>
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
      timing: {
        start_time: "",
        end_time: "",
      },
      itemID: null,
    };
  },
  methods: {
    async fetchData() {
      this.itemID = this.$route.params.id;
      const response = await axios.get(`http://voting.surabayawebtech.com/api/auth/time/${this.itemID}`, {
        headers: {
          Authorization: "Bearer " + localStorage.getItem("token"),
        },
      });
      this.timing = response.data.data;
    },

    updateTiming() {
      const startDate = new Date(this.timing.start_time);
      const endDate = new Date(this.timing.end_time);

      const startDateTime = startDate.toISOString().split(".")[0].replace("T", " ");
      const endDateTime = endDate.toISOString().split(".")[0].replace("T", " ");

      let formData = new FormData();
      formData.append("start_time", startDateTime);
      formData.append("end_time", endDateTime);

      console.log('awal :' + startDateTime);
      console.log('akhir :' + endDateTime);
      axios
        .post(`http://voting.surabayawebtech.com/api/auth/time/${this.itemID}`, formData, {
          headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
          },
        })
        .then((response) => {
          console.log(response);
          this.showAlert();
        })
        .catch((error) => {
          console.error(error);
        });
    },

    showAlert() {
      // Use sweetalert2
      this.$swal("Data Berhasil diupdate!!").then(() => {
        // Redirect to a specific page
        this.$router.push("/time");
      });
    },
  },

  created() {
    // Panggil method fetchData saat pertama kali dijalankan
    this.fetchData();
  },
};
</script>

<style>
</style>
