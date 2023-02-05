
<br><br><br>
<body class="authentication-bg">
        
        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-md-6 p-5">
                                       

                                        <h6 class="h5 mb-0 mt-4">Selamat Datang !</h6>
                                        <p class="text-muted mt-1 mb-4">Masukan Email dan Password untuk melakukan login.</p>

                                        <form method="post" action="<?php echo base_url('auth/regis') ?>">
                                            <div class="form-group">
                                                <label class="form-control-label">Nama</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="mail"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" id="email" name="nama" placeholder="Masukan email address">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label">Email Address</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="mail"></i>
                                                        </span>
                                                    </div>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email address">
                                                </div>
                                            </div>

                                            <div class="form-group mt-4">
                                                <label class="form-control-label">Password</label>
                                               
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="lock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="password" name="password1" class="form-control" id="password"
                                                        placeholder="Masukan password">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group mt-4">
                                                <label class="form-control-label">Konfirmasi Password</label>
                                               
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="lock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="password" name="password2" class="form-control" id="password"
                                                        placeholder="Masukan password">
                                                </div>
                                            </div>

                                            

                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-primary btn-block" type="submit"> MASUK
                                                </button>
                                            </div>
                                        </form>
                                       
                                    </div>
                                    <div class="col-lg-4 d-none d-md-inline-block p-5">
                                       <br><br>
                                       
                                            <img src="<?= base_url('assets/'); ?>bg/bg.png" alt="bglogin" width="200px"  >
                                        
                                    </div>
                                </div>
                                
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                      
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
       <!-- Vendor js -->
<script src="<?= base_url('assets/'); ?>assets/js/vendor.min.js"></script>

<!-- optional plugins -->
<script src="<?= base_url('assets/'); ?>assets/libs/moment/moment.min.js"></script>
<script src="<?= base_url('assets/'); ?>assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url('assets/'); ?>assets/libs/flatpickr/flatpickr.min.js"></script>

<!-- page js -->
<script src="<?= base_url('assets/'); ?>assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="<?= base_url('assets/'); ?>assets/js/app.min.js"></script>


</body>

</html>