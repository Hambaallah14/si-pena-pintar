<!-- WARNING -->
<div class="flash-data" data-target="Pembagian Peserta" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<!-- END WARNING -->

        <div id="main-content">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Daftar Pembagian Peserta</h3>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row mb-4">
                                <div class="col-md-12">
                                        <label for="kelompok-peserta-instansi">Instansi</label>
                                        <div class="form-group">
                                            <select class="choices form-select" id="kelompok-peserta-instansi" name="kelompok-peserta-instansi">
                                                <option value="-">--Pilih Instansi--</option>
                                                <?php
                                                    foreach($instansi as $i){
                                                        echo"<option value='".$i['id_instansi']."'>".$i['instansi']."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <label for="kelompok-peserta-gol">Golongan/Pangkat</label>
                                        <div class="form-group">
                                            <select class="choices form-select" id="kelompok-peserta-gol" name="kelompok-peserta-gol">
                                                <option value="-">--Pilih Gol/Pangkat--</option>
                                                <?php
                                                    foreach($gol as $g){
                                                        echo"<option value='".$g['id_gol']."'>".$g['gol']."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                        <button type="button" class="btn btn-primary ml-1" class="kelompok-peserta-btnFilter" id="kelompok-peserta-btnFilter">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Cari Peserta</span>
                                        </button>
                                </div>
                            </div>
                            <div class="row">
                                <?php echo form_open("bagi_kelompok/add_peserta", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                                    <input id="id" type="hidden" name="id_kelompok" value="<?= $id_kelompok;?>">
                                    <div class="data-all_peserta-kelompok"></div>

                                    <button type='submit' class='btn btn-primary ml-1 kelompok-peserta-btnSubmit'>
                                        <i class='bx bx-check d-block d-sm-none'></i>
                                        <span class='d-none d-sm-block'>Simpan</span>
                                    </button>
                                <?php echo form_close(); ?>
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