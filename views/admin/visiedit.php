<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-8 col-xl-6">
                    <h4 class="mb-1 mt-0">
                        Edit Data Visi

                    </h4>
                </div>
                <div class="col-sm-4 col-xl-6 text-sm-right">
                    <div class="btn-group ml-2 d-none d-sm-inline-block">

                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <?php foreach ($visi as $r) { ?>

                                <form class="form-horizontal" action="<?php echo base_url() . 'admin/profil/visi/update'; ?>" method="POST">
                                    <div class="row">
                                        <div class="col">


                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">Visi </label>
                                                <input type="hidden" name="id" value="<?php echo $r->id ?>">
                                                <div class="col-lg-10">
                                                    <textarea class="form-control" name="visi" rows="3" required><?php echo $r->visi ?></textarea>
                                                </div>
                                            </div>

                                            <div class=" form-group row">
                                            <a href="<?= site_url('admin/profil/visi') ?>" class="btn btn-secondary btn-sm">Batal</a>&nbsp;&nbsp;
                                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                                            </div>


                                        </div>
                                    </div>
                                </form> <?php } ?>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->




</div>