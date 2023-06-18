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
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3"></div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Setting Time</h6>
        <hr />
        <div class="card">
          <div class="card-body">
            <div class="mb-3">
              <form @submit.prevent="updateTiming" enctype="multipart/form-data" ref="form">
                <div class="mb-3">
                  <label for="nama" class="form-label">Start Time</label>
                  <input
                    class="form-control form-control-sm"
                    type="datetime-local"
                    aria-label=".form-control-sm example"
                    v-model="timing.start_time"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="nama" class="form-label">End Time</label>
                  <input
                    class="form-control form-control-sm"
                    type="datetime-local"
                    aria-label=".form-control-sm example"
                    v-model="timing.end_time"
                    required
                  />
                </div>

                <router-link to="/time" class="btn btn-md btn-danger">Cancel</router-link>
                <button type="submit" class="btn btn-md btn-primary">Save</button>
              </form>
            </div>
          </div>
          <!--end row-->
        </div>
      </div>
    </div>
		<!--end page wrapper -->
	</div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";

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
      const response = await axios.get(`https://voting.surabayawebtech.com/api/auth/time/${this.itemID}`, {
        headers: {
          Authorization: "Bearer " + localStorage.getItem("token"),
        },
      });
      this.timing = response.data.data;
    },

    updateTiming() {
      if (this.$refs.form.checkValidity()) {
        const startDate = new Date(this.timing.start_time);
        const endDate = new Date(this.timing.end_time);

        const startDateTime = formatDate(startDate);
        const endDateTime = formatDate(endDate);

        let formData = new FormData();
        formData.append("start_time", startDateTime);
        formData.append("end_time", endDateTime);

        axios
          .post(`https://voting.surabayawebtech.com/api/auth/time/${this.itemID}`, formData, {
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
      } else {
        Swal.fire({
          icon: "error",
          title: "Invalid Input",
          text: "Please fill in all required fields.",
        });
      }
    },

    showAlert() {
      Swal.fire({
        icon: "success",
        title: "Data Berhasil diupdate!",
        showConfirmButton: false,
        timer: 1500,
      }).then(() => {
        window.location.href = '/time';
      });
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
    this.fetchData();
  },
};

function formatDate(date) {
  const year = date.getFullYear();
  let month = date.getMonth() + 1;
  let day = date.getDate();
  let hours = date.getHours();
  let minutes = date.getMinutes();
  let seconds = date.getSeconds();

  month = month < 10 ? "0" + month : month;
  day = day < 10 ? "0" + day : day;
  hours = hours < 10 ? "0" + hours : hours;
  minutes = minutes < 10 ? "0" + minutes : minutes;
  seconds = seconds < 10 ? "0" + seconds : seconds;

  return `${year}/${month}/${day} ${hours}:${minutes}:${seconds}`;
}
</script>

<style>
</style>
