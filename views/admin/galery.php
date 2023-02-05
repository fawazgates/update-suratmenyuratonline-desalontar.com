<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title align-items-center">
                <div class="col-md-3 col-xl-6">
                    <h4 class="mb-1 mt-0">Galery Kegiatan</h4>
                </div>
                <div class="col-md-9 col-xl-6 text-md-right">
                    <div class="mt-4 mt-md-0">
                        <a href="<?= site_url('admin/galery/buat') ?>" class="btn btn-danger mr-4 mb-3 btn-sm  mb-sm-0"><i class="uil-plus mr-1"></i> Tambah Data</a>

                    </div>
                </div>
            </div>
            <?php echo $this->session->flashdata('pesan'); ?>
            <div class="row">

                <?php

                foreach ($gk as $r) { ?>
                    <div class="col-md-6 col-xl-3">
                        <div class="card profile-widget">
                            <img src="<?= base_url('berkas/galery/') . $r->file; ?>" alt="Shreyu" class="card-img-top" width="320" height="220" />
                            <div class="dropdown card-action float-right">
                                <a href="#" class="dropdown-toggle arrow-none" data-toggle="dropdown" aria-expanded="false">
                                    <i class="uil uil-ellipsis-v font-size-24 text-primary"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- item-->
                                    <a href="<?= site_url('admin/galery/edit/') . $r->id_gal ?>" class="dropdown-item"><i class="uil uil-edit-alt mr-2"></i>Edit</a>
                                    <!-- item-->

                                    <!-- item-->
                                    <a href="<?= site_url('admin/galery/hapus/') . $r->id_gal ?>" class="dropdown-item text-danger"><i class="uil uil-trash mr-2"></i>Delete</a>
                                </div>
                            </div>


                            <div class="mt-4 pt-2 border-top text-left p-2">
                                <p class="text-muted mb-2"><?php echo $r->ket ?></p>

                                <p class="mb-2">
                                    <label class="badge badge-soft-primary"><?php echo $r->tgl_upload ?></label>
                                    <label class="badge badge-soft-success"><?php echo $r->nama_galkat ?></label>
                                </p>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>


        </div> <!-- container-fluid -->

    </div> <!-- content -->



    <!-- Footer Start -->