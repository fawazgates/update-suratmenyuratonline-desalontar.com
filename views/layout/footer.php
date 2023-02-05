<!-- footer social list end-->

<!-- newslater start -->
<section class="ts-footer-social-list section-bg">
    <div class="container">

    </div>
</section>
<!-- footer social list end-->

<!-- newslater start -->
<?php foreach ($opd as $r) { ?>
    <section class="ts-newslatter section-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">

                    <div class="ts-newslatter-content">
                        <h3>
                            <img src="<?= base_url('berkas/icon/') . $r->file ?>" width="300" alt="">
                        </h3>
                        <p>
                            <?= $r->nama_pendek ?>
                            <br>
                            Alamat : <?= $r->alamat ?>
                            <br>
                            No Telp : <?= $r->no_telp ?>



                        </p>
                    </div>
                </div>
                <!-- col end-->

                <div class="col-lg-6 ">
                    <div class="footer-logo">
                        <h3>Ikuti Kami</h3><br>
                        <ul class="footer-social">
                            <li class="ts-facebook">
                                <a href="<?= $r->facebook ?>">
                                    <i class="fa fa-facebook"></i>
                                    <span>Facebook</span>
                                </a>
                            </li>
                            <li class="ts-google-plus">
                                <a href="<?= $r->email ?>">
                                    <i class="fa fa-google-plus"></i>
                                    <span>Gmail</span>
                                </a>
                            </li>
                            <li class="ts-twitter">
                                <a href="<?= $r->twiter ?>">
                                    <i class="fa fa-twitter"></i>
                                    <span>Twitter</span>
                                </a>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><?php } ?>
<!-- newslater end -->

<!-- footer start -->
<footer class="ts-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-menu text-center">

                </div>
                <div class="copyright-text text-center">
                    <?php foreach ($opd as $r) { ?>
                        <p>&copy; 2021, <?= $r->nama_pendek ?> . All rights reserved</p>
                </div><?php } ?>
            </div><!-- col end -->
        </div><!-- row end -->
        <div id="back-to-top" class="back-to-top">
            <button class="btn btn-primary" title="Back to Top">
                <i class="fa fa-angle-up"></i>
            </button>
        </div><!-- Back to top end -->
    </div><!-- Container end-->
</footer>
<!-- footer end -->


</div>


<!-- javaScript Files
	=============================================================================-->
<script src="<?= base_url('assets/vendor/'); ?>js/jquery.min.js"></script>
<!-- navigation JS -->
<script src="<?= base_url('assets/vendor/'); ?>js/navigation.js"></script>
<!-- Popper JS -->
<script src="<?= base_url('assets/vendor/'); ?>js/popper.min.js"></script>

<!-- magnific popup JS -->
<script src="<?= base_url('assets/vendor/'); ?>js/jquery.magnific-popup.min.js"></script>



<!-- Bootstrap jQuery -->
<script src="<?= base_url('assets/vendor/'); ?>js/bootstrap.min.js"></script>
<!-- Owl Carousel -->
<script src="<?= base_url('assets/vendor/'); ?>js/owl-carousel.2.3.0.min.js"></script>
<!-- slick -->
<script src="<?= base_url('assets/vendor/'); ?>js/slick.min.js"></script>

<!-- smooth scroling -->
<script src="<?= base_url('assets/vendor/'); ?>js/smoothscroll.js"></script>

<script src="<?= base_url('assets/vendor/'); ?>js/main.js"></script>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
</body>


<!-- Mirrored from demo.themewinter.com/html/vinazine/index-6.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Sep 2020 22:10:59 GMT -->

</html>