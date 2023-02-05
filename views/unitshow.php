<!-- post wraper start-->
<section class="block-wrapper mb-30 hot-topics-heighlight">
    <div class="container">
        <?php

        foreach ($unitshow as $r) {
        ?>


            <div class="ts-grid-box">

                <h2 class="ts-title"><?php echo $r->nama_unit ?></h2>

                <div class="post-content-area">
                    <div class="entry-content">

                        <div class="row">

                            <?php

                            foreach ($uk as $re) {
                            ?>

                                <?php if ($re->id_kunit == $r->id_kunit) {
                                ?>

                                    <section class="block-wrapper">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-8 ts-post-grid-style">
                                                    <div class="ts-grid-box ts-grid-content">
                                                        <div class="item">

                                                            <div class="post-content">
                                                                <h4 class="post-title md">
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <h3 class="post-title">
                                                                                <a href="#">NIP</a>
                                                                            </h3>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <h3 class="post-title">
                                                                                <a href="#"><?= $re->nip ?></a>
                                                                            </h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <h3 class="post-title">
                                                                                <a href="#">Nama Pegawai</a>
                                                                            </h3>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <h3 class="post-title">
                                                                                <a href="#"><?= $re->nama ?></a>
                                                                            </h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <h3 class="post-title">
                                                                                <a href="#">Nama Unit</a>
                                                                            </h3>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <h3 class="post-title">
                                                                                <a href="#"><?= $r->nama_unit ?></a>
                                                                            </h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <h3 class="post-title">
                                                                                <a href="#">Jabatan</a>
                                                                            </h3>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <h3 class="post-title">
                                                                                <a href="#"><?= $re->jabatan ?></a>
                                                                            </h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <h3 class="post-title">
                                                                                <a href="#">Golongan</a>
                                                                            </h3>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <h3 class="post-title">
                                                                                <a href="#"><?= $re->gol ?></a>
                                                                            </h3>
                                                                        </div>
                                                                    </div>


                                                                </h4>

                                                                <p>
                                                                    <?= $re->deskripsi ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- ts-grid-box-end-->

                                                    <!-- pagination end-->
                                                </div>
                                                <!-- col end-->
                                                <div class="col-lg-4">

                                                    <div class="ts-grid-box ts-grid-content">

                                                        <div class="ts-post-thumb">
                                                            <a href="#">
                                                                <img height="300" src="<?= base_url('berkas/pengurus/') . $re->foto ?>" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-content">
                                                            <h3 class="post-title text-center">
                                                                <a href="#"><?= $re->nama ?></a>
                                                            </h3>

                                                        </div>
                                                    </div>
                                                    <!-- ts-grid-box end-->

                                                    <!-- ts-grid-box end-->



                                                    <!-- ts-grid-box end-->

                                                </div>
                                                <!-- col end-->


                                                <!-- col end-->
                                            </div>
                                            <!-- row end-->
                                        </div>
                                        <!-- container end-->
                                    </section>
                                <?php

                                } else {
                                    echo "";
                                }

                                ?>


                            <?php } ?>

                            <!-- col end-->

                            <!-- col end-->
                        </div>






                    </div>
                    <!-- entry content end-->
                </div>
                <!-- most-populers end-->
            </div>
        <?php } ?>

        <!-- ts-populer-post-box end-->
    </div>
    <!-- container end-->
</section>
<!-- post wraper end-->