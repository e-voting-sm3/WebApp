<template>
	<div class="wrapper">
	  <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
		<div class="container-fluid">
		  <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
			<div class="col mx-auto">
			  <div class="mb-4 text-center"></div>
			  <div class="card">
				<div class="card-body">
				  <div class="p-4 rounded">
					<div class="text-center">
					  <h3 class="">Sign in</h3>
					</div>
					<div class="login-separater text-center mb-4">
					  <span>SIGN IN WITH EMAIL</span>
					  <hr />
					</div>
					<div class="form-body">
					  <form class="row g-3" @submit.prevent="handleSubmit">
						<div class="col-12">
						  <label for="inputEmailAddress" class="form-label"
							>Email Address</label
						  >
						  <input
							type="email"
							class="form-control"
							id="inputEmailAddress"
							placeholder="Email Address"
							v-model="email"
						  />
						</div>
						<div class="col-12">
						  <label for="inputChoosePassword" class="form-label"
							>Enter Password</label
						  >
						  <div class="input-group" id="show_hide_password">
							<input
							  type="password"
							  class="form-control border-end-1"
							  id="inputChoosePassword"
							  v-model="password"
							  placeholder="Enter Password"
							/>
						  </div>
						</div>
						<div class="col-md-6">
						  <div class="form-check form-switch">
							<input
							  class="form-check-input"
							  type="checkbox"
							  id="flexSwitchCheckChecked"
							  checked
							/>
							<label
							  class="form-check-label"
							  for="flexSwitchCheckChecked"
							  >Remember Me</label
							>
						  </div>
						</div>
						<div class="col-12">
						  <div class="d-grid">
							<button
							  type="submit"
							  class="btn btn-primary"
							  :disabled="!email || !password"
							>
							  <i class="bx bxs-lock-open"></i>Sign in
							</button>
						  </div>
						</div>
					  </form>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		  <!--end row-->
		</div>
	  </div>
	</div>
  </template>


<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    async handleSubmit() {
      try {
        const response = await axios.post('http://127.0.0.1:8000/api/auth/login', {
          email: this.email,
          password: this.password
        });

        if (response.data.level === 'admin') {
          localStorage.setItem('token', response.data.access_token);
          localStorage.setItem('expires_in', response.data.expires_in);
          this.$router.push("/dashboard");
        } else {
          Swal.fire({
            icon: "error",
            title: "Login Gagal",
			text: 'email atau password yang anda masukkan salah!'
          }).then(() => {
            this.$router.push('/');
          });
        }
      } catch (error) {
        console.log(error);
      }
    },
  },
};

</script>





