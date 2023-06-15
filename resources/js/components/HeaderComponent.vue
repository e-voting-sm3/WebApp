<template>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class="bx bx-menu"></i></div>
            <div class="top-menu ms-auto"></div>
            <div class="user-box dropdown border-light-2">
                <a
                    class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret text-white show"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="true"
                >
                    <img
                        src="assets/images/avatars/avatar-1.png"
                        class="user-img"
                        alt="user avatar"
                    />
                    <div class="user-info ps-3">
                        <p class="user-name mb-0">e-voting</p>
                        <p class="mb-0">Admin</p>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="/"
                                    @click="logout()"
                                >
                                    <i class="bx bx-log-out-circle"></i
                                    ><span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </a>
            </div>
        </nav>
    </div>
</template>
<script>
import Swal from 'sweetalert2';

export default {
  methods: {
    logout() {
      Swal.fire({
        icon: 'question',
        title: 'Konfirmasi Logout',
        text: 'Anda yakin ingin logout?',
        showCancelButton: true,
        confirmButtonText: 'Logout',
        cancelButtonText: 'Batal',
      }).then((result) => {
        if (result.isConfirmed) {
          localStorage.clear();
          localStorage.removeItem('token');
          this.$router.push('/');
        }
      });
    },
  },
};
</script>

<style>
.topbar {
    background-color: #b799ff;
}
</style>
