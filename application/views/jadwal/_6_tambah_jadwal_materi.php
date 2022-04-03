<!-- WARNING -->
<div class="flash-data" data-target="Jadwal Materi" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
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
                                                <?php echo form_open("jadwal/addJadwalMateri", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                                                    
                                                    <input type="hidden" name="id_jadwal" value="<?=$idJadwal;?>">
                                                    <input type="hidden" name="id_batch" value="<?=$idBatch;?>">
                                                    <input type="hidden" name="id_tanggal" value="<?=$idTanggal;?>">
                                                    <label for="jadwal-agenda-materi">Agenda</label>
                                                    <div class="form-group">
                                                        <select class="choices form-select" id="jadwal-agenda-materi" name="jadwal-agenda-materi">
                                                            <option value="-">--Pilih Agenda--</option>
                                                            <?php
                                                                foreach($agenda as $a){
                                                                    echo"<option value='".$a['id_agenda']."'>".$a['agenda']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    
                                                    <div id="jadwal-materi"></div>

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
