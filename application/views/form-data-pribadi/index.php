<!-- WARNING -->
<div class="flash-data" data-target="Data Diri Pegawai" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<!-- END WARNING -->
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Akun - SI Pena Pintar</title>
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

        <div id="main-content">
            <div class="page-heading">
                <div class="page-title mb-2">
                    <div class="row ">
                        <div class="col-md-10 bg-light mx-auto mt-4 pt-3 pb-3 pl-3 pr-3">
                            <h3>DATA DIRI PEGAWAI</h3>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="row">
                        <div class="col-md-10 bg-light mx-auto mt-4 pt-3 pb-3 pl-4 pr-4">
                        <?php echo form_open("registrasi/add_form_registrasi", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                            
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#data-pribadi" type="button" role="tab" aria-controls="home" aria-selected="true">Data Pribadi</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target=".data-akun" type="button" role="tab" aria-controls="profile" aria-selected="false">Data Pegawai</button>
                                </li>
                            </ul>
                            <div class="tab-content mt-3" id="myTabContent">
                                <div class="tab-pane fade show active" id="data-pribadi" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label for="peserta-nip">NIP</label>
                                            <div class="form-group">
                                                <input id="peserta-nip" type="text" placeholder="NIP" class="form-control" name="peserta-nip" readonly required value="<?= $user[0]["nip_peserta"];?>">
                                            </div>
                                            
                                            <label for="peserta-nama">Nama Lengkap</label>
                                            <div class="form-group">
                                                <input id="peserta-nama" type="text" placeholder="Nama Lengkap" class="form-control" name="peserta-nama" value="<?= $user[0]["nama"];?>" required onkeyup="UpperCase('peserta-nama');">
                                            </div>

                                            <label for="peserta-alamat">Alamat</label>
                                            <div class="form-group">
                                                <input id="peserta-alamat" type="text" placeholder="Alamat" class="form-control" name="peserta-alamat" required onkeyup="UpperCase('peserta-alamat');">
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="peserta-jenis_kelamin">Jenis Kelamin</label>
                                                    <div class="form-group">
                                                        <select class="choices form-select peserta-jenis_kelamin" id="peserta-jenis_kelamin" name="peserta-jenis_kelamin">
                                                            <option>--PILIH JENIS KELAMIN--</option>
                                                            <option value="lk">LAKI-LAKI</option>
                                                            <option value="pr">PEREMPUAN</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="peserta-agama">Agama</label>
                                                    <div class="form-group">
                                                        <select class="choices form-select peserta-agama" id="peserta-agama" name="peserta-agama">
                                                            <option>--PILIH AGAMA--</option>
                                                            <?php
                                                                foreach($agama as $a){
                                                                    echo"<option value='".$a['id_agama']."'>".$a['agama']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="peserta-tempat_lhr">Tempat Lahir </label>
                                                    <small class="text-muted">(Diisi sesuai dengan SK CPNS atau SK Jabatan)</small>
                                                    <div class="form-group">
                                                        <input id="peserta-tempat_lhr" type="text" placeholder="Tempat Lahir" class="form-control" name="peserta-tempat_lhr" required onkeyup="UpperCase('peserta-tempat_lhr');">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="peserta-tgl_lhr">Tanggal Lahir</label>
                                                    <div class="form-group">
                                                        <input id="peserta-tgl_lhr" type="date" placeholder="Tanggal Lahir" class="form-control" name="peserta-tgl_lhr" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="peserta-email">Email</label>
                                                    <small class="text-muted">eg.<i>someone@example.com</i></small>
                                                    <div class="form-group">
                                                        <input id="peserta-email" type="text" placeholder="Email" class="form-control" name="peserta-email" required value="<?=$user[0]["email"];?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="peserta-no_telp">No. Telp</label>
                                                    <div class="form-group">
                                                        <input id="peserta-no_telp" type="text" placeholder="No. Telp" class="form-control" name="peserta-no_telp" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade data-akun" id="data-akun" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label for="peserta-pelatihan">Pelatihan</label>
                                            <div class="form-group">
                                                <select class="choices form-select" id="peserta-pelatihan" name="peserta-pelatihan">
                                                    <option value="-">--Pilih Pelatihan--</option>
                                                    <?php
                                                        foreach($pelatihan as $pel){
                                                            echo"<option value='".$pel['id_pelatihan']."'>".$pel['pelatihan']."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="peserta-gol">Golongan/Pangkat</label>
                                                    <div class="form-group">
                                                        <select class="choices form-select peserta-gol" id="peserta-gol" name="peserta-gol">
                                                            <option>--PILIH GOL/PANGKAT--</option>
                                                            <?php
                                                                foreach($gol as $a){
                                                                    echo"<option value='".$a['id_gol']."'>".$a['gol']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="peserta-jabatan">Jabatan Terakhir</label>
                                                    <div class="form-group">
                                                        <input id="peserta-jabatan" type="text" placeholder="Jabatan Terakhir" class="form-control" name="peserta-jabatan" required onkeyup="UpperCase('peserta-jabatan');">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="peserta-pola">Pola Penyelenggaraan</label>
                                                    <select class="choices form-select peserta-pola" id="peserta-pola" name="peserta-pola">
                                                        <option>--PILIH POLA PENYELENGGARAAN--</option>
                                                        <?php
                                                            foreach($pola as $a){
                                                                echo"<option value='".$a['id_pola']."'>".$a['pola']."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="peserta-instansi">Instansi</label>
                                                    <select class="choices form-select peserta-instansi" id="peserta-instansi" name="peserta-instansi">
                                                        <option>--PILIH INSTANSI--</option>
                                                        <?php
                                                            foreach($instansi as $a){
                                                                echo"<option value='".$a['id_instansi']."'>".$a['instansi']."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <label for="peserta-unor">Unit Kerja</label>
                                                    <small class="text-muted">(Sesuai SPMT)</small>
                                                    <div class="form-group">
                                                        <input id="peserta-unor" type="text" placeholder="Unit Kerja" class="form-control" name="peserta-unor" required onkeyup="UpperCase('peserta-unor');">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="peserta-alamat_unor">Alamat Unit Kerja</label>
                                                    <small class="text-muted">(Sesuai SPMT)</small>
                                                    <div class="form-group">
                                                        <input id="peserta-alamat_unor" type="text" placeholder="Alamat Unit Kerja" class="form-control" name="peserta-alamat_unor" required onkeyup="UpperCase('peserta-alamat_unor');">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="peserta-upload_sk_cpns" class="form-label">SK CPNS </label>
                                                    <small class="text-muted">(Asli atau Fotocopy di Legalisir)</small>
                                                    <input class="form-control" type="file" id="peserta-upload_sk_cpns" required name="peserta-upload_sk_cpns">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="peserta-upload_sk_jabatan" class="form-label">SK jabatan Terakhir </label>
                                                    <small class="text-muted">(Asli atau Fotocopy di Legalisir)</small>
                                                    <input class="form-control" type="file" id="peserta-upload_sk_jabatan" required name="peserta-upload_sk_jabatan">
                                                </div>
                                            </div>

                                            <div class="form-check mt-3">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="check-agree" class="form-check-input check-agree">
                                                    <label for="check-agree">Saya Setuju</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 pt-3 pb-3 pl-3 pr-3 float-right">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Tutup</span>
                                                    </button>
                                                    
                                                    <button type="submit" class="btn btn-primary ml-1 disabled" id="registrasi-btn-submit">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Simpan</span>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                        </div>
                    </div>

                    
                </section>

                <section class="section">
                    <div class="row">
                        <div class="col-md-10 bg-light mx-auto mt-4 pt-3 pb-3 pl-3 pr-3">
                            <div class="footer clearfix mb-0 text-muted">
                                <div class="float-start">
                                    <p>2022 &copy; SI PENA PINTAR</p>
                                </div>
                    
                                <div class="float-end">
                                    <p>Created By BPSDM Provsu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div> <!-- END MAIN -->



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
