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
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Pembagian</li>
                                    <li class="breadcrumb-item">Batch</li>
                                    <li class="breadcrumb-item">Angkatan</li>
                                    <li class="breadcrumb-item"><?= $kelompok[0]['kelompok']; ?></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kelompok</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url("bagi_kelompok/tambah_peserta_kelompok/".$id_kelompok);?>" class="btn btn-primary">Tambah Data</a>                            
                        </div>
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Peserta</th>
                                            <th>Instansi</th>
                                            <th>Unor</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach($bagi_peserta as $p){
                                                echo"<tr>";
                                                    echo"<td>".$no."</td>";
                                                    echo"<td>".$p["nip_peserta"]."</td>";
                                                    echo"<td>".$p["nama"]."</td>";
                                                    echo"<td>".$p["instansi"]."</td>";
                                                    echo"<td>".$p["unor"]."</td>";
                                                    
                                                    echo"<td>";
                                                        echo"<a class='btn-delete' href='".base_url()."bagi_kelompok/delete_peserta/".$p["id_kelompok"]."/".$p["nip_peserta"]."' style='margin-right:10px;'>";
                                                            echo"<i class='bi bi-trash-fill' title='delete'></i>";
                                                        echo"</a>";
                                                    echo"</td>";
                                                echo"</tr>";
                                                $no++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
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



        <!-- Modal Tambah Data -->
        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel33" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel33">Login Form </h4>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form action="#">
                                                <div class="modal-body">
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

                                                    <label for="peserta">Peserta</label>
                                                    <div class="form-group">
                                                        <select class="choices form-select" id="peserta" name="peserta">
                                                            <option value="-">--Pilih Peserta--</option>
                                                            <?php
                                                                foreach($selectPeserta as $pel){
                                                                    echo"<option value='".$pel['nip_peserta']."'>".$pel['nama']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <button type="button" class="btn btn-primary ml-1"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">login</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
        <!-- END Modal Tambah Data -->
