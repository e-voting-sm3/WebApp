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
        <div class="card m-auto mb-3 mt-5" style="max-width: 540px">
        <div class="row g-0">
          <div class="col-sm-8">
            <div class="card-body">
              <h5 class="card-title">Start Time</h5>
              <p class="card-text">
                {{ timingVote.start_time }}
              </p>
              <h5 class="card-title">End Time</h5>
              <p class="card-text">
                {{ timingVote.end_time }}
              </p>
            </div>
          </div>
          <div class="col-sm-4">
            <!-- <router-link v-if="set" to="/settime" class="btn btn-outline-primary mt-5">
              Set Time
            </router-link> -->
            <router-link :to="{ name: 'settime', params: { id: timingVote.id } }" class="btn btn-outline-warning customButton">
              Update
            </router-link>
          </div>
        </div>
      </div>
      </div>
    </div>
		<!--end page wrapper -->
	</div>
</template>

<script>
export default {
  data() {
    return {
      timingVote: {},
    };
  },
  methods: {
    async fetchData() {
      try {
        const response = await axios.get("https://voting.surabayawebtech.com/api/auth/time", {
          headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
          },
        });
        this.timingVote = response.data.data[0];
      } catch (error) {
        console.log(error.response.data.message);
      }
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
</script>


<style scoped>
@media screen and (max-width: 600px) {
  /* Gaya CSS khusus untuk tampilan mobile */
  .customButton {
    margin: 0 10px 10px 0 !important;
    float: right !important;
  }
}
@media screen and (min-width: 610px) {
  /* Gaya CSS khusus untuk tampilan mobile */
  .customButton {
    margin-top: 50px !important;
  }
}
</style>