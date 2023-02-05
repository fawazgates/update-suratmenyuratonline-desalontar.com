<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-8 col-xl-6">
                    <h4 class="mb-1 mt-0">
                        Edit Data Galery Kegiatan

                    </h4>
                </div>
                <div class="col-sm-4 col-xl-6 text-sm-right">
                    <div class="btn-group ml-2 d-none d-sm-inline-block">

                    </div>

                </div>
            </div>


            <?php foreach ($galedit as $r) { ?>
                <div class="row">
                    <div class="col-8">
                        <div class="card">

                            <div class="card-body">
                                <form action="<?php echo base_url() . 'admin/galery/update'; ?>" method="POST">
                                    <div class="row">
                                        <div class="col">

                                            <input type="hidden" name="id_gal" value="<?php echo $r->id_gal ?>">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">Deskripsi</label>

                                                <div class="col-lg-10">
                                                    <textarea class="form-control" name="ket" rows="3" required><?php echo $r->ket ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">Kategori </label>
                                                <div class="col-lg-4">
                                                    <select data-plugin="customselect" name="id_galkat" class="form-control" data-placeholder="Select an option">

                                                        <?php

                                                        foreach ($galkat as $r) {
                                                        ?>

                                                            <option value="<?php echo $r->id_galkat ?>"><?php echo $r->nama_galkat ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>


                                            <div class=" form-group row p-2">
                                                <a href="<?= site_url('admin/galery/data') ?>" class="btn btn-secondary btn-sm">Batal</a>&nbsp;&nbsp;
                                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                                            </div>

                                        </div>
                                    </div>
                                </form> <?php } ?>
                            </div>
                        </div>
                    </div> <!-- end col -->
                    <?php foreach ($galedit as $r) { ?>
                        <div class="col-4">
                            <?php echo form_open("admin/galery/gtfile", array('enctype' => 'multipart/form-data')); ?>
                            <div class="card">
                                <?php echo $this->session->flashdata('pesan'); ?>
                                <div class="card-body">

                                    <img src="<?= base_url('berkas/galery/') . $r->file; ?>" alt="Shreyu" class="card-img-top" width="320" height="220" />
                                </div>

                                <input type="hidden" name="id_gal" value="<?php echo $r->id_gal ?>">
                                <div class="col-lg-12">
                                    <h6 class="header-title mt-0">Update foto kegiatan</h6>
                                </div>

                                <div class="col-lg-12">
                                    <input type="file" class="form-control" name="file" required></input>
                                </div>
                                <br>
                                <div class="col-lg-12">
                                    <button type="submit" name="submit" class="btn btn-info btn-sm">Update</button>
                                </div>

                                <br>
                            </div>
                            <?php echo form_close(); ?>
                        </div>

                </div>
            <?php } ?>
            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->




</div>