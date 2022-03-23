<!-- WARNING -->
<div class="flash-data" data-target="Jadwal Pelatihan" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
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
                                                <?php echo form_open("jadwal/addJadwalPelatihan", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                                                    <label for="jadwal-metode-belajar">Metode Belajar</label>
                                                    <div class="form-group">
                                                        <select class="choices form-select" id="jadwal-metode-belajar" name="jadwal-metode-belajar">
                                                            <option value="-">--Pilih Metode Belajar--</option>
                                                            <?php
                                                                foreach($metode_belajar as $i){
                                                                    echo"<option value='".$i['id_metode']."'>".$i['metode']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <label for="jadwal-pelatihan">Pelatihan</label>
                                                    <div class="form-group">
                                                        <select class="choices form-select" id="jadwal-pelatihan" name="jadwal-pelatihan">
                                                            <option value="-">--Pilih Pelatihan--</option>
                                                            <?php
                                                                foreach($pelatihan as $i){
                                                                    echo"<option value='".$i['id_pelatihan']."'>".$i['pelatihan']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <label for="jadwal-tahun">Tahun</label>
                                                    <div class="form-group">
                                                        <select class="choices form-select" id="jadwal-tahun" name="jadwal-tahun">
                                                            <option value="-">--Pilih Tahun--</option>
                                                            <?php
                                                                for($i=date('Y');$i>=date('Y')-2;$i--){
                                                                    echo"<option value='".$i."'>".$i."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    
                                                    <div id="jadwal-batch"></div>

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
