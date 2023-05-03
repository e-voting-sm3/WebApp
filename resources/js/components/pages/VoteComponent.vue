<template>
  <div>
    <sidebar-component/>
    <header-component/>
    <div class="page-wrapper">
      <div class="page-content">
        <h6 class="mb-0 text-uppercase">Vote</h6>
        <hr />
        
        <div v-for="item in candidates" :key="item.id">
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
                      @click="vote(item.id)"
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
      userId: null
    };
  },
  methods: {
    async fetchData() {
      try {
        const response = await axios.get('http://localhost:8000/api/auth/candidates', {
          headers:{
            Authorization: 'Bearer ' + localStorage.getItem('token')
          }
        });
        this.candidates = response.data.data;
        console.log(this.candidates);

        const meResponse = await axios.post('http://localhost:8000/api/auth/me', {}, {
          headers:{
            Authorization: 'Bearer ' + localStorage.getItem('token')
          }
        });
        this.userId = meResponse.data.id;
        console.log(this.userId);
      } catch (error) {
        console.log(error.response.data.message);
      }
    },
    async vote(candidateId) {
      try {
        const response = await axios.post('http://localhost:8000/api/auth/votes', {
          voter_id: this.userId,
          candidate_id: candidateId
        }, {
          headers: {
            Authorization: 'Bearer ' + localStorage.getItem('token')
          }
        });
        console.log(response.data.message);
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
