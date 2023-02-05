<!-- post wraper start-->
<section class="block-wrapper mb-30 hot-topics-heighlight">
    <div class="container">
        <?php

        foreach ($pubshow as $r) {
        ?>


            <div class="ts-grid-box">

                <h2 class="ts-title"><?php echo $r->nama_kat ?></h2>

                <div class="post-content-area">
                    <div class="entry-content">

                        <div class="row">

                            <?php

                            foreach ($pk as $re) {
                            ?>

                                <?php if ($re->id_kat == $r->id_kat) {
                                ?>

                                    <div class='col-lg-3 col-md-6'>
                                        <div class='card mb-3'>
                                            <div class='ts-grid-box ts-grid-content'>

                                                <div class='ts-post-thumb'>
                                                    <a href='<?= site_url('berkas/filepub/') . $re->file ?>' target="_blank">
                                                        <img src='<?= base_url('berkas/icon/berkas.png') ?>' height='200' alt='boe93'>
                                                    </a>
                                                </div>
                                                <div class='post-content'>
                                                    <h3 class='post-title'>
                                                        <a href='#'><?php echo $re->nama_pub ?></a>
                                                    </h3>
                                                    <span class='post-date-info'>
                                                        <i class='fa fa-clock-o'></i>
                                                        <?php echo $re->tgl_upload ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
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