<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-8 col-xl-6">
                    <h4 class="mb-1 mt-0">
                        Edit Data Pegawai

                    </h4>
                </div>
                <div class="col-sm-4 col-xl-6 text-sm-right">
                    <div class="btn-group ml-2 d-none d-sm-inline-block">

                    </div>

                </div>
            </div>


            <?php foreach ($pengurus as $r) { ?>
                <div class="row">
                    <div class="col-9">
                        <div class="card">

                            <div class="card-body">
                                <form action="<?php echo base_url() . 'admin/pengurus/update'; ?>" method="POST">
                                    <div class="row">
                                        <div class="col">

                                            <input type="hidden" name="id" value="<?php echo $r->id ?>">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">NIP </label>

                                                <div class="col-lg-3">
                                                    <input type="number" name="nip" value="<?php echo $r->nip ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">Nama Pengurus </label>

                                                <div class="col-lg-6">
                                                    <input type="text" name="nama" value="<?php echo $r->nama ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">Jabatan </label>

                                                <div class="col-lg-6">
                                                    <input type="text" name="jabatan" value="<?php echo $r->jabatan ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">Gologan</label>

                                                <div class="col-lg-6">
                                                    <input type="text" name="gol" value="<?php echo $r->gol ?>" class="form-control" required>
                                                </div>
                                            </div>


                                            <div class=" form-group row p-2">
                                                <a href="<?= site_url('admin/pengurus/data') ?>" class="btn btn-secondary btn-sm">Batal</a>&nbsp;&nbsp;
                                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                                            </div>

                                        </div>
                                    </div>
                                </form> <?php } ?>
                            </div>
                        </div>
                    </div> <!-- end col -->
                    <?php foreach ($pengurus as $r) { ?>
                        <div class="col-3">
                            <?php echo form_open("admin/pengurus/gtfoto", array('enctype' => 'multipart/form-data')); ?>
                            <div class="card">
                                <?php echo $this->session->flashdata('pesan'); ?>
                                <div class="card-body">

                                    <img src="<?= base_url('berkas/pengurus/') . $r->foto ?>" width="200px" height="200px" alt="">
                                </div>
                                <hr>
                                <input type="hidden" name="id" value="<?php echo $r->id ?>">
                                <div class="col-lg-12">
                                    <h6 class="header-title mt-0">Update Foto Pegawai</h6>
                                </div>

                                <div class="col-lg-12">
                                    <input type="file" class="form-control" name="foto" required></input>
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