
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-8 col-xl-6">
                    <h4 class="mb-1 mt-0">
                        Data Berita

                    </h4>
                </div>
                <div class="col-sm-4 col-xl-6 text-sm-right">
                    <a href="<?= site_url('admin/berita/post') ?>" class="btn btn-danger">Buat Berita Baru</a>

                </div>
            </div>


            <!-- details-->
            <?php echo $this->session->flashdata('pesan'); ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-1"></h4>
                            <p class="sub-header">


                            </p>

                            <table id="basic-datatable" class="table dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Judul Berita</th>
                                        <th>Kategori Berita</th>
                                        <th>
                                            <center>Jenis Berita </center>
                                        </th>
                                        <th>Tgl Berita</th>
                                        <th>Foto Berita</th>
                                        <th>
                                            <center>Aksi </center>
                                        </th>

                                    </tr>
                                </thead>


                                <tbody>
                                    <?php

                                    foreach ($bn as $r) { ?>
                                        <tr>
                                            <td><span  class="d-inline-block text-truncate" style="max-width: 250px;"><?php echo $r->judul ?></span></td>
                                            <td><?php echo $r->nama_kat ?></td>
                                            <td>
                                                <center><?php
                                                        if ($r->publik == 0) {
                                                            echo " <i class='uil uil-briefcase-alt '></i>";
                                                        } else {
                                                            echo "<i class='uil uil-globe text-primary'></i>";
                                                        }

                                                        ?> </center>
                                            </td>
                                            <td><?php echo $r->upload_at ?></td>
                                            <td><img width="80" height="50" src="<?= base_url('berkas/berita/') . $r->foto_berita; ?>" alt=""></td>
                                            <td scope="row">
                                                <center>
                                                    <a href="<?= site_url('admin/berita/post/edit/') . $r->id_berita ?>" class="text-info d-inline-block " data-toggle="tooltip" data-placement="top" title="" data-original-title="edit data">
                                                        <i class="uil uil-edit mr-1"></i>
                                                    </a>
                                                    &nbsp;
                                                    <a href="<?= site_url('admin/berita/post/hapus/') . $r->id_berita ?>" class="text-danger d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="hapus data">
                                                        <i class="uil uil-trash mr-1"></i>
                                                    </a></center>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->







</div>