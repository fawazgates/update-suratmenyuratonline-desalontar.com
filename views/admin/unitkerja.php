<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-8 col-xl-6">
                    <h4 class="mb-1 mt-0">
                        Data Unit Kerja

                    </h4>
                </div>
                <div class="col-sm-4 col-xl-6 text-sm-right">
                    <a href="<?= site_url('admin/unitkerja/tambah') ?>" type="button" class="btn btn-danger">Tambah Data</a>

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

                                        <th>Unit kerja</th>
                                        <th>Nama Pegawai</th>
                                        <th>Nip</th>
                                        <th>Jabatan</th>
                                        <th>Golongan</th>
                                        <th>
                                            <center>Aksi </center>
                                        </th>

                                    </tr>
                                </thead>


                                <tbody>
                                    <?php

                                    foreach ($uk as $r) { ?>
                                        <tr>

                                            <td><?php echo $r->nama_unit ?></td>
                                            <td><?php echo $r->nama ?></td>
                                            <td><?php echo $r->nip ?></td>
                                            <td><?php echo $r->jabatan ?></td>
                                            <td><?php echo $r->gol ?></td>
                                            <td scope="row">
                                                <center>
                                                    <a href="<?= site_url('admin/unitkerja/edit/') . $r->id_unit ?>" class="text-info d-inline-block " data-toggle="tooltip" data-placement="top" title="" data-original-title="edit data">
                                                        <i class="uil uil-edit mr-1"></i>
                                                    </a>
                                                    &nbsp;
                                                    <a href="<?= site_url('admin/unitkerja/hapus/') . $r->id_unit ?>" class="text-danger d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="hapus data">
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