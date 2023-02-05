<html>

<head>
    <title>Aplikasi Surat Online <?= $opd->nama_opd; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='custom.css' rel='stylesheet' type='text/css'>
</head>

<body>

    <div class="container">

        <div class="row">

            <div class="col-xl-8 offset-xl-2 py-5">

                <?php
                if ($this->session->flashdata('info') !== null) {
                ?>
                    <div class="alert alert-success" role="alert">
                           <?=$this->session->flashdata('info')?>
                    </div>
                <?php }
                ?>
                <h1 align="center">
                    <p>Pelayanan Surat Online</p>
                    <a href="<?= base_url() ?>"><?= $opd->nama_opd; ?></a>
                </h1>

                <p class="lead">Silahkan lengkapi semua isian sesuai dengan data yang diperlukan</p>


                <form id="contact-form" method="post" action="<?= base_url() ?>surat/simpan" role="form">

                    <div class="messages"></div>

                    <div class="controls">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name">Nama *</label>
                                    <input id="nama" type="text" name="nama" class="form-control" placeholder="Silahkan masukkan nama anda *" required="required" data-error="Nama harus diisi!.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_lastname">NIK *</label>
                                    <input id="nik" type="text" name="nik" class="form-control" placeholder="Silahkan masukkan NIK anda *" required="required" data-error="NIK Harus diisi!.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_lastname">Tempat Tanggal Lahir <i>( Serang 20-09-1988 )</i></label>
                                    <input id="lahir" type="text" name="lahir" class="form-control" placeholder="Silahkan Tempat Tanggal Lahir ( Serang 20-09-1988 )*" required="required" data-error="NIK Harus diisi!.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_lastname">Umur</i></label>
                                    <input id="form_lastname" type="number" name="umur" class="form-control" placeholder="20 tahun" required="required" data-error="NIK Harus diisi!.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_lastname">Agama</i></label>
                                    <select id="agama" name="agama" class="form-control" required="required" data-error="">
                                        <option value="">Pilih </option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buda">Buda</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_lastname">Jenis Kelamin</i></label>
                                    <select id="jk" name="jk" class="form-control" required="required" data-error="">
                                        <option value="">Pilih </option>

                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_lastname">Pekerjaan</i></label>
                                    <input id="pekerjaan" type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" required="required" data-error="NIK Harus diisi!.">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_lastname">Berlaku dari</i></label>
                                    <input id="dari_tgl" type="date" name="dari_tgl" class="form-control" placeholder="dari" required="required" data-error="NIK Harus diisi!.">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_lastname">S/d tanggal</i></label>
                                    <input id="sampai_tgl" type="date" name="sampai_tgl" class="form-control" placeholder="Sampai" required="required" data-error="NIK Harus diisi!.">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_email">Email *</label>
                                    <input id="email" type="email" name="email" class="form-control" placeholder="Silahkan masukkan email anda *" required="required" data-error="Format email salah.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_need">Pilih Jenis Surat *</label>
                                    <select id="jenis_surat" name="jenis_surat" class="form-control" required="required" data-error="Pilih jenis surat yang anda perlukan">
                                        <option value="">Pilih </option>

                                        <option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
                                        <option value="Surat Keterangan Tidak Mampu">Surat Keterangan Tidak Mampu</option>
                                        <option value="Surat Keterangan Miskin">Surat Keterangan Miskin</option>
                                        <option value="Surat Keterangan Belum Pernah Menikah">Surat Keterangan Belum Pernah Menikah</option>
                                        <option value="Surat Keterangan Kelahiran">Surat Keterangan Kelahiran</option>
                                        <option value="Surat Keterangan Kematian">Surat Keterangan Kematian</option>
                                        <option value="Surat Keterangan Beda Nama">Surat Keterangan Beda Nama</option>
                                        <option value="Surat Keterangan Penghasilan">Surat Keterangan Penghasilan</option>
                                        <option value="Surat Keterangan Harga Tanah">Surat Keterangan Harga Tanah</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_message">Pesan *</label>
                                    <textarea id="pesan" name="pesan" class="form-control" placeholder="Silahkan isi keperluan atau keterangan lainnya disini *" rows="4" required="required" data-error="Silahkan isi pesan atau keterangan anda."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-success btn-send" value="Kirim Permohonan">
                            </div>
                            <div class="col-md-6">
                                <input type="button" class="btn btn-primary btn-send" value="Kembali" onclick="window.history.back()" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-muted">
                                    <strong>*</strong> Harus diisi
                                </p>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
            <!-- /.8 -->

        </div>
        <!-- /.row-->

    </div>
    <!-- /.container-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>
    <script src="contact.js"></script>
</body>

</html>