<!-- post wraper start-->
<section class="block-wrapper mb-30 hot-topics-heighlight">
    <div class="container">
        <?php

        foreach ($sejarah as $r) {
        ?>


            <div class="ts-grid-box">

                <h2 class="ts-title"><?php echo $r->judul ?></h2>

                <div class="post-content-area">
                    <div class="entry-content">

                        <p>
                            <?php echo $r->isi ?>

                        </p>






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