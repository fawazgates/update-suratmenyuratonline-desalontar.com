<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-8 col-xl-6">
                    <h4 class="mb-1 mt-0">
                        Edit Foto Struktur Organisasi

                    </h4>
                </div>
                <div class="col-sm-4 col-xl-6 text-sm-right">
                    <div class="btn-group ml-2 d-none d-sm-inline-block">

                    </div>

                </div>
            </div>
            <?php echo $this->session->flashdata('pesan'); ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <?php foreach ($organ as $r) { ?>

                                <?php echo form_open("admin/profil/organisasi/update", array('enctype' => 'multipart/form-data')); ?>
                                    <div class="row">
                                        <div class="col">
                                        <div class="form-group row">
                                        <label class="col-lg-8 col-form-label" for="example-textarea"><span class="text-info">catatan : usahakan foto yang di upload dengan kualitas baik diatas 700x900</span>  </label>
                                        </div>
                                          <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">Foto </label>
                                                <input type="hidden" name="id" value="<?php echo $r->id ?>">
                                                <div class="col-lg-5">
                                                    <input type="file" class="form-control" name="foto" required></input>
                                                </div>
                                            </div>
                                           


                                            <div class=" form-group row p-2">
                                            <a href="<?= site_url('admin/profil/organisasi') ?>" class="btn btn-secondary btn-sm">Batal</a>&nbsp;&nbsp;
                                                <button type="submit" name="submit" class="btn btn-success btn-sm">Update</button>
                                            </div>


                                        </div>
                                    </div>
                                    <?php echo form_close(); ?> <?php } ?>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->




</div>
