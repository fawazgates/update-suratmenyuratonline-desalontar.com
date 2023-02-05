<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-8 col-xl-6">
                    <h4 class="mb-1 mt-0">
                        Data Visi

                    </h4>
                </div>
                <div class="col-sm-4 col-xl-6 text-sm-right">
                    <div class="btn-group ml-2 d-none d-sm-inline-block">

                    </div>

                </div>
            </div>


            <!-- details-->
            <div class="row">
                <div class="col-xl-10">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mt-0 header-title">Visi </h6>

                            <div class="text-muted mt-3">
                                <?php

                                foreach ($visi as $r) {
                                ?>
                                    <p><?php echo $r->visi ?></p>


                                <?php } ?>

                            </div>
                            <a href="<?= site_url('admin/profil/visi/edit/' . $r->id) ?>" type="button" class="btn btn-soft-primary btn-sm"><i class="uil uil-edit mr-1"></i>Edit</a>
                        </div>
                    </div>
                    <!-- end card -->

                </div>

            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->




</div>