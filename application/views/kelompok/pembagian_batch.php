<!-- WARNING -->
<div class="flash-data" data-target="Pembagian Batch" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<!-- END WARNING -->

        <div id="main-content">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Daftar Pembagian Kelompok</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Pembagian</li>
                                    <li class="breadcrumb-item active" aria-current="page">Batch</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">Tambah Data</button>
                        </div>
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Batch</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach($bagi_batch as $p){
                                                echo"<tr>";
                                                    echo"<td>".$no."</td>";
                                                    echo"<td>".$p["tahun"]."</td>";
                                                    echo"<td>".$p["batch"]."</td>";
                                                    
                                                    echo"<td>";
                                                        echo"<a class='pendamping-btn-edit' href='".base_url()."mata_pelajaran/edit' style='margin-right:10px;' data-bs-toggle='modal' data-bs-target='#inlineForm'>";
                                                            echo"<i class='bi bi-pencil-fill' title='edit'></i>";
                                                        echo"</a>";

                                                        echo"<a class='btn-delete' href='".base_url()."bagi_kelompok/delete/".$p["id"]."' style='margin-right:10px;'>";
                                                            echo"<i class='bi bi-trash-fill' title='delete'></i>";
                                                        echo"</a>";

                                                        echo"<a class='' href='".base_url()."bagi_kelompok/angkatan/".$p["id"]."' style='margin-right:10px;'>";
                                                            echo"<i class='bi bi-plus-circle' title='Tambah Angkatan'></i>";
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
        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Tambah Data Batch</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <?php echo form_open("bagi_kelompok/add", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                           
                        <div class="modal-body">
                            <label for="batch-tahun">Tahun</label>
                            <fieldset class="form-group">
                            <select class="form-select" id="batch-tahun" name="batch-tahun">
                                <option value="-">--Pilih Tahun--</option>
                                <?php
                                    for($i=date('Y');$i>=date('Y')-2;$i--){
                                        echo"<option value='".$i."'>".$i."</option>";
                                    }
                                ?>
                            </select>
                            </fieldset>

                            <label for="id-pelatihan">Pelatihan</label>
                            <fieldset class="form-group">
                            <select class="form-select" id="id-pelatihan" name="id-pelatihan">
                                <option value="-">--Pilih Pelatihan--</option>
                                <?php
                                    foreach($pelatihan as $p){
                                        echo"<option value='".$p['id_pelatihan']."'>".$p['pelatihan']."</option>";
                                    }
                                ?>
                            </select>
                            </fieldset>

                            <label for="batch">Nama Batch</label>
                            <div class="form-group">
                                <input id="batch" type="text" placeholder="Nama Batch" class="form-control" name="batch" required>
                            </div>
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
