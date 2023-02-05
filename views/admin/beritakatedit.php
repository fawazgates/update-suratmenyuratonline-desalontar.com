<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-8 col-xl-6">
                    <h4 class="mb-1 mt-0">
                        Edit Data Kategori Berita

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
                            <?php echo $this->session->flashdata('pesan'); ?>
                            <?php foreach ($bk as $r) { ?>

                                <form class="form-horizontal" action="<?php echo base_url() . 'admin/berita/kategori/update'; ?>" method="POST">
                                    <div class="row">

                                        <div class="col">

                                            <input type="hidden" class="form-control" value="<?php echo $r->id_beritakat ?>" name="id_beritakat"></input>


                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">Kategori </label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" value="<?php echo $r->nama_kat ?>" name="nama_kat" required></input>
                                                </div>

                                            </div>


                                            <div class=" form-group row p-2">
                                                <a href="<?= site_url('admin/berita/kategori') ?>" class="btn btn-secondary btn-sm">Batal</a>&nbsp;&nbsp;
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