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
		  <div class="page-content ms-auto">
						<div class="card radius-10 w-100">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="mb-0">Results</h6>
									</div>	
								</div>
							</div>
							<div class="dashboard-top-countries mb-3 p-3">
								<div class="row mb-4 " v-for="item in items" :key="item.message">
									<div class="col-sm-3 text-center">
										<img
										:src="'/storage/image/' + item.photo"
										width="100"
										height="100"
										alt=""
										/>
									</div>
									<div class="col-sm-9">
										<p class="mb-2">{{item.name}} <strong class="float-end">{{ item.percentage }}</strong></p>
										<div class="progress radius-10" style="height:16px;">
											<div class="progress-bar bg-gradient-blues" role="progressbar" :style="{ width: item.percentage + '%' }">{{ item.percentage }}%</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					 
		  </div>
		  
		</div>
		<!--end page wrapper -->
	</div>


  </template>

<script>
import Swal from 'sweetalert2';

export default {
  // components: { HeaderComponent },
  data() {
    return {
      items: [],
	  timingVote:""
    };
  },
  methods: {
  async fetchData() {
    try {
      // Fetch voting data
      const response = await axios.get("https://voting.surabayawebtech.com/api/auth/votes", {
        headers: {
          Authorization: 'Bearer ' + localStorage.getItem('token')
        }
      });
      this.items = response.data.data;

      // Fetch timing data
      const responsetime = await axios.get("https://voting.surabayawebtech.com/api/auth/time", {
        headers: {
          Authorization: 'Bearer ' + localStorage.getItem('token')
        }
      });
      this.timingVote = responsetime.data.data[0];

      // Pengecekan waktu voting
      const currentTime = new Date().toISOString();
      const startTime = this.timingVote.start_time;
      const endTime = this.timingVote.end_time;

      if (startTime < currentTime && endTime > currentTime) {
        Swal.fire({
          title: 'Voting Masih Berlangsung',
          text: 'Voting masih berlangsung, silakan coba lagi setelah waktu voting berakhir.',
          icon: 'warning',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'OK'
        }).then(() => {
          // Redirect to a specific page
          this.$router.push('/candidate');
        });;
      }
    } catch (error) {
      console.error(error);
      // Handle error case
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

  <style>
  
  </style>