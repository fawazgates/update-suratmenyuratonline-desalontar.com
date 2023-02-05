<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-8 col-xl-6">
                    <h4 class="mb-1 mt-0">
                        Tambah Data Unit Kerja

                    </h4>
                </div>
                <div class="col-sm-4 col-xl-6 text-sm-right">
                    <div class="btn-group ml-2 d-none d-sm-inline-block">

                    </div>

                </div>
            </div>
            <?php echo $this->session->flashdata('pesan'); ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <?php foreach ($unitedit as $re) { ?>

                                <form action="<?php echo base_url() . 'admin/unitkerja/update'; ?>" method="POST">
                                    <div class="row">
                                        <div class="col">
                                            <input type="hidden" name="id_unit" value="<?= $re->id_unit ?>">

                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">Unit Kerja </label>
                                                <div class="col-lg-4">
                                                    <select data-plugin="customselect" name="id_kunit" class="form-control" required data-placeholder="Select an option" disabled>
                                                        <?php
                                                        foreach ($u as $un) {
                                                            echo "<option value='$un->id_kunit'";
                                                            echo $re->id_kunit == $un->id_kunit ? 'selected' : '';
                                                            echo ">$un->nama_unit</option>";
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">Pegawai </label>
                                                <div class="col-lg-6">
                                                    <select data-plugin="customselect" name="id" class="form-control" required data-placeholder="Select an option">
                                                        <?php
                                                        foreach ($peng as $pe) {
                                                            echo "<option value='$pe->id'";
                                                            echo $re->id == $pe->id ? 'selected' : '';
                                                            echo ">$pe->nama</option>";
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="example-textarea">Deskripsi
                                                    <br>
                                                    <p class="text-warning text-small"> <code class="text-info">note: pada form deskripsi bisa di isi penjelasan singkat mengenai unitkerja seperti tugas dan fungsi</code></p>

                                                </label>

                                                <input type="hidden" name="deskripsi">
                                                <div class="col-lg-10">
                                                    <textarea name="deskripsi" id="ckeditor" required><?= $re->deskripsi ?></textarea>
                                                </div>
                                            </div>


                                            <div class=" form-group row">
                                                <a href="<?= site_url('admin/unitkerja/data') ?>" class="btn btn-secondary btn-sm">Batal</a>&nbsp;&nbsp;
                                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                                            </div>


                                        </div>
                                    </div>
                                </form><?php } ?>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>

            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->




</div>