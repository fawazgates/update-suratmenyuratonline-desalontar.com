<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-8 col-xl-6">
                    <h4 class="mb-1 mt-0">
                        Data Kategori Galery

                    </h4>
                </div>

            </div>


            <!-- details-->
            <?php echo $this->session->flashdata('pesan'); ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-1"></h4>


                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>


                                            <th scope="col">Kategori galery</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">
                                                <center>Tools</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        foreach ($galkat as $r) {
                                        ?>
                                            <tr>

                                                <td scope="row"><?php echo $r->nama_galkat ?></td>
                                                <td><?php echo $r->ket ?></td>
                                                <td scope="row">
                                                    <center>
                                                        <a href="<?= site_url('admin/galery/kategori/edit/') . $r->id_galkat ?>" class="text-info d-inline-block " data-toggle="tooltip" data-placement="top" title="" data-original-title="edit data">
                                                            <i class="uil uil-edit mr-1"></i>
                                                        </a>
                                                        &nbsp;
                                                        <a href="<?= site_url('admin/galery/kategori/hapus/') . $r->id_galkat ?>" class="text-danger d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="hapus data">
                                                            <i class="uil uil-trash mr-1"></i>
                                                        </a></center>
                                                </td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <form action="<?php echo base_url() . 'admin/galery/kategori/simpan'; ?>" method="POST">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-1">Form Tambah Data Kategori</h4>
                                <p class="sub-header"></p>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="example-textarea">Kategori </label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="nama_galkat" required></input>
                                    </div>
                                    <small class="text-danger p-2"><?= form_error('nama_galkat') ?></small>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="example-textarea">Keterangan </label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="ket" required></input>
                                    </div>
                                </div>
                                <div class="form-group row p-2">
                                    <button type="submit" class="btn btn-success btn-sm">Simpan Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->




</div>