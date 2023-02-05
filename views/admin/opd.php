<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-8 col-xl-6">
                    <h4 class="mb-1 mt-0">
                        Data Profil Desa

                    </h4>
                </div>
                <div class="col-sm-4 col-xl-6 text-sm-right">
                    <div class="btn-group ml-2 d-none d-sm-inline-block">

                    </div>

                </div>
            </div>
            <?php echo $this->session->flashdata('pesan'); ?>
            <div class="row">

                <div class="col-8">
                    <div class="card">
                        <div class="card-body">

                            <?php foreach ($opd as $r) { ?>

                                <form class="form-horizontal" action="<?php echo base_url() . 'admin/pengaturan/profilopd/update'; ?>" method="POST">
                                    <div class="row">
                                        <div class="col">

                                            <input type="hidden" name="id" value="<?php echo $r->id ?> " required>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">Nama Lengkap Desa </label>

                                                <div class="col-lg-10">
                                                    <input type="text" name="nama_opd" value="<?php echo $r->nama_opd ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">Nama Pendek Desa </label>

                                                <div class="col-lg-10">
                                                    <input type="text" name="nama_pendek" value="<?php echo $r->nama_pendek ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">Alamat Lengkap </label>

                                                <div class="col-lg-10">
                                                    <textarea class="form-control" name="alamat" rows="3" required><?php echo $r->alamat ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">No Telp </label>

                                                <div class="col-lg-4">
                                                    <input type="number" name="no_telp" value="<?php echo $r->no_telp ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">E-mail</label>

                                                <div class="col-lg-4">
                                                    <input type="email" name="email" value="<?php echo $r->email ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">Facebook </label>

                                                <div class="col-lg-4">
                                                    <input type="text" name="facebook" value="<?php echo $r->facebook ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">Twitter </label>

                                                <div class="col-lg-4">
                                                    <input type="text" name="twiter" value="<?php echo $r->twiter ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">Youtube </label>

                                                <div class="col-lg-4">
                                                    <input type="text" name="youtube" value="<?php echo $r->youtube ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">LinkedIn </label>

                                                <div class="col-lg-4">
                                                    <input type="text" name="linked" value="<?php echo $r->linked ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">Instagram </label>

                                                <div class="col-lg-4">
                                                    <input type="text" name="instagram" value="<?php echo $r->instagram ?>" class="form-control">
                                                </div>
                                            </div>

                                            <br>
                                            <div class=" form-group row ">
                                                &nbsp;&nbsp;
                                                <button type="submit" class="btn btn-success ">Simpan Perubahan</button>
                                            </div>


                                        </div>
                                    </div>
                                </form> <?php } ?>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->

                <div class="col-4">
                    <div class="card">
                        <div class="card-body">

                            <?php foreach ($opd as $r) { ?>

                                <form class="form-horizontal" action="<?php echo site_url() . 'admin/pengaturan/profilopd/ubahlogo'; ?>" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">

                                        <img src="<?= base_url('berkas/icon/') . $r->file; ?>" alt="Shreyu" class="card-img-top" width="320" height="220" />
                                    </div>

                                    <input type="hidden" name="id" value="<?php echo $r->id ?>">
                                    <div class="col-lg-12">
                                        <h6 class="header-title mt-0">Update Logo Desa</h6>
                                    </div>

                                    <div class="col-lg-12">
                                        <input type="file" class="form-control" name="file" required></input>
                                    </div>
                                    <br>
                                    <div class="col-lg-12">
                                        <button type="submit" name="submit" class="btn btn-info btn-sm">Update</button>
                                    </div>
                                </form> <?php } ?>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>

            </div>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->




</div>