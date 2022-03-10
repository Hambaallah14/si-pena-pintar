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
        </head>

        <body>
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
                                    <input type="text" class="form-control form-control-xl" placeholder="Masukkan NIP" name="login-nip">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left mb-2">
                                    <input type="password" class="form-control form-control-xl" placeholder="Masukkan Password"name="login-password">
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
                                    <a href="<?=base_url();?>peserta/registrasi_peserta" class="font-bold">daftar disini</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <div id="auth-right">

                        </div>
                    </div>
                </div>

            </div>
        </body>
    </html>
