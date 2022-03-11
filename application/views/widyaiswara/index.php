<!-- WARNING -->
<div class="flash-data" data-target="Widyaiswara" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<!-- END WARNING -->

        <div id="main-content">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Daftar Widyaiswara</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Input Data</li>
                                    <li class="breadcrumb-item active" aria-current="page">Widyaiswara</li>
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
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>No. Telp</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach($widyaiswara as $wi){
                                                echo"<tr>";
                                                    echo"<td>".$no."</td>";
                                                    echo"<td>".$wi["nip_wi"]."</td>";
                                                    echo"<td>".$wi["nama"]."</td>";
                                                    echo"<td>".$wi["no_telp"]."</td>";
                                                    if($wi["status_user"]=="aktif"){
                                                        echo"<td><span class='badge bg-success'>Aktif</span></td>";
                                                    }
                                                    else{
                                                        echo"<td><span class='badge bg-danger'>Tidak Aktif</span></td>";
                                                    }
                                                    
                                                    echo"<td>";
                                                        echo"<a href='".base_url()."widyaiswara/views' style='margin-right:10px;'>";
                                                            echo"<i class='iconly-boldShow' title='views'></i>";
                                                        echo"</a>";
                                                        echo"<a href='".base_url()."widyaiswara/edit' style='margin-right:10px;'>";
                                                            echo"<i class='bi bi-pencil-fill' title='edit'></i>";
                                                        echo"</a>";
                                                        echo"<a href='".base_url()."widyaiswara/delete' style='margin-right:10px;'>";
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
        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Tambah Data Widyaiswara</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <?php echo form_open("widyaiswara/add", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                        <div class="modal-body">
                            <label for="wi-nip">NIP</label>
                            <div class="form-group">
                                <input id="wi-nip" type="text" placeholder="NIP" class="form-control" name="wi-nip" required>
                            </div>
                            
                            <label for="wi-nama">Nama Lengkap</label>
                            <div class="form-group">
                                <input id="wi-nama" type="text" placeholder="Nama Lengkap" class="form-control" name="wi-nama" required>
                            </div>
                            
                            <label for="wi-jabatan">Jabatan</label>
                            <div class="form-group">
                                <input id="wi-jabatan" type="text" placeholder="Jabatan" class="form-control" name="wi-jabatan" required>
                            </div>

                            <label for="wi-no_telp">No. Telp</label>
                            <div class="form-group">
                                <input id="wi-no_telp" type="text" placeholder="No. Telp" class="form-control" name="wi-no_telp" required>
                            </div>

                            <label for="wi-email">Email</label>
                            <div class="form-group">
                                <input id="wi-email" type="text" placeholder="Email" class="form-control" name="wi-email" required>
                            </div>

                            <label for="wi-password">Password</label>
                            <div class="form-group">
                                <input id="wi-password" type="password" placeholder="Password" class="form-control" name="wi-password" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Tutup</span>
                            </button>
                            
                            <button type="submit" class="btn btn-primary ml-1" class="wi-btn-submit">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Simpan</span>
                            </button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!-- END Modal Tambah Data -->
