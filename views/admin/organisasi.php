
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-8 col-xl-6">
                    <h4 class="mb-1 mt-0">
                        Struktur Organisai

                    </h4>
                </div>
                <div class="col-sm-4 col-xl-6 text-sm-right">
                    <div class="btn-group ml-2 d-none d-sm-inline-block">

                    </div>

                </div>
            </div>


            <!-- details-->
            <?php echo $this->session->flashdata('pesan'); ?>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                        <?php

                        foreach ($organ as $r) {
                        ?>
                           
                            <div class="text-muted mt-3">
                               <div class="text-center">
                               <img src="<?= base_url('berkas/struktur/').$r->foto ?>" alt="struktur-organisasi" width="600px"  >
                               </div>
                                  
                                 

                                <?php } ?>

                            </div>
                            <a href="<?= site_url('admin/profil/organisasi/edit/'.$r->id) ?>" type="button" class="btn btn-primary btn-sm"><i class="uil uil-edit mr-1"></i>Edit Foto Struktur</a>
                        </div>
                    </div>
                    <!-- end card -->

                </div>

            </div>
            <!-- end row -->

          

        </div> <!-- container-fluid -->

    </div> <!-- content -->




</div>