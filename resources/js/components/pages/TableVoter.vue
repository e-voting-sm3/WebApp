<template>
  <div>
    <sidebar-component/>
		<header-component/>

    <div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3"></div>
        <!--end breadcrumb-->
          <div class="card radius-10">
            <div class="card-header bg-transparent">
              <h6 class="mb-0 font-weight-bold">Users</h6>
              </div>
                <div class="table-responsive p-3">
                  <table class="table mb-0">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                      <tbody>
                          <tr v-for="(item, index) in items" :key="item.message">
                            <th scope="row">{{ index + 1 }}</th>
                            <td>{{ item.name}}</td>
                            <td>{{ item.email}}</td>
                            
                            <td>
                              <!-- <a  data-bs-toggle="modal"  class="btn btn-sm btn-warning">EDIT</a> -->
                              <button
                                @click="deleteItem(item.id)"
                                class="btn btn-outline-danger btn-sm"
                              >
                                Delete
                              </button>
                            </td> 
                          </tr> 
                      </tbody>
                  </table>
                </div>
            </div>
          </div>
      </div>
    </div>
  </template>

<script>
import Swal from 'sweetalert2';
import axios from "axios";

export default {
  // components: { HeaderComponent },
  data() {
    return {
      items: [],
    };
  },
  methods: {
    async fetchData() {
      const response = await axios.get("https://voting.surabayawebtech.com/api/auth/voters",{
        headers:{
          Authorization: 'Bearer ' + localStorage.getItem('token')
        }
      });
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
    try {
      // Jika user mengklik tombol "Hapus", lakukan proses delete
      await axios.delete(`https://voting.surabayawebtech.com/api/auth/voters/${id}`, {
        headers: {
          Authorization: 'Bearer ' + localStorage.getItem('token')
        }
      });
      // Berhasil dihapus dari server, lakukan aksi selanjutnya jika diperlukan
      console.log('Data berhasil dihapus');
      this.fetchData();
    } catch (error) {
      // Terjadi error saat menghapus data dari server, tampilkan pesan error jika diperlukan
      console.error(error);
    }
    this.$router.push('/voter');
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