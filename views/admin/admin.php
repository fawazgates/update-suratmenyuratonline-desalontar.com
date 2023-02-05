<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row page-title align-items-center">
                <div class="col-sm-4 col-xl-6">
                    <h4 class="mb-1 mt-0">Dashboard Admin </h4>
                </div>
                <!-- <div class="col-sm-8 col-xl-6">
                    <form class="form-inline float-sm-right mt-3 mt-sm-0">
                        <div class="form-group mb-sm-0 mr-2">
                            <input type="text" class="form-control" id="dash-daterange" style="min-width: 190px;" />
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class='uil uil-file-alt mr-1'></i>Download
                                <i class="icon"><span data-feather="chevron-down"></span></i></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item notify-item">
                                    <i data-feather="mail" class="icon-dual icon-xs mr-2"></i>
                                    <span>Email</span>
                                </a>
                                <a href="#" class="dropdown-item notify-item">
                                    <i data-feather="printer" class="icon-dual icon-xs mr-2"></i>
                                    <span>Print</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item notify-item">
                                    <i data-feather="file" class="icon-dual icon-xs mr-2"></i>
                                    <span>Re-Generate</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div> -->
            </div>

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total Unit Kerja</span>
                                    <h2 class="mb-0"><?= $totunit ?></h2>
                                </div>
                                <div class="align-self-center">
                                    <span class="icon-lg icon-dual-primary" data-feather="briefcase"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">Data Pegawai</span>
                                    <h2 class="mb-0"><?= $totp ?></h2>
                                </div>
                                <div class="align-self-center">
                                    <span class="icon-lg icon-dual-warning" data-feather="users"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">Data Publikasi</span>
                                    <h2 class="mb-0"><?= $totpub ?></h2>
                                </div>
                                <div class="align-self-center">
                                    <span class="icon-lg icon-dual-success" data-feather="file-text"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">Data Galeri</span>
                                    <h2 class="mb-0"><?= $totgal ?></h2>
                                </div>
                                <div class="align-self-center">
                                    <span class="icon-lg icon-dual-info" data-feather="image"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content -->
            <div class="row">
                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <h5 class="card-title border-bottom p-3 mb-0">Berita</h5>
                            <!-- stat 1 -->
                            <div class="media px-3 py-4 border-bottom">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22"><?= $totber ?></h4>
                                    <span class="text-muted">Total Berita</span>
                                </div>
                                <i data-feather="file-text" class="align-self-center icon-dual icon-lg"></i>
                            </div>

                            <!-- stat 2 -->
                            <div class="media px-3 py-4 border-bottom">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22"><?= $tbk ?></h4>
                                    <span class="text-muted">Total Kategori Berita</span>
                                </div>
                                <i data-feather="clipboard" class="align-self-center icon-dual icon-lg"></i>
                            </div>

                            <!-- stat 3 -->
                            <div class="media px-3 py-4">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22"><?php echo $total_visit; ?></h4>
                                    <span class="text-muted">Total Pengunjung</span>
                                </div>
                                <i data-feather="eye" class="align-self-center icon-dual-danger icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9">
                    <div class="card">
                        <div class="card-body">

                            <h5 class="card-title mt-0 mb-0">#3 Berita Trending</h5>

                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Judul Berita</th>
                                            <th scope="col">Upload at</th>

                                            <th scope="col">Visitor</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($trend as $r) { ?>
                                            <tr>
                                                <td>
                                                    <img src="<?= base_url('berkas/berita/') . $r->foto_berita ?>" alt="newss" width="60">
                                                </td>
                                                <td><span  class="d-inline-block text-truncate" style="max-width: 300px;"><?php echo $r->judul ?></span></td>

                                                <td><?= $r->upload_at ?></td>
                                                <td><span class="badge badge-info py-1">

                                                        <?= $r->visitor ?>

                                                    </span></td>
                                            </tr><?php } ?>


                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>


            </div>


            <!-- row -->


        </div>
    </div> <!-- content -->