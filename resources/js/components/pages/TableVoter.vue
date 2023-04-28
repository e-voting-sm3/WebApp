<template>
    <div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3"></div>
        <!--end breadcrumb-->
          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Tambah Data
              </button>
                <div class="row">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Alat Tangkap</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                      <tbody>
                          <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td>
                              <a  data-bs-toggle="modal"  class="btn btn-sm btn-warning">EDIT</a>
                              <a  data-bs-toggle="modal" class="btn btn-sm btn-danger">DELETE</a>
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