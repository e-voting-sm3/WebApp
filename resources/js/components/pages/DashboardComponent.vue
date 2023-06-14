<template>
    <div>
        <sidebar-component/>
		<header-component/>

    
    <div class="page-wrapper">
	<!--wrapper-->
		<!--start page wrapper -->
			<div class="page-content">
				<div class="row row-cols-1 row-cols-lg-3">
					<!--waktu dimulai-->
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="flex-grow-1">
										<p class="mb-0">Waktu Mulai</p>
										<h4 class="font-weight-bold">{{startTime}}</h4>
										<p class="text-secondary mb-0 font-13">waktu sedang dimulai</p>
									</div>
									<div class="widgets-icons bg-gradient-lush text-white"><i class='bx bx-time'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--waktu dimulai end-->
					<!--waktu berakhir-->
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="flex-grow-1">
										<p class="mb-0">Waktu Berakhir</p>
										<h4 class="font-weight-bold">{{endTime}}</h4>
										<p class="text-secondary mb-0 font-13">waktu akan berakhir</p>
									</div>
									<div class="widgets-icons bg-gradient-cosmic text-white"><i class='bx bx-time'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--waktu berakhir end-->
					<!--Jumlah kandidat-->
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="flex-grow-1">
										<p class="mb-0">Jumlah Kandidat</p>
										<h4 class="font-weight-bold">{{lengthCandidates}}</h4>
										<p class="text-secondary mb-0 font-13">Kandidat</p>
									</div>
									<div class="widgets-icons bg-gradient-blues text-white"><i class='bx bx-group'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--Jumlah kandidat end-->
					<!--user yg sudah memilih-->
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="flex-grow-1">
										<p class="mb-0">Sudah memilih</p>
										<h4 class="font-weight-bold">{{lengthVoterTrue}}</h4>
										<p class="text-secondary mb-0 font-13">Already vote</p>
									</div>
									<div class="widgets-icons bg-gradient-kyoto text-white"><i class='bx bxs-check'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--user yg sudah memilih end-->
					<!--user yg belum memilih-->
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="flex-grow-1">
										<p class="mb-0">Belum Memilih</p>
										<h4 class="font-weight-bold">{{lengthVoterFalse}}</h4>
										<p class="text-secondary mb-0 font-13">haven't voted yet</p>
									</div>
									<div class="widgets-icons bg-gradient-burning text-white"><i class='bx bx-x'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- total user -->
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="flex-grow-1">
										<p class="mb-0">Jumlah Voter</p>
										<h4 class="font-weight-bold">{{lengthVoters}}</h4>
										<p class="text-secondary mb-0 font-13">all voters</p>
									</div>
									<div class="widgets-icons bg-gradient-burning text-white"><i class='bx bx-group'></i>
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
import axios from 'axios'

export default {
	data() {
		return {
			time: [],
			candidates: [],
			voters: [],
			startTime: null,
			endTime: null,
			lengthCandidates: 0,
			lengthVoters:0,
			lengthVoterTrue: 0,
			lengthVoterFalse: 0,
		}
	},
	methods: {
		async fetchData() {
			try {
				const responseTime = await axios.get("http://127.0.0.1:8000/api/auth/time", {
					headers: {
						Authorization: 'Bearer ' + localStorage.getItem('token')
					}
				});
				this.time = responseTime.data.data[0];
				this.startTime = this.time.start_time;
				this.endTime = this.time.end_time;
				console.log(responseTime.data)
				console.log(responseTime.data.data)
				console.log(responseTime.data.data[0].start_time)

				const responseCandidates = await axios.get("http://127.0.0.1:8000/api/auth/candidates", {
					headers: {
						Authorization: 'Bearer ' + localStorage.getItem('token')
					}
				});
				this.candidates = responseCandidates.data.data;
				this.lengthCandidates = this.candidates.length;

				const responseVoters = await axios.get("http://127.0.0.1:8000/api/auth/voters", {
					headers: {
						Authorization: 'Bearer ' + localStorage.getItem('token')
					}
				});
				this.voters = responseVoters.data.data;
				this.lengthVoters = this.voters.length;
				this.lengthVoterTrue = this.voters.filter(voter => voter.status === 'true').length;
				this.lengthVoterFalse = this.voters.filter(voter => voter.status === 'false').length;
			} catch (error) {
				console.log(error);
			}
		}
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
}
</script>


<style>
* {
    text-decoration: none;
    margin: 0px;
    padding: 0px;
}

body {
    margin: 0px;
    padding: 0px;
    font-family: 'Open Sans',sans-serif;
}

.wrapper {
    width: 1100px;
    margin: auto;
    position: relative;
}

.logo a {
    font-size: 50px;
    font-weight: 800;
    float: left;
    font-family: courier;
    color: #364f6b;
}

section {
    margin: auto;
    display: flex;
    margin-bottom: 50px;
}

.kolom {
    margin-top: 50px;
    margin-bottom: 50px;
}

.kolom .deskripsi {
    font-size: 20px;
    font-weight: bold;
    font-family: 'comic sans ms';
    color: #364f6b;
}

a.tbl-biru {
    background: #3f72af;
    border-radius: 20px;
    margin-top: 20px;
    padding: 15px 20px 15px 20px;
    color: #FFFFFF;
    cursor: pointer;
    font-weight: bold;
}

a.tbl-biru:hover {
    background: #fc5185;
    text-decoration: none;
}

a.tbl-pink {
    background: #fc5185;
    border-radius: 20px;
    margin-top: 20px;
    padding: 15px 20px 15px 20px;
    color: #FFFFFF;
    cursor: pointer;
    font-weight: bold;
}

a.tbl-pink:hover {
    background: #3f72af;
    text-decoration: none;
}

@media screen and (max-width: 991.98px) {
    .wrapper {
        width: 90%;
    }

    .logo a {
        display: block;
        width: 100%;
        text-align: center;
    }

    section {
        display: block;
    }

    section img {
        display: block;
        width: 100%;
        height: auto;
    }
}

</style>