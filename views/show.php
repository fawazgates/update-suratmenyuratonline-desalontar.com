<section class="single-post-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <ol class="breadcrumb">
                    <li>
                        <a href="#">
                            <i class="fa fa-home"></i>
                            Home
                        </a>
                    </li>

                    <li>Berita</li>
                </ol>
                <!-- breadcump end-->
                <?php foreach ($sb as $r) { ?>


                    <div class="ts-grid-box content-wrapper single-post">
                        <div class="entry-header">
                            <h2 class="post-title lg"><?= $r->judul ?></h2>
                            <ul class="post-meta-info">
                                <li>
                                    <?php

                                    foreach ($bk as $re) {
                                    ?>
                                        <?php if ($re->id_beritakat == $r->id_beritakat) {
                                        ?>
                                            <a href="#" class="post-cat ts-yellow-bg">

                                                <?= $re->nama_kat ?>

                                            </a> <?php

                                                } else {
                                                    echo "";
                                                }

                                                    ?> <?php } ?>
                                </li>
                                <li class="author">
                                    <a href="#">
                                        <img src="<?= base_url('assets/vendor/') ?>logo/avat.png" alt=""> Admin
                                    </a>
                                </li>
                                <li>
                                    <i class="fa fa-clock-o"></i>
                                    <?= $r->upload_at ?>
                                </li>
                                <li class="active">
                                    <i class="fa fa-eye"></i>
                                    <?= $r->visitor ?>
                                </li>

                                <li class="active">
                                    <i>


                                        <div class="fb-share-button" data-href="<?= site_url('home/berita/post/') . $r->slug ?>" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Bagikan </a></div>
                                    </i> </li>


                            </ul>
                        </div>
                        <!-- single post header end-->
                        <div class="post-content-area">
                            <div class="post-media post-featured-image">
                                <a href="<?= base_url('berkas/berita/') . $r->foto_berita ?>" class="gallery-popup">
                                    <img src="<?= base_url('berkas/berita/') . $r->foto_berita ?>" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="entry-content">
                                <p class="text-bg"></p>

                                <p>
                                    <?= $r->isi_berita ?>
                                </p>




                            </div>
                            <!-- entry content end-->
                        </div>
                        <!-- post content area-->

                        <!-- author box end-->

                        <!-- post navigation end-->
                        <div class="author-box mt-0">


                            <h4 class="author-name">Bagikan :</h4>
                            <div class="authors-social">

                                <div class="fb-share-button" data-href="<?= site_url('home/berita/post/') . $r->slug ?>" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Bagikan </a></div>

                                &nbsp;&nbsp;&nbsp;
                                <a href="https://api.whatsapp.com/send?text=<?= site_url('home/berita/post/') . $r->slug ?>" class="ts-facebook">
                                    <i class="fa fa-whatsapp"></i>
                                </a>
                            </div>
                            <div class="clearfix"></div>



                        </div>

                    </div>


                <?php } ?>
                <!--single post end -->

                <!-- comment form end-->
                <div class="ts-grid-box mb-30">
                    <h2 class="ts-title">Baca Juga</h2>

                    <div class="most-populers owl-carousel">
                        <?php foreach ($po as $r) { ?>
                            <div class="item">
                                <a class="post-cat ts-yellow-bg" href="#"> <?= $r->nama_kat ?></a>
                                <div class="ts-post-thumb">
                                    <a href="<?= site_url('home/berita/post/') . $r->slug ?>">
                                        <img class="img-fluid" src="<?= base_url('berkas/berita/') . $r->foto_berita ?>" alt="">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="<?= site_url('home/berita/post/') . $r->slug ?>"> <?= $r->judul ?></a>
                                    </h3>
                                    <span class="post-date-info">
                                        <i class="fa fa-clock-o"></i>
                                        <?= $r->upload_at ?>
                                    </span>
                                </div>
                            </div>
                            <!-- ts-grid-box end-->

                        <?php } ?>
                        <!-- ts-grid-box end-->
                    </div>
                    <!-- most-populers end-->
                </div>

            </div>
            <!-- col end -->
            <div class="col-lg-3">
                <div class="right-sidebar-1">
                    <div class="widgets widgets-item">
                        <h3 class="widget-title">
                            <span>Ikuti kami</span>
                        </h3>
                        <?php foreach ($opd as $r) { ?>
                            <ul class="ts-block-social-list">
                                <li class="ts-facebook">
                                    <a href="<?= $r->facebook ?>">
                                        <i class="fa fa-facebook"></i>
                                        <b>facebook </b>

                                    </a>

                                </li>
                                <li class="ts-youtube">
                                    <a href="<?= $r->youtube ?>">
                                        <i class="fa fa-youtube"></i>
                                        <b>Youtube </b>

                                    </a>

                                </li>
                                <li class="ts-twitter">
                                    <a href="<?= $r->twiter ?>">
                                        <i class="fa fa-twitter"></i>
                                        <b>Twitter </b>

                                    </a>

                                </li>
                                <li class="ts-pinterest">
                                    <a href="<?= $r->instagram ?>">
                                        <i class="fa fa-instagram"></i>
                                        <b>Instagram </b>

                                    </a>

                                </li>




                            </ul><?php } ?>
                    </div>
                    <!-- end-->
                    <div class="widgets widgets-item widget-banner">
                        <a href="https://pekanbaru.go.id" target="_blank">
                            <img class="img-fluid" src="<?= base_url('assets/vendor/'); ?>images/banner/pkugo.jpg" alt="">
                        </a>
                    </div>
                    <!-- widgets end-->
                    <div class="widgets widgets-item ts-grid-item  widgets-populer-post">
                        <h3 class="widget-title">
                            <span>Berita Terbaru</span>
                        </h3>
                        <div class="ts-overlay-style">
                            <div class="item">

                                <div class="overlay-post-content">
                                    <div class="post-content">
                                        <h3 class="post-title">
                                            <a href="#"></a>
                                        </h3>
                                        <ul class="post-meta-info">
                                            <li>
                                                <i class="fa fa-clock-o"></i>

                                            </li>
                                        </ul>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- ts-overlay-style  end-->
                        <?php foreach ($baru as $r) { ?>
                            <div class="post-content media">
                                <img class="d-flex sidebar-img" src="<?= base_url('berkas/berita/') . $r->foto_berita ?>" alt="">
                                <div class="media-body align-self-center">
                                    <h4 class="post-title">
                                        <a href="<?= site_url('home/berita/post/') . $r->slug ?>"><?= $r->judul ?> </a>
                                    </h4>
                                </div>
                            </div> <?php } ?>
                        <!-- post content end-->

                        <!-- post content end-->
                    </div>
                    <!-- widgets end-->
                    <div class="widgets widgets-item">
                        <h3 class="widget-title">
                            <span>Kategori berita</span>
                        </h3>
                        <ul class="ts-block-social-list">
                            <?php foreach ($kb as $r) { ?>
                                <li class="ts-google-plus">
                                    <a href="">

                                        <b><?= $r->nama_kat ?> </b>

                                    </a>

                                </li> <?php } ?>



                        </ul>
                    </div>
                </div>

            </div>
            <!-- right sidebar end-->
            <!-- col end-->
        </div>
        <!-- row end-->
    </div>
    <!-- container-->
</section>