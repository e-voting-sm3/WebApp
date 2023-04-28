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
										<div class="progress radius-10" style="height:6px;">
											<div class="progress-bar bg-gradient-blues" role="progressbar" :style="{ width: item.total_votes + '%' }"></div>
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
      const response = await axios.get("/api/votes");
      this.items = response.data.data;
    },
    async deleteItem(id) {

      const result = await Swal.fire({
    title: 'Apakah Anda yakin ingin menghapus data ini?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Hapus',
    cancelButtonText: 'Batal'
  });
  
  if (result.isConfirmed) {
    // Jika user mengklik tombol "Hapus"
    // Lakukan proses delete
    axios
        .delete(`/api/candidate/${id}`)
        .then((response) => {
          // Berhasil dihapus dari server, lakukan aksi selanjutnya jika diperlukan
          console.log(response.data);
          this.fetchData();
        })
        .catch((error) => {
          // Terjadi error saat menghapus data dari server, tampilkan pesan error jika diperlukan
          console.error(error);
        });
    
    // Tampilkan SweetAlert2 jika proses delete berhasil
    // await Swal.fire({
    //   title: 'Data berhasil dihapus!',
    //   icon: 'success',
    //   timer: 1500,
    //   timerProgressBar: true,
    //   showConfirmButton: false
    // });
    
    // Redirect ke halaman tertentu
    this.$router.push('/candidate');
  }
      
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