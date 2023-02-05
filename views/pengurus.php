<!-- post wraper start-->
<section class="block-wrapper mb-30 hot-topics-heighlight">
    <div class="container">
        <div class="ts-grid-box">

            <h2 class="ts-title">Pegawai</h2>

            <div class="post-content-area">
                <div class="entry-content">

                    <div class="row">
                        <?php

                        foreach ($t as $r) {
                        ?>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card">
                                    <div class="ts-grid-box ts-grid-content">

                                        <div class="ts-post-thumb">
                                            <a href="#">
                                                <img height="300" src="<?= base_url('berkas/pengurus/') . $r->foto ?>" alt="">
                                            </a>
                                        </div>

                                        <div class="post-content">
                                            <div class="container text-center">
                                                <h5 class="post-title">
                                                    <span>
                                                        <a class="text-danger"> <?php echo $r->jabatan ?></a>
                                                    </span>
                                                </h5>
                                            </div>
                                            <div class=" text-center">
                                                <h4>

                                                    <a><?php echo $r->nama ?></a>
                                                </h4>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- ts grid box-->
                                </div>
                            </div>

                        <?php } ?>

                        <!-- col end-->

                        <!-- col end-->
                    </div>







                </div>
                <!-- entry content end-->
            </div>
            <!-- most-populers end-->
        </div>

    </div>
    <!-- container end-->
</section>
<!-- post wraper end-->