<template>
    <div class="sidebar-wrapper" data-simplebar="true">
     <div class="sidebar-header">
         <div>
             <img src="assets/images/logo-img.jpeg" class="logo-icon" alt="logo icon">
         </div>
         <div>
             <h4 class="logo-text">EtoV</h4>
         </div>
         <div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
         </div>
     </div>
     <!--navigation-->
     <ul class="metismenu" id="menu">
         <li>
            <a href="/dashboard">
                 <div class="parent-icon">
                     <i class="bi bi-speedometer2"></i>
                 </div>
                 <div class="menu-title">Dashboard</div>
            </a>
         </li>
         <li>
             <a href="/createcandidate">
                 <div class="parent-icon">
                 <i class="bi bi-person-add"></i>
             </div>
                 <div class="menu-title">Create Candidate</div>
             </a>
         </li>
         <li>
             <a href="/candidate">
                 <div class="parent-icon">
                 <i class="bi bi-people"></i>
             </div>
                 <div class="menu-title">Data Candidates</div>
             </a>
         </li>
         <li>
             <a href="/time">
                 <div class="parent-icon">
                 <i class="bi bi-clock"></i>
             </div>
                 <div class="menu-title">Time Vote</div>
             </a>
         </li>
         <li>
             <a href="/result">
                 <div class="parent-icon">
                 <i class="bi bi-bar-chart"></i>
             </div>
                 <div class="menu-title">Result</div>
             </a>
         </li>

         
         <li>
             <a href="/voter">
                 <div class="parent-icon">
                 <i class="bi bi-person-check"></i>
             </div>
                 <div class="menu-title">Data Voter</div>
             </a>
         </li>
         <li>
             <div class="logout bg-danger text-light" @click="logout()">
                Logout
             </div>
         </li>
     </ul>
     <!--end navigation-->
 </div>
</template>
<script>
import Swal from "sweetalert2";

export default {
  methods: {
    logout() {
      Swal.fire({
        icon: "question",
        title: "Konfirmasi Logout",
        text: "Anda yakin ingin logout?",
        showCancelButton: true,
        confirmButtonText: "Logout",
        cancelButtonText: "Batal",
      }).then((result) => {
        if (result.isConfirmed) {
          localStorage.clear();
          localStorage.removeItem("token");
          this.$router.push("/");
        }
      });
    },
  },
};
</script>

<style scoped>
@media screen and (min-width: 600px) {
  /* Gaya CSS khusus untuk tampilan desktop */
        .logout{
            display: none;
        }
}
.logout {
    margin: 20px;
    border-radius: 10px;
    text-align: center;
}
.menu-title {
color: #000000;
}
.logo-text {
font-family: "Arial", sans-serif;
font-weight: bold;
}
.logo-icon {
margin-right: 10px; 
}

</style>