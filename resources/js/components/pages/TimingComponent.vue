<template>
  <div>
    <sidebar-component />
    <header-component />
    <div class="page-wrapper">
        <h6 class="mb-0 text-uppercase">Vote</h6>
        <hr />

        <div class="card m-auto mb-3 mt-5" style="max-width: 540px">
          <div class="row g-0">
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Waktu Mulai</h5>
                <p class="card-text">
                  {{ timingVote.start_time }}
                </p>
                <h5 class="card-title">Waktu Berakhir</h5>
                <p class="card-text">
                  {{ timingVote.end_time }}
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <!-- <router-link to="/settime" class="btn btn-outline-warning mt-5">
                  Set Time
                </router-link> -->
              <router-link
                :to="{ name: 'settime', params: { id: timingVote.id } }"
                class="btn btn-outline-warning mt-5"
                >Update</router-link
              >
            </div>
          </div>
        </div>
      </div>
    </div>
</template>
  
<script>
export default {
  data() {
    return {
      timingVote: [],
      userId: null,
    };
  },
  methods: {
    async fetchData() {
      try {
        const response = await axios.get(
          "http://localhost:8000/api/auth/time",
          {
            headers: {
              Authorization: "Bearer " + localStorage.getItem("token"),
            },
          }
        );
        this.timingVote = response.data.data[0];
        console.log(this.timingVote);
      } catch (error) {
        console.log(error.response.data.message);
      }
    },
  },
  created() {
    // Panggil method fetchData saat pertama kali dijalankan
    this.fetchData();
  },
};
</script>
