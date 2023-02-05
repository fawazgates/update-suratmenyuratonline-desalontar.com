
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-8 col-xl-6">
                    <h4 class="mb-1 mt-0">
                        Data Pengajuan Surat

                    </h4>
                </div>
                <div class="col-sm-4 col-xl-6 text-sm-right">
                    <!-- <a href="<?= site_url('admin/berita/post') ?>" class="btn btn-danger">Buat Berita Baru</a> -->

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
    
                                        <th>Nama </th>
                                        <th>Nik</th>
                                        <th>Umur</th>
                                        <th>Agama</th>
                                        <th>JK</th>
                                        <th>Pekerjaan</th>
                                        <th>dari tanggal</th>
                                        <th>Sampai tanggal</th>
                                        <th>Jenis Surat</th>
                                        <th>Pesan</th>
                                        

                                    </tr>
                                </thead>


                                <tbody>
                                    <?php

                                    foreach ($surat as $r) { ?>
                                        <tr>
                                            <td><span  class="d-inline-block text-truncate" style="max-width: 250px;"><?php echo $r->nama ?></span></td>
                                            <td><?php echo $r->nik ?></td>
                                           
                                            <td><?php echo $r->umur ?></td>
                                            <td><?php echo $r->agama ?></td>
                                            <td><?php echo $r->jk ?></td>
                                            <td><?php echo $r->pekerjaan ?></td>
                                            <td><?php echo $r->dari_tgl ?></td>
                                            <td><?php echo $r->sampai_tgl ?></td>
                                            <td><?php echo $r->jenis_surat ?></td>
                                            <td><?php echo $r->pesan ?></td>

                                           
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