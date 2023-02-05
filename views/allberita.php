<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">

                <!-- ts-populer-post-box end-->
                <div class="ts-heading-item">
                    <h2 class="ts-title">
                        <span>Semua Berita</span>
                    </h2>
                </div>
                <div class="row">
                    <?php foreach ($all as $r) { ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="ts-grid-box ts-grid-content">
                                <a class="post-cat ts-orange-bg" href="#"><?= $r->nama_kat ?></a>
                                <div class="ts-post-thumb">
                                    <a href="#">
                                        <img class="img-fluid" src="<?= base_url('berkas/berita/') . $r->foto_berita ?>" alt="">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="<?= site_url('home/berita/post/') . $r->slug ?>"><?= $r->judul ?></a>
                                    </h3>
                                    <span class="post-date-info">
                                        <i class="fa fa-clock-o"></i>
                                        <?= $r->upload_at ?>
                                    </span>
                                </div>
                            </div>
                            <!-- ts grid box-->
                        </div>
                    <?php } ?>
                </div>

                <!-- row end-->


            </div>
            <!-- col end-->
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

                </div>

            </div>
        </div>
    </div>
</section>