<div class="container-fluid">
  <main id="main" class="main">
    <section class="section dashboard">

      <div class="row">

        <!-- Start Ngoding Disini -->

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="pagetitle">
                <h1><?= $data['judul'] ?></h1>
                <nav>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/home">Home</a></li>
                    <li class="breadcrumb-item active">Master User</li>
                  </ol>
                </nav>
              </div><!-- End Page Title -->
              <p>Data ini adalah data semua pengguna aplikasi <b>SIAGA</b>.</p>

              <!-- Modal Dialog Scrollable -->
              <button type="button" class="btn btn-primary showModalAdd" data-bs-toggle="modal" data-bs-target="#formModal">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Add User</span>
              </button>


              <!-- Table with stripped rows -->
              <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns" style="padding: 10px 10px;">
                <div class="datatable-top" style="padding: 8px 10px; display: flex; align-items: center; justify-content: space-between;">

                  <!-- Dropdown untuk jumlah entri per halaman -->
                  <div class="datatable-dropdown">
                    <label for="entriesPerPage">
                      <select id="entriesPerPage" class="datatable-selector" style="padding: 6px; ">
                        <option value="5">5</option>
                        <option value="10" selected="">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                      </select>
                      entries per page
                    </label>
                  </div>

                  <!-- Pencarian dalam tabel -->
                  <div class="datatable-search" style="margin-right: 3%;">
                    <input id="tableSearch" class="datatable-input" placeholder="Search..." type="search" title="Search within table">
                  </div>
                  <div class="apexcharts-toolbar" style="top: 0px; right: 3px;">
                    <div class="apexcharts-menu-icon" title="Menu" onclick="toggleMenu()">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" d="M0 0h24v24H0V0z"></path>
                        <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
                      </svg>
                    </div>
                    <div class="apexcharts-menu" id="apexchartsMenu">
                      <div class="apexcharts-menu-item exportExcel" title="Download Excel">Download Excel</div>
                      <div class="apexcharts-menu-item exportPDF" title="Download PDF">Download PDF</div>
                      <div class="apexcharts-menu-item importExcel" title="Upload Excel">Upload Excel</div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                  <div class="card-body p-4">
                    <div class="table-responsive">
                      <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                          <tr>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Id</h6>
                            </th>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Username</h6>
                            </th>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Name</h6>
                            </th>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Role</h6>
                            </th>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Address</h6>
                            </th>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Gender</h6>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 0;
                          foreach ($data['user'] as $user) {
                            $no++; ?>
                            <tr>
                              <th scope='row'><?= $no ?></th>
                              <td><?= $user["username"]; ?></td>
                              <td><?= $user["nama"]; ?></td>
                              <td><?= $user["role"]; ?></td>
                              <td><?= $user["alamat"]; ?></td>
                              <td><?= $user["jenis_kelamin"]; ?></td>
                              <td>
                                <a href="<?= BASEURL; ?>/user/edit/<?= $user['id'] ?>" class='btn btn-warning showModalEdit' data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $user['id']?>">
                                  <span>
                                    <i class='ti ti-edit'></i>
                                  </span>
                                  <span class='hide-menu'>Edit
                                  </span>
                                </a>
                                <a href="<?= BASEURL; ?>/user/delete/<?= $user['id'] ?>" class='btn btn-danger' onclick="confirmDelete(event)">
                                  <span>
                                    <i class='ti ti-trash'></i>
                                  </span>
                                  <span class='hide-menu'>Delete</span>
                                </a>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

              </div>
              <div class="datatable-bottom">
                <div class="datatable-info">Showing 1 to 5 of 5 entries</div>
                <nav class="datatable-pagination">
                  <ul class="datatable-pagination-list"></ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Modal-->
      <div class="modal fade" id="formModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabel">Add User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Multi Columns Form -->
              <form action="<?= BASEURL; ?>/user/add" method="POST" class="row g-3" id="myForm">
                <input type="hidden" name="id" id="id">
                <div class="col-md-6">
                  <label for="nama" class="form-label">Nama Lengkap</label>
                  <input type="text" name="nama" class="form-control" id="nama">
                </div>
                <div class="col-md-6">
                  <label for="username" class="form-label">Username</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" name="username" class="form-control" id="username" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                      Please choose a username.
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                  <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                    <option selected>Pilih...</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="role" class="form-label">Role</label>
                  <select id="role" name="role" class="form-select">
                    <option selected>Pilih...</option>
                    <option value="Owner">Owner</option>
                    <option value="Admin">Admin</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="col-md-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="col-6">
                  <label for="alamat" class="form-label">Alamat</label>
                  <input type="text" name="alamat" class="form-control" id="alamat" placeholder="1234 Main St">
                </div>
                <div class="col-6">
                  <label for="domisili" class="form-label">Domisili</label>
                  <input type="text" name="domisili" class="form-control" id="domisili" placeholder="Apartment, studio, or floor">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="http://localhost/phpmvc/public/user" style="color:white">Close</a></button>
              <button class="btn btn-primary save-btn" id=saveButton type="submit" onclick="showSuccessAlert()">Save</button>
            </div>
            </form><!-- End Multi Columns Form -->
          </div>
        </div>
      </div><!-- End Modal Dialog Scrollable-->