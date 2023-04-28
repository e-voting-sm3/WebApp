<template>
    <div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3"></div>
        <!--end breadcrumb-->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Tambah
  </button>
        <button type="reset" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Edit
  </button>
        <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Hapus
  </button>
  <br>
  <br>
  <div class="row">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama</th>
          <th scope="col">Visi Misi</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
    </table>
  </div>
      </div>
    </div>
  </template>