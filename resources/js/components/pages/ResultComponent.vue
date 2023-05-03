<template>
	<div>
		<sidebar-component/>
		<header-component/>
		<div class="page-wrapper">
		  <div class="page-content ms-auto">
						<div class="card radius-10 w-100">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="mb-0">Hasil Voting</h6>
									</div>	
								</div>
							</div>
							<div class="dashboard-top-countries mb-3 p-3">
								<div class="row mb-4 " v-for="item in items" :key="item.message">
									<div class="col-2">
										<img src="https://awsimages.detik.net.id/community/media/visual/2019/02/19/42393387-9c5c-4be4-97b8-49260708719e.jpeg?w=750&q=90" width="47" alt="">
									</div>
									<div class="col">
										<p class="mb-2">0{{item.candidate_id}} <strong class="float-end">{{ item.total_votes }}</strong></p>
										<div class="progress radius-10" style="height:16px;">
											<div class="progress-bar bg-gradient-blues" role="progressbar" :style="{ width: item.total_votes + '%' }">{{ item.total_votes }}%</div>
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
// import Swal from 'sweetalert2';

export default {
  // components: { HeaderComponent },
  data() {
    return {
      items: [],
    };
  },
  methods: {
    async fetchData() {
      const response = await axios.get("/api/auth/votes",{
        headers:{
          Authorization: 'Bearer ' + localStorage.getItem('token')
        }
      });
      this.items = response.data.data;
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