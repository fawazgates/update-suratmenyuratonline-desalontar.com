<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-8 col-xl-6">
                    <h4 class="mb-1 mt-0">
                        Edit Data Publikasi

                    </h4>
                </div>
                <div class="col-sm-4 col-xl-6 text-sm-right">
                    <div class="btn-group ml-2 d-none d-sm-inline-block">

                    </div>

                </div>
            </div>


            <?php foreach ($pubedit as $r) { ?>
                <div class="row">
                    <div class="col-8">
                        <div class="card">

                            <div class="card-body">
                                <form action="<?php echo base_url() . 'admin/publikasi/update'; ?>" method="POST">
                                    <div class="row">
                                        <div class="col">

                                            <input type="hidden" name="id_pub" value="<?php echo $r->id_pub ?>">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">Publikasi </label>

                                                <div class="col-lg-6">
                                                    <input type="text" name="nama_pub" value="<?php echo $r->nama_pub ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">Kategori </label>
                                                <div class="col-lg-10">
                                                    <select data-plugin="customselect" name="id_kat" class="form-control" data-placeholder="Select an option">

                                                        <?php

                                                        foreach ($pubkat as $r) {
                                                        ?>

                                                            <option value="<?php echo $r->id_kat ?>"><?php echo $r->nama_kat ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>


                                            <div class=" form-group row p-2">
                                                <a href="<?= site_url('admin/publikasi/data') ?>" class="btn btn-secondary btn-sm">Batal</a>&nbsp;&nbsp;
                                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                                            </div>

                                        </div>
                                    </div>
                                </form> <?php } ?>
                            </div>
                        </div>
                    </div> <!-- end col -->
                    <?php foreach ($pubedit as $r) { ?>
                        <div class="col-4">
                            <?php echo form_open("admin/publikasi/gtfile", array('enctype' => 'multipart/form-data')); ?>
                            <div class="card">
                                <?php echo $this->session->flashdata('pesan'); ?>
                                <div class="card-body">

                                    <div class="col-lg-12">
                                        <div class="card card-pricing">
                                            <div class="card-body p-0">
                                                <div class="media">
                                                    <div class="media-body">

                                                        <h5 class="mt-0 mb-2"><?php echo $r->file ?> <span class="font-size-14"></span></h5>
                                                    </div>
                                                    <div class="align-self-center">
                                                        <i class="icon-dual icon-lg" data-feather="book"></i>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="id_pub" value="<?php echo $r->id_pub ?>">
                                <div class="col-lg-12">
                                    <h6 class="header-title mt-0">Update File Publikasi</h6>
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