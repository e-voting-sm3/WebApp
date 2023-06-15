<template>
  <div class="sidebar-wrapper" :class="{ 'sidebar-closed': isSidebarClosed }" data-simplebar="true">
    <div class="sidebar-header">
      <div>
        <img src="assets/images/logo-img.jpeg" class="logo-icon" alt="logo icon">
      </div>
      <div>
        <h4 class="logo-text">EtoV</h4>
      </div>
      <div class="toggle-icon ms-auto" @click="toggleSidebar"><i :class="sidebarIcon"></i></div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
      <li>
        <router-link to="/dashboard">
          <div class="parent-icon">
            <i class="bi bi-speedometer2"></i>
          </div>
          <div class="menu-title">Dashboard</div>
        </router-link>
      </li>
      <li>
        <router-link to="/createcandidate">
          <div class="parent-icon">
            <i class="bi bi-person-add"></i>
          </div>
          <div class="menu-title">Create Candidate</div>
        </router-link>
      </li>
      <li>
        <router-link to="/candidate">
          <div class="parent-icon">
            <i class="bi bi-people"></i>
          </div>
          <div class="menu-title">Data Candidates</div>
        </router-link>
      </li>
      <li>
        <router-link to="/time">
          <div class="parent-icon">
            <i class="bi bi-clock"></i>
          </div>
          <div class="menu-title">Time Vote</div>
        </router-link>
      </li>
      <li>
        <router-link to="/result">
          <div class="parent-icon">
            <i class="bi bi-bar-chart"></i>
          </div>
          <div class="menu-title">Result</div>
        </router-link>
      </li>
      <li>
        <router-link to="/voter">
          <div class="parent-icon">
            <i class="bi bi-person-check"></i>
          </div>
          <div class="menu-title">Data Voter</div>
        </router-link>
      </li>
    </ul>
    <!--end navigation-->
  </div>
</template>

<script>
export default {
  data() {
    return {
      isSidebarClosed: false,
    };
  },
  computed: {
    sidebarIcon() {
      return this.isSidebarClosed ? 'bx bx-last-page' : 'bx bx-first-page';
    },
  },
  methods: {
    toggleSidebar() {
      this.isSidebarClosed = !this.isSidebarClosed;
    },
  },
};
</script>

<style>
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

.sidebar-closed {
  width: 80px;
}

.sidebar-closed .toggle-icon {
  transform: rotate(180deg);
}
</style>
