<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-8 col-xl-6">
                    <h4 class="mb-1 mt-0">
                        Data Publikasi

                    </h4>
                </div>
                <div class="col-sm-4 col-xl-6 text-sm-right">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Tambah Data</button>

                </div>
            </div>


            <!-- details-->
            <?php echo $this->session->flashdata('pesan'); ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-1"></h4>
                            <p class="sub-header">


                            </p>

                            <table id="basic-datatable" class="table dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Nama publikasi</th>
                                        <th>Kategori</th>
                                        <th>File publikasi</th>
                                        <th>
                                            <center>Aksi </center>
                                        </th>

                                    </tr>
                                </thead>


                                <tbody>
                                    <?php

                                    foreach ($pk as $r) { ?>
                                        <tr>
                                            <td><?php echo $r->nama_pub ?></td>
                                            <td><?php echo $r->nama_kat ?></td>
                                            <td><?php echo $r->file; ?></td>
                                            <td scope="row">
                                                <center>
                                                    <a href="<?= site_url('admin/publikasi/edit/') . $r->id_pub ?>" class="text-info d-inline-block " data-toggle="tooltip" data-placement="top" title="" data-original-title="edit data">
                                                        <i class="uil uil-edit mr-1"></i>
                                                    </a>
                                                    &nbsp;
                                                    <a href="<?= site_url('admin/publikasi/hapus/') . $r->id_pub ?>" class="text-danger d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="hapus data">
                                                        <i class="uil uil-trash mr-1"></i>
                                                    </a></center>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->




    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <?php echo form_open("admin/publikasi/simpan", array('enctype' => 'multipart/form-data')); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Form Tambah Data Publikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label" for="example-textarea">Publikasi </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="nama_pub" required></input>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label" for="example-textarea">Kategori </label>
                        <div class="col-lg-10">
                            <select data-plugin="customselect" name="id_kat" class="form-control" data-placeholder="Select an option">
                                <option>Pilih</option>
                                <?php

                                foreach ($pubkat as $r) {
                                ?>

                                    <option value="<?php echo $r->id_kat ?>"><?php echo $r->nama_kat ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label" for="example-textarea">File </label>
                        <div class="col-lg-10">
                            <input type="file" class="form-control" name="file" placeholder="NIP" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <?php echo form_close(); ?>
            <!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->




</div>