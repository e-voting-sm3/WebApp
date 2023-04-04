<template>
    <div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3"></div>
        <!--end breadcrumb-->
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Form Kandidat</h6>
            <hr />
            <div class="card" style="width: 18rem;">
              <img
                :src="'/storage/image/' + items.photo"
                class="card-img-top"
              />
              <div class="card-body">
                <h2>{{ items.name }}</h2>
                <h5 class="card-title mt-4">Visi dan Misi</h5>
                <p class="card-text">{{ items.visi_misi }}</p>
              </div>
            </div>
          </div>
        </div>
        <!--end row-->
      </div>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    data() {
      return {
        items: {},
        itemID: null,
      };
    },
    methods: {
      async fetchData() {
        this.itemID = this.$route.params.id;
        const response = await axios.get(`/api/candidates/${this.itemID}`);
        this.items = response.data.data;
      },
    },
    created() {
      this.fetchData();
    },
  };
  </script>
  
  <style></style>
  