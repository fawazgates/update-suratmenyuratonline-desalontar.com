<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-sm-8 col-xl-6">
                    <h4 class="mb-1 mt-0">
                        Edit Berita 

                    </h4>
                </div>
                <div class="col-sm-4 col-xl-6 text-sm-right">
                    <div class="btn-group ml-2 d-none d-sm-inline-block">

                    </div>

                </div>
            </div>

            <?php echo $this->session->flashdata('pesans'); ?>
            <?php foreach ($be as $r) { ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">



                            <form class="needs-validation" novalidate action="<?php echo site_url() . 'admin/berita/update'; ?>" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col">
                                   
                                         
                                    <input type="hidden" name="id_berita" value="<?php echo $r->id_berita ?>" class="form-control" id="validationCustom01" required>
                                              
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for=" validationCustom01">Judul Berita</label>
                                            <div class="col-lg-10">
                                                <input type="text" name="judul" value="<?php echo $r->judul ?>" class="form-control" id="validationCustom01" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="example-textarea">Isi Berita </label>

                                            <div class="col-lg-10">
                                                <textarea id="mytextarea"  rows="5" name='isi_berita'>
                                                <?php echo $r->isi_berita ?>
                                                 </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="example-textarea">Kategori Berita </label>
                                            <div class="col-lg-4">
                                                <select data-plugin="customselect" name="id_beritakat" class="form-control" data-placeholder="Select an option">

                                                    <?php

                                                    foreach ($bk as $r) {
                                                    ?>

                                                        <option value="<?php echo $r->id_beritakat ?>"><?php echo $r->nama_kat ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="example-textarea">Jenis Berita </label>
                                            <div class="col-lg-4">
                                                <select data-plugin="customselect" name="publik" class="form-control" data-placeholder="Select an option">



                                                    <option value="0">Internal OPD</option>
                                                    <option value="1">Publik</option>


                                                </select>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="example-textarea">Tanggal Berita </label>

                                            <div class="col-lg-4">
                                                <input type="date" name="upload_at" id="basic-datepicker" required class="form-control" placeholder="Basic datepicker">
                                            </div>
                                        </div>

                                      


                                        <div class=" form-group row p-3">
                                            <a href="<?= site_url('admin/berita/data') ?>" class="btn btn-secondary btn-sm">Batal</a>&nbsp;&nbsp;
                                            <button type="submit" class="btn btn-success btn-sm">Update Data Berita </button>
                                        </div>


                                    </div>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <?php } ?>
            <!-- end row -->




            <?php foreach ($be as $r) { ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">



                            <form class="needs-validation" novalidate action="<?php echo site_url() . 'admin/berita/updatefotoberita'; ?>" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col">
                                    <label for="">Update Foto Berita</label>
                                   
                                    <input type="hidden" name="id_berita" value="<?php echo $r->id_berita ?>" class="form-control" id="validationCustom01" required>
                                               
                                              
                                        <div class="form-group row">
                                            <div class="col-lg-10">
                                               <img src="<?= base_url('berkas/berita/') . $r->foto_berita; ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-10">
                                            <input type="file" class="form-control" name="foto_berita" required></input>
                                            </div>
                                        </div>
                                       
                                       


                                        <div class=" form-group row p-3">
                                             <button type="submit" class="btn btn-success btn-sm">Update Foto Berita </button>
                                        </div>


                                    </div>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
        </div> <!-- container-fluid -->

    </div> <!-- content -->


    <?php } ?>

</div>