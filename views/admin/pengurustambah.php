<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-8 col-xl-6">
                    <h4 class="mb-1 mt-0">
                        Tambah Data Pegawai

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



                            <?php echo form_open("admin/pengurus/simpan", array('enctype' => 'multipart/form-data')); ?>
                            <div class="row">
                                <div class="col">

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="example-textarea">NIP </label>

                                        <div class="col-lg-3">
                                            <input type="number" class="form-control" name="nip" placeholder="NIP" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="example-textarea">Nama Pegawai</label>

                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="nama" placeholder="Nama Pengurus " required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="example-textarea">Jabatan</label>

                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="example-textarea">Golongan</label>

                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="gol" placeholder="Golongan" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="example-textarea">Foto <span class="text-info">(400x600)</span> </label>

                                        <div class="col-lg-3">
                                            <input type="file" class="form-control" name="input_gambar" placeholder="NIP" required>
                                        </div>
                                    </div>



                                    <div class=" form-group row">
                                        <a href="<?= site_url('admin/pengurus/data') ?>" class="btn btn-secondary btn-sm">Batal</a>&nbsp;&nbsp;
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