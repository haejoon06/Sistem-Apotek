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
                                        <li class="breadcrumb-item active">Master Data</li>
                                    </ol>
                                </nav>
                            </div><!-- End Page Title -->
                            <p>Data ini adalah data semua Obat di aplikasi <b>SIAGA</b>.</p>
                            <!-- Modal Dialog Scrollable -->
                            <button type="button" class="btn btn-primary showAddObat" data-bs-toggle="modal" data-bs-target="#modalObat">
                                <span>
                                    <i class="ti ti-user-plus"></i>
                                </span>
                                <span class="hide-menu">Add Obat</span>
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
                                                            <h6 class="fw-semibold mb-0">No</h6>
                                                        </th>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">Merk</h6>
                                                        </th>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">Nama</h6>
                                                        </th>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">Harga Beli</h6>
                                                        </th>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">Harga Jual</h6>
                                                        </th>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">Stok</h6>
                                                        </th>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">Status</h6>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    foreach ($data['obat'] as $obat) {
                                                        $no++; ?>
                                                        <tr>
                                                            <th scope='row'><?= $no ?></th>
                                                            <td><?= $obat["merk"]; ?></td>
                                                            <td><?= $obat["nama"]; ?></td>
                                                            <td><?= $obat["beli"]; ?></td>
                                                            <td><?= $obat["jual"]; ?></td>
                                                            <td><?= $obat["stok"]; ?></td>
                                                            <td><?= $obat["status"]; ?></td>
                                                            <td>
                                                                <a href="<?= BASEURL; ?>/obat/edit/<?= $obat['id_obat'] ?>" class='btn btn-warning showEditObat' data-bs-toggle="modal" data-bs-target="#modalObat" data-id="<?= $obat['id_obat'] ?>">
                                                                    <span><i class='ti ti-edit'></i></span>
                                                                    <span class='hide-menu'>Edit</span>
                                                                </a>
                                                                <a href="<?= BASEURL; ?>/obat/delete/<?= $obat['id_obat'] ?>" class='btn btn-danger' onclick="deleteConfirm(event)">
                                                                    <span><i class='ti ti-trash'></i></span>
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
                <!--Modal-->
                <div class="modal fade" id="modalObat" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel">Add Obat</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Multi Columns Form -->
                                <form action="<?= BASEURL; ?>/obat/add" method="POST" class="row g-3" id="formObat">
                                    <input type="hidden" name="id_obat" id="id_obat">
                                    <div class="col-md-6">
                                        <label for="merk" class="form-label">Merk</label>
                                        <input type="text" name="merk" class="form-control" id="merk">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="beli" class="form-label">Harga Beli</label>
                                        <input type="text" name="beli" class="form-control" id="beli">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="jual" class="form-label">Harga Jual</label>
                                        <input type="text" name="jual" class="form-control" id="jual">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="stok" class="form-label">Stok Obat</label>
                                        <input type="text" name="stok" class="form-control" id="stok">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="status" class="form-label">Status Obat</label>
                                        <select id="status" name="status" class="form-select">
                                            <option selected></option>
                                            <option value="Aktif">Aktif</option>
                                            <option value="Nonaktif">Nonaktif</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="http://localhost/phpmvc/public/obat" style="color:white">Close</a></button>
                                        <button class="btn btn-primary save-btn" id=saveButton type="submit" onclick="showSuccessAlert()">Save</button>
                                    </div>
                                </form><!-- End Multi Columns Form -->
                            </div>
                        </div>
                    </div><!-- End Modal Dialog Scrollable-->
                </div>