<!-- WARNING -->
<div class="flash-data" data-target="Jadwal Pengajar" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<!-- END WARNING -->

        <div id="main-content">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Tambah Jadwal</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class="breadcrumb-item active" aria-current="page">Jadwal Pelatihan</li>
                                    <li class="breadcrumb-item active" aria-current="page">Tambah Jadwal</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">            
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row mb-4">
                                            <div class="col-md-12">
                                                <?php echo form_open("jadwal/addJadwalPengajar", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                                                    
                                                    <input type="hidden" name="id_jadwal" value="<?=$idJadwal;?>">
                                                    <input type="hidden" name="id_batch" value="<?=$idBatch;?>">
                                                    <input type="hidden" name="id_tanggal" value="<?=$idTanggal;?>" id="id_tanggal">
                                                    <input type="hidden" name="id_j_m" value="<?=$idMateri;?>" id="id_j_m">
                                                    <input type="hidden" name="id_mapel" value="<?=$idMapel;?>" id="id_mapel">
                                                    <input type="hidden" name="id_agenda" value="<?=$idAgenda;?>">
                                                    <label for="jadwal-pengajar-angkatan">Angkatan</label>
                                                    <div class="form-group">
                                                        <select class="choices form-select" id="jadwal-pengajar-angkatan" name="jadwal-pengajar-angkatan">
                                                            <option value="-">--Pilih Angkatan--</option>
                                                            <?php
                                                                foreach($selectBatch as $a){
                                                                    echo"<option value='".$a['id_angkatan']."'>".$a['angkatan']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    
                                                    <label for="jadwal-pengajar-sesi">Sesi</label>
                                                    <div class="form-group">
                                                        <select class="choices form-select" id="jadwal-pengajar-sesi" name="jadwal-pengajar-sesi">
                                                            <option value="-">--Pilih Sesi--</option>
                                                            <?php
                                                                foreach($sesi as $a){
                                                                    echo"<option value='".$a['id_sesi']."'>".$a['sesi']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <label for="jadwal-pengajar-room">Room Zoom</label>
                                                    <div class="form-group">
                                                        <select class="choices form-select" id="jadwal-pengajar-room" name="jadwal-pengajar-room">
                                                            <option value="-">--Pilih Room--</option>
                                                            <?php
                                                                foreach($zoom as $a){
                                                                    echo"<option value='".$a['id']."'>".$a['zoom']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <label for="jadwal-pengajar-waktu-mulai">Waktu Mulai</label>
                                                            <div class="form-group">
                                                                <input type="time" class="form-control" id="jadwal-pengajar-waktu-mulai" name="jadwal-pengajar-waktu-mulai">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="jadwal-pengajar-waktu-selesai">Waktu Selesai</label>
                                                            <div class="form-group">
                                                                <input type="time" class="form-control" id="jadwal-pengajar-waktu-selesai" name="jadwal-pengajar-waktu-selesai">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <button class="form-control btn btn-primary mt-4" id="btn-filter-tgl" type="button">Filter</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="jadwal-pengajar-pembimbing"></div>
                                                    <div id="jadwal-pengajar-pendamping"></div>

                                                    <button type="submit" class="btn btn-primary ml-1 mt-3" class="">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Simpan</span>
                                                    </button>
                                                <?php echo form_close(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
