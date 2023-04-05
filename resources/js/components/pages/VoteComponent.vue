<template>
  <div class="page-wrapper">
    <div class="page-content">
      <h6 class="mb-0 text-uppercase">Vote</h6>
      <hr />
      <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
        <div class="col" v-for="(item, index) in candidates" :key="item.message">
          <div class="card radius-15">
            <div class="card-body text-center">
              <div class="p-4 border radius-15">
                <img
                 :src="'/storage/image/' + item.photo"
                  width="110"
                  height="110"
                  class="rounded-circle shadow"
                  alt=""
                />
                <h1 class="mt-2">0{{index+1}}</h1>
                <h5 class="mb-0 mt-2">{{item.name}}</h5>
                <div class="d-grid">
                    <div class="row">
                        <div class="col-sm-6 text-start">
                            <router-link
                                :to="{ name: 'view', params: { id: item.id } }"
                                class="btn btn-outline-warning"
                                >Detail</router-link
                            >
                        </div>
                        <div class="col-sm-6 text-end">
                            <a href="#" class="btn btn-outline-danger" onclick="vote(item.id)">Vote</a>
                        </div>
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
      console.log(this.candidates)
    },
    vote(id){

    }
  },
  created() {
    // Panggil method fetchData saat pertama kali dijalankan
    this.fetchData();
  },
};
</script>
  
  <style>
</style>