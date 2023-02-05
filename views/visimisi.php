<!-- post wraper start-->
<section class="block-wrapper mb-30 hot-topics-heighlight">
    <div class="container">
        <?php

        foreach ($v as $r) {
        ?>


            <div class="ts-grid-box">

                <h2 class="ts-title">Visi</h2>

                <div class="post-content-area">
                    <div class="entry-content">

                        <p>
                            <?php echo $r->visi ?>

                        </p>






                    </div>
                    <!-- entry content end-->
                </div>
                <!-- most-populers end-->
            </div>
        <?php } ?>



        <div class="ts-grid-box">

            <h2 class="ts-title">Misi</h2>

            <div class="post-content-area">
                <div class="entry-content">
                    <?php

                    foreach ($m as $r) {
                    ?>
                        <p>
                            <span class="text-danger "><?php echo $r->no ?>. </span>
                            <?php echo $r->misi ?>

                        </p>

                    <?php } ?>




                </div>
                <!-- entry content end-->
            </div>
            <!-- most-populers end-->
        </div>

        <!-- ts-populer-post-box end-->
    </div>
    <!-- container end-->
</section>
<!-- post wraper end-->