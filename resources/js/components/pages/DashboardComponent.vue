<template>
    <div>
        <sidebar-component/>
		<header-component/>

    
    <div class="page-wrapper">
	<!--wrapper-->
		<!--start page wrapper -->
			<div class="page-content">
				<div class="row row-cols-1 row-cols-lg-3">
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="flex-grow-1">
										<p class="mb-0">Waktu Mulai</p>
										<h4 class="font-weight-bold">{{startTime}}</h4>
										<p class="text-success mb-0 font-13">Analytics for last week</p>
									</div>
									<div class="widgets-icons bg-gradient-cosmic text-white"><i class='bx bx-refresh'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="flex-grow-1">
										<p class="mb-0">Waktu Berakhir</p>
										<h4 class="font-weight-bold">{{endTime}}</h4>
										<p class="text-secondary mb-0 font-13">Analytics for last week</p>
									</div>
									<div class="widgets-icons bg-gradient-burning text-white"><i class='bx bx-group'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="flex-grow-1">
										<p class="mb-0">Jumlah Kandidat</p>
										<h4 class="font-weight-bold">{{lengthCandidates}}</h4>
										<p class="text-secondary mb-0 font-13">Analytics for last week</p>
									</div>
									<div class="widgets-icons bg-gradient-lush text-white"><i class='bx bx-time'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="flex-grow-1">
										<p class="mb-0">Sudah memilih</p>
										<h4 class="font-weight-bold">{{lengthVoterTrue}}</h4>
										<p class="text-secondary mb-0 font-13">Analytics for last month</p>
									</div>
									<div class="widgets-icons bg-gradient-kyoto text-white"><i class='bx bxs-cube'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="flex-grow-1">
										<p class="mb-0">Belum Memilih</p>
										<h4 class="font-weight-bold">{{lengthVoterFalse}}<small class="text-danger font-13">(-16%)</small></h4>
										<p class="text-secondary mb-0 font-13">Analytics for last week</p>
									</div>
									<div class="widgets-icons bg-gradient-blues text-white"><i class='bx bx-line-chart'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div class="flex-grow-1">
										<p class="mb-0">New Sessions</p>
										<h4 class="font-weight-bold">96% <small class="text-danger font-13">(+54%)</small></h4>
										<p class="text-secondary mb-0 font-13">Analytics for last week</p>
									</div>
									<div class="widgets-icons bg-gradient-moonlit text-white"><i class='bx bx-bar-chart'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
				<div class="row">
					<div class="col-12 col-lg-6">
						<div class="card radius-10">
							<div class="card-body">
								<div id="chart1"></div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-6">
						<div class="card radius-10">
							<div class="card-body">
								<div id="chart2"></div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
				<div class="row">
					<div class="col-12 col-lg-8 d-lg-flex align-items-lg-stretch">
						<div class="card radius-10 w-100">
							<div class="card-header border-bottom-0 bg-transparent">
								<div class="d-lg-flex align-items-center">
									<div class="">
										<h5 class="mb-1">Website Audience Overview</h5>
										<p class="text-secondary mb-2 mb-lg-0 font-14">There are plenty of free web proxy sites that you can use</p>
									</div>
									<div class="ms-lg-auto">
										<div class="btn-group-round">
											<div class="btn-group">
												<button type="button" class="btn btn-white">Day</button>
												<button type="button" class="btn btn-white">Week</button>
												<button type="button" class="btn btn-white">Month</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div id="chart3"></div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-4 d-lg-flex align-items-lg-stretch">
						<div class="card radius-10 w-100">
							<div class="card-header bg-transparent">Traffic Sources</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped mb-0">
										<thead>
											<tr>
												<th>Source</th>
												<th>Visitors</th>
												<th>Bounce Rate</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>(direct)</td>
												<td>56</td>
												<td>10%</td>
											</tr>
											<tr>
												<td>google</td>
												<td>29</td>
												<td>12%</td>
											</tr>
											<tr>
												<td>linkedin.com</td>
												<td>68</td>
												<td>33%</td>
											</tr>
											<tr>
												<td>bing</td>
												<td>14</td>
												<td>24%</td>
											</tr>
											<tr>
												<td>facebook.com</td>
												<td>87</td>
												<td>22%</td>
											</tr>
											<tr>
												<td>other</td>
												<td>98</td>
												<td>27%</td>
											</tr>
											<tr>
												<td>linkedin.com</td>
												<td>68</td>
												<td>33%</td>
											</tr>
											<tr>
												<td>bing</td>
												<td>14</td>
												<td>24%</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
                
				<div class="row row-cols-1 row-cols-lg-3">
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div id="chart4"></div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div id="chart5"></div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div id="chart6"></div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
				<!--end page wrapper -->
	<!--end wrapper-->
    <!--start switcher-->
                  <!--end row-->
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
			lengthVoterTrue: 0,
			lengthVoterFalse: 0,
		}
	},
	methods: {
		async fetchData() {
			try {
				const responseTime = await axios.get("http://localhost:8000/api/auth/time", {
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

				const responseCandidates = await axios.get("http://localhost:8000/api/auth/candidates", {
					headers: {
						Authorization: 'Bearer ' + localStorage.getItem('token')
					}
				});
				this.candidates = responseCandidates.data.data;
				this.lengthCandidates = this.candidates.length;

				const responseVoters = await axios.get("http://localhost:8000/api/auth/voters", {
					headers: {
						Authorization: 'Bearer ' + localStorage.getItem('token')
					}
				});
				this.voters = responseVoters.data.data;
				this.lengthVoterTrue = this.voters.filter(voter => voter.status === 'true').length;
				this.lengthVoterFalse = this.voters.filter(voter => voter.status === 'false').length;
			} catch (error) {
				console.log(error);
			}
		}
	},
	created() {
		// Panggil method fetchData saat pertama kali dijalankan
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