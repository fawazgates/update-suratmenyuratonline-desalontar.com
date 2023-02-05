<!doctype html>
<html lang="en">


<head>
    <?php foreach ($sb as $r) { ?>
        <!-- Facebook meta =====================================-->
        <meta property="og:url" content="<?= site_url('home/berita/post/') . $r->slug ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?= $r->judul ?>" />
        <meta property="og:description" content="" />
        <meta property="og:image" content="<?= base_url('berkas/berita/') . $r->foto_berita ?>" />
    <?php } ?>


    <!-- Basic Page Needs =====================================-->
    <meta charset="utf-8">

    <!-- Mobile Specific Metas ================================-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Site Title- -->
    <title><?php foreach ($opd as $r) { ?>
            <?= $r->nama_pendek ?>
        <?php } ?></title>

    <!-- CSS
   ==================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/'); ?>css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/'); ?>css/font-awesome.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/'); ?>css/animate.css">

    <!-- IcoFonts -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/'); ?>css/icofonts.css">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/'); ?>css/owlcarousel.min.css">

    <!-- slick -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/'); ?>css/slick.css">

    <link rel="icon" type="image/png" href="<?= base_url('assets/vendor/logo/fav.png'); ?>">

    <!-- navigation -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/'); ?>css/navigation.css">

    <!-- magnific popup -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/'); ?>css/magnific-popup.css">




    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/'); ?>css/style.css">

    <link rel="stylesheet" href="<?= base_url('assets/vendor/'); ?>css/colors/color-3.css">

    <!-- Responsive -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/'); ?>css/responsive.css">


</head>