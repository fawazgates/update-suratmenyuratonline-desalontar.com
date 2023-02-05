<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-8 col-xl-6">
                    <h4 class="mb-1 mt-0">
                        Data Slide Website

                    </h4>
                </div>
                <div class="col-sm-4 col-xl-12">
                    <h5 class="mb-1 mt-0">
                        <span class="text-info">usahakan foto slider min size (900X700)</span>

                    </h5>
                </div>
                <div class="col-sm-4 col-xl-6 text-sm-right">
                    <div class="btn-group ml-2 d-none d-sm-inline-block">

                    </div>

                </div>
            </div>
            <?php echo $this->session->flashdata('pesan'); ?>
            <div class="row">

                <div class="col-6">
                    <div class="card">
                        <div class="card-body">

                            <?php foreach ($sl as $r) { ?>

                                <form class="form-horizontal" action="<?php echo site_url() . 'admin/pengaturan/slider/satu'; ?>" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">

                                        <img src="<?= base_url('berkas/slide/') . $r->slider1; ?>" alt="Shreyu" class="card-img-top" width="320" height="400" />
                                    </div>

                                    <input type="hidden" name="id" value="<?php echo $r->id ?>">
                                    <div class="col-lg-12">
                                        <h6 class="header-title mt-0">Update Slide 1</h6>
                                    </div>

                                    <div class="col-lg-12">
                                        <input type="file" class="form-control" name="slider1" required></input>
                                    </div>
                                    <br>
                                    <div class="col-lg-12">
                                        <button type="submit" name="submit" class="btn btn-info btn-sm">Update</button>
                                    </div>
                                </form> <?php } ?>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->

                <div class="col-6">
                    <div class="card">
                        <div class="card-body">

                            <?php foreach ($sl as $r) { ?>

                                <form class="form-horizontal" action="<?php echo site_url() . 'admin/pengaturan/slider/dua'; ?>" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">

                                        <img src="<?= base_url('berkas/slide/') . $r->slider2; ?>" alt="Shreyu" class="card-img-top" width="320" height="400" />
                                    </div>

                                    <input type="hidden" name="id" value="<?php echo $r->id ?>">
                                    <div class="col-lg-12">
                                        <h6 class="header-title mt-0">Update Slide 2</h6>
                                    </div>

                                    <div class="col-lg-12">
                                        <input type="file" class="form-control" name="slider2" required></input>
                                    </div>
                                    <br>
                                    <div class="col-lg-12">
                                        <button type="submit" name="submit" class="btn btn-info btn-sm">Update</button>
                                    </div>
                                </form> <?php } ?>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->

                <div class="col-6">
                    <div class="card">
                        <div class="card-body">

                            <?php foreach ($sl as $r) { ?>

                                <form class="form-horizontal" action="<?php echo site_url() . 'admin/pengaturan/slider/tiga'; ?>" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">

                                        <img src="<?= base_url('berkas/slide/') . $r->slider3; ?>" alt="Shreyu" class="card-img-top" width="320" height="400" />
                                    </div>

                                    <input type="hidden" name="id" value="<?php echo $r->id ?>">
                                    <div class="col-lg-12">
                                        <h6 class="header-title mt-0">Update Slide 3</h6>
                                    </div>

                                    <div class="col-lg-12">
                                        <input type="file" class="form-control" name="slider3" required></input>
                                    </div>
                                    <br>
                                    <div class="col-lg-12">
                                        <button type="submit" name="submit" class="btn btn-info btn-sm">Update</button>
                                    </div>
                                </form> <?php } ?>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">

                            <?php foreach ($sl as $r) { ?>

                                <form class="form-horizontal" action="<?php echo site_url() . 'admin/pengaturan/slider/empat'; ?>" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">

                                        <img src="<?= base_url('berkas/slide/') . $r->slider4; ?>" alt="Shreyu" class="card-img-top" width="320" height="400" />
                                    </div>

                                    <input type="hidden" name="id" value="<?php echo $r->id ?>">
                                    <div class="col-lg-12">
                                        <h6 class="header-title mt-0">Update Slide 4</h6>
                                    </div>

                                    <div class="col-lg-12">
                                        <input type="file" class="form-control" name="slider4" required></input>
                                    </div>
                                    <br>
                                    <div class="col-lg-12">
                                        <button type="submit" name="submit" class="btn btn-info btn-sm">Update</button>
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