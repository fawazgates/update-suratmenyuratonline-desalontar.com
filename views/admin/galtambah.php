<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-8 col-xl-6">
                    <h4 class="mb-1 mt-0">
                        Tambah Data Galery Kegiatan

                    </h4>
                </div>
                <div class="col-sm-4 col-xl-6 text-sm-right">
                    <div class="btn-group ml-2 d-none d-sm-inline-block">

                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <?php echo $this->session->flashdata('pesan'); ?>


                    <div class="card">
                        <div class="card-body">



                            <?php echo form_open("admin/galery/simpan", array('enctype' => 'multipart/form-data')); ?>
                            <div class="row">
                                <div class="col">

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="example-textarea">Kategori Galery </label>
                                        <div class="col-lg-4">
                                            <select data-plugin="customselect" name="id_galkat" class="form-control" data-placeholder="Select an option">
                                                <option>Pilih</option>
                                                <?php

                                                foreach ($galkat as $r) {
                                                ?>

                                                    <option value="<?php echo $r->id_galkat ?>"><?php echo $r->nama_galkat ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="example-textarea">Deskripsi</label>

                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="ket" placeholder="Keterangan" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="example-textarea">Foto Kegiatan <span class="text-info">(900x700)</span> </label>

                                        <div class="col-lg-3">
                                            <input type="file" class="form-control" name="file" placeholder="NIP" required>
                                        </div>
                                    </div>


                                    <div class=" form-group row p-2">
                                        <a href="<?= site_url('admin/galery/data') ?>" class="btn btn-secondary btn-sm">Batal</a>&nbsp;&nbsp;
                                        <button type="submit" name="submit" class="btn btn-success btn-sm" value="Simpan">Simpan</button>
                                    </div>


                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->




</div>