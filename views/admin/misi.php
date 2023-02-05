<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-8 col-xl-6">
                    <h4 class="mb-1 mt-0">
                        Data Misi

                    </h4>
                </div>
                <div class="col-sm-4 col-xl-6 text-sm-right">
                    <div class="btn-group ml-2 d-none d-sm-inline-block">
                        <a href="<?= site_url('admin/profil/misi/buat') ?>" class="btn btn-danger btn-sm">Tambah Data</a>
                    </div>

                </div>
            </div>


            <!-- details-->
            <div class="row">
                <div class="col-xl-12">
                    <?php

                    foreach ($misi as $r) {
                    ?>
                        <div class="card">
                            <div class="card-body">
                                <h6 class="mt-0 header-title">No<?php echo $r->no ?></h6>

                                <div class="text-muted mt-3">

                                    <?php echo $r->misi ?>
                                </div>
                                <br>
                                <a href="<?= site_url('admin/profil/misi/edit/') . $r->id ?>" class="btn btn-soft-success btn-sm">Edit Data</a>
                                <a href="<?= site_url('misi/hapus/') . $r->id  ?>" class="btn btn-soft-danger btn-sm">Hapus</a>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- end card -->

                </div>

            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->




</div>