<body>
    <div class="body-inner-content">
        <!-- top bar start -->
        <section class="top-bar v5">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 align-self-center">
                        <div class="ts-breaking-news clearfix">
                            <h2 class="breaking-title float-left">
                                <i class="fa fa-bolt"></i> Berita Terkini :</h2>
                            <div class="breaking-news-content float-left" id="breaking_slider1">
                                <?php foreach ($terkini as $r) { ?>
                                    <div class="breaking-post-content">
                                        <p>
                                            <a href="#"><?= $r->judul ?>&nbsp;|&nbsp;</a>
                                        </p>
                                    </div><?php } ?>


                            </div>
                        </div>
                    </div>
                    <!-- end col-->

                    <div class="col-md-3 text-right xs-left">
                        <div class="ts-date-item">
                            <i class="fa fa-clock-o"></i>
                            <?= $now ?>
                        </div>
                    </div>
                    <!--end col -->


                </div>
                <!-- end row -->
            </div>
        </section>
        <!-- end top bar-->


        <!-- header nav start-->
        <header class="navbar-standerd">
            <div class="container">
                <div class="row">

                    <!-- logo end-->
                    <div class="col-lg-12">
                        <!--nav top end-->
                        <nav class="navigation ts-main-menu navigation-landscape">
                            <div class="nav-header">
                                <a class="nav-brand" href="#">
                                    <?php foreach ($opd as $r) { ?>
                                        <img src="<?= base_url('berkas/icon/') . $r->file; ?>" width="310" height="70" alt=""><?php } ?>
                                </a>
                                <div class="nav-toggle"></div>
                            </div>
                            <!--nav brand end-->

                            <div class="nav-menus-wrapper clearfix">
                                <!--nav right menu start-->
                                <ul class="right-menu align-to-right">

                                    <li class="header-search">
                                        <div class="nav-search">
                                            <div class="nav-search-button">
                                                <i class="icon icon-search"></i>
                                            </div>
                                            <form>
                                                <span class="nav-search-close-button" tabindex="0">✕</span>
                                                <div class="nav-search-inner">
                                                    <input type="search" name="search" placeholder="Type and hit ENTER">
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                                <!--nav right menu end-->

                                <!-- nav menu start-->
                                <ul class="nav-menu align-to-right">
                                    <li class="<?php
                                                if ($status == '1') {
                                                    echo "$aktif ";
                                                } else {
                                                    echo '';
                                                }

                                                ?>">
                                        <a href="<?= site_url('home') ?>">Home</a>
                                    </li>
                                    <li class="<?php
                                                if ($status == '9') {
                                                    echo "$aktif ";
                                                } else {
                                                    echo '';
                                                }

                                                ?>">
                                        <a href="<?= site_url('home/all/berita') ?>">Berita Wisata</a>
                                        
                                    </li>
                                    <li class="<?php
                                                if ($status == '9') {
                                                    echo "$aktif ";
                                                } else {
                                                    echo '';
                                                }

                                                ?>">
                                        <a href="<?= site_url('surat') ?>">Surat Onlie</a>
                                        
                                    </li>
                                    <li class="<?php
                                                if ($status == '2') {
                                                    echo "$aktif";
                                                } else {
                                                    echo '';
                                                }

                                                ?>">
                                        
                                        
                                        
                                        <a href="#">Tentang Kami</a>
                                        <ul class="nav-dropdown">
                                            <li>
                                                <a href="<?= site_url('home/sejarah') ?>">Sejarah</a>

                                            </li>
                                            <li>
                                                <a href="<?= site_url('home/struktur-organisasi') ?>">Struktur Organisasi</a>

                                            </li>

                                            <li>
                                                <a href="<?= site_url('home/visi-misi'); ?>">Visi dan Misi</a>

                                            </li>
                                            <li>
                                                <a href="<?= site_url('home/pengurus'); ?>">Pegawai</a>

                                            </li>


                                            <!--Pages end-->
                                        </ul>
                                    </li>
                                    <li class="<?php
                                                if ($status == '5') {
                                                    echo "$aktif";
                                                } else {
                                                    echo '';
                                                }

                                                ?>">
                                        <a href="#">Galery</a>
                                        <ul class="nav-dropdown">
                                            <?php

                                            foreach ($galkat as $r) {
                                            ?>
                                                <li>
                                                    <a href="<?= site_url('galery/') . $r->slug ?>"><?php echo $r->nama_galkat ?></a>

                                                </li>
                                            <?php } ?>


                                            <!--Pages end-->
                                        </ul>
                                    </li>
                                    <li class="<?php
                                                if ($status == '6') {
                                                    echo "$aktif";
                                                } else {
                                                    echo '';
                                                }

                                                ?>">
                                        <a href="#">Publikasi</a>
                                        <ul class="nav-dropdown">
                                            <?php

                                            foreach ($pubkat as $r) {
                                            ?>
                                                <li>
                                                    <a href="<?= site_url('publikasi/') . $r->slug ?>"><?php echo $r->nama_kat ?></a>

                                                </li>
                                            <?php } ?>


                                            <!--Pages end-->
                                        </ul>
                                    </li>
                                    
                                                                        <li class="<?php
                                                if ($status == '9') {
                                                    echo "$aktif ";
                                                } else {
                                                    echo '';
                                                }

                                                ?>">
                                        <a href="https://desalontar.com/auth">Login</a>
                                    </li>
                                    
                                </ul>
                                <!--nav menu end-->
                            </div>
                        </nav>
                        <!-- nav end-->
                    </div>
                </div>
            </div>
        </header>