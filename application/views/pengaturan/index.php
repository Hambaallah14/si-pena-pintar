<!-- WARNING -->
<div class="flash-data" data-target="Pengaturan" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<!-- END WARNING -->

        <div id="main-content">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Pengaturan</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Pengaturan</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h5>Jadwal Pendaftaran</h5>
                        </div>
                        <div class="card-body ">
                            <?php echo form_open("pengaturan/update_jadwal_registrasi", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                                <div class="row">
                                    <input type="hidden" value="<?=$jadwal_registrasi[0]["id"];?>" name="pengaturan-id">
                                    <div class="col-md-6">
                                        <label for="pengaturan-tanggal-mulai">Tanggal Mulai</label>
                                        <div class="form-group">
                                            <input id="pengaturan-tanggal-mulai" type="date" class="form-control" name="pengaturan-tanggal-mulai" required value="<?=$jadwal_registrasi[0]["start_date"];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pengaturan-tanggal-akhir">Tanggal Akhir</label>
                                        <div class="form-group">
                                            <input id="pengaturan-tanggal-akhir" type="date" class="form-control" name="pengaturan-tanggal-akhir" required value="<?=$jadwal_registrasi[0]["finish_date"];?>">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary ml-1 mt-2" class="pengaturan-btn-submit">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Simpan</span>
                                </button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>Jadwal Pengumuman</h5>
                        </div>
                        <div class="card-body ">
                            <?php echo form_open("pengaturan/update_jadwal_pengumuman", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                                <input type="hidden" value="<?=$jadwal_pengumuman[0]["id"];?>" name="pengaturan-id">
                                <label for="pengaturan-tanggal-pengumuman">Tanggal Pengumuman</label>
                                <div class="form-group">
                                    <input id="pengaturan-tanggal-pengumuman" type="date" class="form-control" name="pengaturan-tanggal-pengumuman" required value="<?=$jadwal_pengumuman[0]["tgl_jadwal"];?>">
                                </div>
                                
                                <button type="submit" class="btn btn-primary ml-1 mt-2" class="pengaturan-btn-submit">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Simpan</span>
                                </button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; SI PENA PINTAR</p>
                    </div>
        
                    <div class="float-end">
                        <p>Created By BPSDM Provsu</p>
                    </div>
                </div>
            </footer>
        </div>
    </div> <!-- END MAIN -->



        <!-- Modal Tambah Data -->
        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Tambah Data Penceramah</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <?php echo form_open("", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                        
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#data-pribadi" type="button" role="tab" aria-controls="home" aria-selected="true">Data Pribadi</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target=".data-akun" type="button" role="tab" aria-controls="profile" aria-selected="false">Data Akun</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="data-pribadi" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <div class="modal-body">
                                                <label for="penceramah-id">ID Penceramah</label>
                                                <div class="form-group">
                                                    <input id="penceramah-id" type="text" placeholder="ID Penceramah" class="form-control" name="penceramah-id" required>
                                                </div>

                                                <label for="penceramah-nama">Nama Lengkap</label>
                                                <div class="form-group">
                                                    <input id="penceramah-nama" type="text" placeholder="Nama Lengkap" class="form-control" name="penceramah-nama" required>
                                                </div>
                                                
                                                <label for="penceramah-jabatan">Jabatan</label>
                                                <div class="form-group">
                                                    <input id="penceramah-jabatan" type="text" placeholder="Jabatan" class="form-control" name="penceramah-jabatan" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Tutup</span>
                                                </button>
                                                
                                                <button type="submit" class="btn btn-primary ml-1" class="penceramah-btn-submit">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Simpan</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade data-akun" id="data-akun" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <div class="modal-body">
                                                <div class="penceramah-status-user">
                                                    <label for="penceramah-status-user">Status User</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="penceramah-status-user" name="penceramah-status-user">
                                                            <option value="-">--Pilih Status User--</option>
                                                            <option value="aktif">Aktif</option>
                                                            <option value="tidak aktif">Tidak aktif</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                
                                                <div class="penceramah-password">
                                                    <label for="penceramah-password">Password</label>
                                                    <div class="form-group">
                                                        <input id="penceramah-password" type="password" placeholder="Password" class="form-control" name="penceramah-password">
                                                    </div>
                                                    <label for="penceramah-confirm-password">Konfirmasi Password</label>
                                                    <div class="form-group">
                                                        <input id="penceramah-confirm-password" type="password" placeholder="Konfirmasi Password" class="form-control" name="penceramah-confirm-password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Tutup</span>
                                                </button>
                                                
                                                <button type="submit" class="btn btn-primary ml-1" class="penceramah-btn-submit">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Simpan</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        

                        
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!-- END Modal Tambah Data -->
