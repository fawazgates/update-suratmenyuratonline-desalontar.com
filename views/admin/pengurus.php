<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title align-items-center">
                <div class="col-md-3 col-xl-6">
                    <h4 class="mb-1 mt-0">Data Pegawai</h4>
                </div>
                <div class="col-md-9 col-xl-6 text-md-right">
                    <div class="mt-4 mt-md-0">
                        <a href="<?= site_url('admin/pengurus/buat') ?>" class="btn btn-danger mr-4 mb-3 btn-sm  mb-sm-0"><i class="uil-plus mr-1"></i> Tambah Data</a>

                    </div>
                </div>
            </div>
            <?php echo $this->session->flashdata('pesan'); ?>
            <div class="row">
                <?php

                foreach ($pengurus as $r) {
                ?>

                    <div class="col-xl-3 col-lg-6">
                        <div class="card">
                            <div class="card-body">

                                <div class="badge badge-success float-right"><?php echo $r->jabatan ?></div>
                                <p class="text-success text-uppercase font-size-12 mb-2"></p>
                                <br>

                                
                                <div class="text-center">
                                    <img src="<?= base_url('berkas/pengurus/') . $r->foto ?>" width="200px" height="200px" alt="">
                                </div>
                                
                                <div class="text-center">
                                    <h5><a href="#" class="text-dark text-center"><?php echo $r->nama ?></a></h5>
                                </div>
                                <div class="text-center">
                                    <h6><strong><?php echo $r->nip ?></strong></h6>
                                </div>
                                <hr>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item pr-2">
                                        <a href="<?= site_url('admin/pengurus/edit/') . $r->id ?>" class="text-muted d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="edit data">
                                            <i class="uil uil-edit mr-1"></i> Edit
                                        </a>
                                    </li>


                                    <li class="list-inline-item">
                                        <a href="<?= site_url('pengurus/hapus/') . $r->id ?>" class="text-muted d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="hapus data">
                                            <i class="uil uil-trash mr-1"></i> Hapus
                                        </a>
                                    </li>
                                </ul>

                            </div>

                        </div>
                        <!-- end card -->
                    </div>

                <?php } ?>
            </div>


        </div> <!-- container-fluid -->

    </div> <!-- content -->



    <!-- Footer Start -->