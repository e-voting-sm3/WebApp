<template>
  <div class="wrapper">
    <div
      class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0"
    >
      <div class="container-fluid">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
          <div class="col mx-auto">
            <div class="mb-4 text-center"></div>
            <div class="card">
              <div class="card-body">
                <div class="p-4 rounded">
                  <div class="text-center">
                    <h3 class="">Sign Up</h3>
                    <p>
                      Already have an account? <a href="/login">Sign in here</a>
                    </p>
                  </div>

                  <div class="login-separater text-center mb-4">
                    <span>SIGN UP WITH EMAIL</span>
                    <hr />
                  </div>
                  <div class="form-body">
                    <form class="row g-3" @submit.prevent="handleSubmit">
                      <div class="col-12">
                        <label for="inputFirstName" class="form-label"
                          >Name</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="inputFirstName"
                          placeholder="Jhon"
						  v-model="name"
                        />
                      </div>
                      <div class="col-12">
                        <label for="inputEmailAddress" class="form-label"
                          >Email Address</label
                        >
                        <input
                          type="email"
                          class="form-control"
                          id="inputEmailAddress"
                          placeholder="example@user.com"
						  v-model="email"
                        />
                      </div>
                      <div class="col-12">
                        <label for="inputChoosePassword" class="form-label"
                          >Password</label
                        >
                        <div class="input-group" id="show_hide_password">
                          <input
                            type="password"
                            class="form-control border-end-1"
                            id="inputChoosePassword"
                            placeholder="Enter Password"
							v-model="password"
                          />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="d-grid">
                          <button type="submit" class="btn btn-primary">
                            <i class="bx bx-user"></i>Sign up
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
export default {
  data: () => {
    return {
		name:"",
		email: "",
		password: "",
    };
  },
  methods: {
	async handleSubmit()
	{
		const response = await axios.post('http://voting.surabayawebtech.com/api/auth/register',{
			name: this.name,
			email: this.email,
			password: this.password
		});
		this.$router.push("/");
	}
  },
};
</script>
<style lang="scss" scoped>

</style>