<template>
    <div>
        <sidebar-component/>

        <header-component/>
        <div class="page-wrapper">
                  <div class="page-content">
                      <!--breadcrumb-->
                      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                      </div>
                      <!--end breadcrumb-->
                      <div class="row">
                          <div class="col-xl-9 mx-auto">
                              <h6 class="mb-0 text-uppercase">Input Data</h6>
                              <hr/>
                              <div class="card">
                                  <div class="card-body">
                                  <div class="mb-3">
                                    <label for="formFile" class="form-label">Foto Kandidat</label>
                                    <input class="form-control" type="file" id="formFile">
                  
                                      <div class="mb-3">
                                          <label for="nama" class="form-label">Nama</label>
                                          <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example">
                  
                                    
                                      <div class="mb-3">
                                      <label for="visi_misi" class="form-label">Visi dan Misi</label>
                                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  
                                    
                                  </div>
                                  <button type="submit" class="btn btn-md btn-primary">SAVE</button>
                                  <button type="submit" class="btn btn-md btn-primary">RESET</button>
                              </div>         
                          </div>
                      </div>
                      <!--end row-->
                  </div>
              </div>
              </div>
              </div>
              </div>

    </div>
</template>

<script>

export default {

}
</script>

<style>

</style>