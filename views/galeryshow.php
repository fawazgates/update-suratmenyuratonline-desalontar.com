<!-- post wraper start-->
<section class="block-wrapper mb-30 hot-topics-heighlight">
    <div class="container">
        <?php

        foreach ($galshow as $r) {
        ?>


            <div class="ts-grid-box">

                <h2 class="ts-title"><?php echo $r->nama_galkat ?></h2>

                <div class="post-content-area">
                    <div class="entry-content">

                        <div class="row">

                            <?php

                            foreach ($gk as $re) {
                            ?>

                                <?php if ($re->id_galkat == $r->id_galkat) {
                                ?>

                                    <div class='col-lg-4 col-md-6'>
                                        <div class='card mb-3'>
                                            <div class='ts-grid-box ts-grid-content'>

                                                <div class='ts-post-thumb'>
                                                    <a href='#'>
                                                        <img src='<?= base_url('berkas/galery/') . $re->file; ?>' height='250' alt='boe93'>
                                                    </a>
                                                </div>
                                                <div class='post-content'>
                                                    <h3 class='post-title'>
                                                        <a href='#'><?php echo $re->ket ?></a>
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