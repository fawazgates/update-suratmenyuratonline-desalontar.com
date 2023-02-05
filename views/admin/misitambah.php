<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-8 col-xl-6">
                    <h4 class="mb-1 mt-0">
                        Tambah Data Misi

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



                            <form class="form-horizontal" action="<?php echo base_url() . 'admin/profil/misi/simpan'; ?>" method="POST">
                                <div class="row">
                                    <div class="col">

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="example-textarea">No Misi </label>

                                            <div class="col-lg-3">
                                                <input type="number" class="form-control" name="no" placeholder="No">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="example-textarea">Misi </label>

                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="misi" placeholder="Masukan misi">
                                            </div>
                                        </div>

                                        <div class=" form-group row">
                                            <a href="<?= site_url('admin/profil/misi') ?>" class="btn btn-secondary btn-sm">Batal</a>&nbsp;&nbsp;
                                            <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                        </div>


                                    </div>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->




</div>