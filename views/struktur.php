<!-- post wraper start-->
<section class="block-wrapper mb-30 hot-topics-heighlight">
    <div class="container">
        <?php

        foreach ($organ as $r) {
        ?>


            <div class="ts-grid-box">

                <h2 class="ts-title">Struktur Organisasi</h2>

                <div class="post-content-area">
                    <div class="entry-content">
                        <div class="container text-center">
                            <p>
                                <img src="<?= base_url('berkas/struktur/') . $r->foto ?>" width="800" height="700" alt="">


                            </p>
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