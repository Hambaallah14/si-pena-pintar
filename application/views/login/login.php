<!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login - SI Pena Pintar</title>
            <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.css">
            <link rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap-icons/bootstrap-icons.css">
            <link rel="stylesheet" href="<?=base_url();?>assets/css/app.css">
            <link rel="stylesheet" href="<?=base_url();?>assets/css/pages/auth.css">

            <!-- Favicon-->
            <link rel="icon" href="<?= base_url();?>assets/images/logo-provsu.png" type="image/x-icon">


            <!-- SELECT CHOICES -->
            <link rel="stylesheet" href="<?=base_url();?>assets/vendors/choices.js/choices.min.css" />
            <!-- END SELECT CHOICES -->
        </head>

        <body>
            <!-- WARNING -->
            <div class="flash-data" data-target="Registrasi Peserta" data-flashdata="<?= $this->session->flashdata('flash1'); ?>"></div>
            <!-- END WARNING -->

            <div id="auth">
                
                <div class="row h-100">
                    <div class="col-lg-5 col-12">
                        <div id="auth-left">
                            <div class="auth-logo">
                                <a href="index.html"><img src="<?=base_url();?>assets/images/si-pena-pintar-logo.png" style="width:100%;height:auto;" alt="Logo"></a>
                            </div>
                            
                            <h5 class="auth-title">Log in.</h5>
                            <!--   Message Warning       -->
                            <?php if ($this->session->flashdata('flash')) { ?>
                			    <div class="alert alert-danger" role="alert">
                    			    <?= $this->session->flashdata('flash'); ?>
                			    </div>
            			    <?php } ?>
        				    <!--   End Message Warning       -->

                            <?php echo form_open("login/cek", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                                <div class="form-group position-relative has-icon-left mb-4">
                                    <input type="text" required class="form-control form-control-xl" placeholder="Masukkan NIP" name="login-nip">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left mb-2">
                                    <input type="password" required class="form-control form-control-xl" placeholder="Masukkan Password"name="login-password">
                                    <div class="form-control-icon">
                                        <i class="bi bi-shield-lock"></i>
                                    </div>
                                </div>
                                <!-- <div class="form-check form-check-lg d-flex align-items-end">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                        Keep me logged in
                                    </label>
                                </div> -->
                                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Log in</button>
                            <?php echo form_close(); ?>

                            <div class="text-center mt-5 text-lg fs-4">
                                <p class="text-gray-200">Belum punya akun?
                                    <a href="#" class="font-bold" data-bs-toggle="modal" data-bs-target="#FormPeserta">daftar disini</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <div id="auth-right">
                                <div style="padding-top:250px;padding-left:50px;">
                                    <h2 class="text-light mx-auto">Selamat datang di Aplikasi SI PENA PINTAR untuk mendukung <strong>SI BERMARTABAT<strong></h2>
                                </div>
                        </div>
                    </div>
                </div>

            </div>



        <!-- Modal Tambah Data Peserta -->
        <div class="modal fade text-left" id="FormPeserta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Tambah Data Peserta</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <?php echo form_open("registrasi/add", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                        <div class="modal-body">
                            <label for="peserta-nip">NIP </label>
                            <small class="text-muted">(Ketik angka NIP tanpa Spasi Contoh : 197711022011011002)</small>
                            <div class="form-group">
                                <input id="peserta-nip" type="text" placeholder="NIP" class="form-control" name="peserta-nip" required>
                            </div>
                            <?= form_error('peserta-nip', '<span style="color:red;"></span>'); ?>
                            
                            <label for="peserta-nama">Nama Lengkap & Gelar </label>
                            <small class="text-muted">(Nama Isi dengan huruf KAPITAL, Gelar menyesuaikan)</small>
                            <div class="form-group">
                                <input id="peserta-nama" type="text" placeholder="Nama Lengkap" class="form-control" name="peserta-nama" required onkeyup="UpperCase('peserta-nama');">
                            </div>
                            <?= form_error('peserta-nama', '<span style="color:red;"></span>'); ?>
                            
                            <label for="peserta-email">Email</label>
                            <small class="text-muted">eg.<i>someone@example.com</i></small>
                            <div class="form-group">
                                <input id="peserta-email" type="text" placeholder="Email" class="form-control" name="peserta-email" required>
                            </div>
                            <?= form_error('peserta-email', '<span style="color:red;"></span>'); ?>

                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="peserta-password">Password</label>
                                    <div class="form-group">
                                        <input id="peserta-password" type="password" placeholder="Password" class="form-control" name="peserta-password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="peserta-confirm-password">Konfirmasi Password</label>
                                    <div class="form-group">
                                        <input id="peserta-confirm-password" type="password" placeholder="Konfirmasi Password" class="form-control" name="peserta-confirm-password" required>
                                    </div>
                                    <?= form_error('peserta-confirm-password', '<span style="color:red;"></span>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Tutup</span>
                            </button>
                            
                            <button type="submit" class="btn btn-primary ml-1" class="peserta-btn-submit">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Simpan</span>
                            </button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!-- END Modal Tambah Data -->




        <script src="<?=base_url();?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="<?=base_url();?>assets/js/bootstrap.bundle.min.js"></script>    
        <script src="<?=base_url();?>assets/vendors/apexcharts/apexcharts.js"></script>
        <script src="<?=base_url();?>assets/js/pages/dashboard.js"></script>
        <script src="<?=base_url();?>assets/js/mazer.js"></script>

        <!-- DATATABLES -->
        <script src="<?=base_url();?>assets/vendors/jquery/jquery.min.js"></script>
        <script src="<?=base_url();?>assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
        <script src="<?=base_url();?>assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
        <script src="<?=base_url();?>assets/vendors/fontawesome/all.min.js"></script>
        <script>
            let jquery_datatable = $("#table1").DataTable()
        </script>
        <!-- END DATATABLES -->

        <!-- SWEET ALERTS -->
        <script src="<?=base_url();?>assets/js/extensions/sweetalert2.js"></script>
        <script src="<?=base_url();?>assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
        <!-- END SWEET ALERTS -->

        <!-- FONTAWESOME -->
        <script src="<?=base_url();?>assets/vendors/fontawesome/all.min.js"></script>
        <!-- END FONTAWESOME -->

        <!-- CHART -->
        <script src="<?=base_url();?>assets/vendors/chartjs/Chart.min.js"></script>
        <script src="<?=base_url();?>assets/js/pages/ui-chartjs.js"></script>
        <!-- END CHART -->

        <!-- SELECT JS -->
        <script src="<?=base_url();?>assets/vendors/choices.js/choices.min.js"></script>
        <script src="<?=base_url();?>assets/js/pages/form-element-select.js"></script>
        <!-- END SELECT JS -->

        <!-- SI PENA PINTAR JS -->
        <script src="<?=base_url();?>assets/js/si-pena-pintar-js.js"></script>
        <!-- END SI PENA PINTAR JS -->

        </body>
    </html>
