<template>
  <div>
    <sidebar-component/>
		<header-component/>
    <div class="page-wrapper">
      <div class="page-content">
        <h6 class="mb-0 text-uppercase">Vote</h6>
        <hr />
        
        <div v-for="item in candidates" :key="item.message">
          <div class="card m-auto mb-3 mt-5" style="max-width: 540px">
            <div class="row g-0">
              <div class="col-md-4">
                <img
                  :src="'/storage/image/' + item.photo"
                  width="187"
                  height="187"
                  alt=""
                />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{ item.name }}</h5>
                  <p class="card-text">
                    {{item.visi_misi}}
                  </p>
                  <div class="mt-5 mb-3 float-end">
                    <a
                      href="#"
                      class="btn btn-outline-danger"
                      onclick="vote(item.id)"
                      >Vote</a
                    >
                  </div>
                </div>
              </div>
            </div>
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
      candidates: [],
    };
  },
  methods: {
    async fetchData() {
      const response = await axios.get("/api/candidates");
      this.candidates = response.data.data;
      console.log(this.candidates);
    },
    vote(id) {},
  },
  created() {
    // Panggil method fetchData saat pertama kali dijalankan
    this.fetchData();
  },
};
</script>
  
  <style>
</style>