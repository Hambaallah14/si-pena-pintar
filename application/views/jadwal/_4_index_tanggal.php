<!-- WARNING -->
<div class="flash-data" data-target="Data Diri Pegawai" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<!-- END WARNING -->

        <div id="main-content">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Jadwal Pelatihan</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class="breadcrumb-item active" aria-current="page">Jadwal Pelatihan</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <?php if($akses_login == "admin"){ ?>
                        <div class="card">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary penceramah-btn-tambah" data-bs-toggle="modal" data-bs-target="#inlineForm">Tambah Data</button>
                            </div>

                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <table class="table" id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                foreach($tambah_tanggal_pelatihan as $p){
                                                    echo"<tr>";
                                                        echo"<td>".$no."</td>";
                                                        echo"<td>".date('d F Y', strtotime($p['tanggal']))."</td>";
                                                        echo"<td>";
                                                            echo"<a class='penceramah-btn-edit' href='".base_url()."jadwal/edit' style='margin-right:10px;'>";
                                                                echo"<i class='bi bi-pencil-fill' title='edit'></i>";
                                                            echo"</a>";

                                                            echo"<a class='btn-delete' href='".base_url()."jadwal/hapus_jadwal_tanggal/".$p["id_tanggal"]."' style='margin-right:10px;'>";
                                                                echo"<i class='bi bi-trash-fill' title='delete'></i>";
                                                            echo"</a>";

                                                            echo"<a class='' href='".base_url()."jadwal/jadwal_materi/".$p["id_tanggal"]."' style='margin-right:10px;'>";
                                                                echo"<i class='bi bi-journal-plus' title='Jadwal Materi'></i>";
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
                        
                    <?php } ?>
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
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Tambah Data Mata Pelajaran</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <?php echo form_open("mata_pelajaran/add", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                           
                        <div class="modal-body">
                            
                            
                            <label for="mapel-metode_belajar">Metode Belajar</label>
                            <fieldset class="form-group">
                                <select class="form-select" id="mapel-metode_belajar" name="mapel-metode_belajar" required>
                                    <option value="-">--Pilih Metode Belajar--</option>
                                    <?php
                                        foreach($metode_belajar as $met){
                                            echo"<option value='".$met["id"]."'>".$met["pembelajaran"]."</option>";
                                        }
                                    ?>
                                </select>
                            </fieldset>

                            <label for="mapel-agenda">Agenda</label>
                            <fieldset class="form-group">
                                <select class="form-select" id="mapel-agenda" name="mapel-agenda" required>
                                    <option value="-">--Pilih Agenda--</option>
                                    <?php
                                        foreach($agenda as $met){
                                            echo"<option value='".$met["id_agenda"]."'>".$met["agenda"]."</option>";
                                        }
                                    ?>
                                </select>
                            </fieldset>
                           
                            

                            
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Tutup</span>
                            </button>
                                                
                            <button type="submit" class="btn btn-primary ml-1" class="">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Simpan</span>
                            </button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!-- END Modal Tambah Data -->
