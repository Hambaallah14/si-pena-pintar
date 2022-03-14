<!-- WARNING -->
<div class="flash-data" data-target="Pendamping" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<!-- END WARNING -->

        <div id="main-content">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Daftar Pendamping</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Input Data</li>
                                    <li class="breadcrumb-item active" aria-current="page">Pendamping</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary pendamping-btn-tambah" data-bs-toggle="modal" data-bs-target="#inlineForm">Tambah Data</button>
                        </div>
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach($pendamping as $p){
                                                echo"<tr>";
                                                    echo"<td>".$no."</td>";
                                                    echo"<td>".$p["nip"]."</td>";
                                                    echo"<td>".$p["nama"]."</td>";
                                                    echo"<td>".$p["jabatan"]."</td>";
                                                    if($p["status_user"]=="aktif"){
                                                        echo"<td><span class='badge bg-success'>Aktif</span></td>";
                                                    }
                                                    else{
                                                        echo"<td><span class='badge bg-danger'>Tidak Aktif</span></td>";
                                                    }
                                                    
                                                    echo"<td>";
                                                        echo"<a class='pendamping-btn-views' href='".base_url()."pendamping/views' style='margin-right:10px;'>";
                                                            echo"<i class='iconly-boldShow' title='views'></i>";
                                                        echo"</a>";

                                                        echo"<a class='pendamping-btn-edit' href='".base_url()."pendamping/edit' style='margin-right:10px;' data-bs-toggle='modal' data-bs-target='#inlineForm' data-nip_pendamping='".$p["nip"]."' data-nama_pendamping='".$p["nama"]."' data-jabatan_pendamping='".$p["jabatan"]."' data-status_user_pendamping='".$p["status_user"]."'>";
                                                            echo"<i class='bi bi-pencil-fill' title='edit'></i>";
                                                        echo"</a>";

                                                        echo"<a class='btn-delete' href='".base_url()."pendamping/delete/".$p["nip"]."' style='margin-right:10px;'>";
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
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Tambah Data Pendamping</h4>
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
                                                <label for="pendamping-nip">ID Pendamping</label>
                                                <div class="form-group">
                                                    <input id="pendamping-nip" type="text" placeholder="ID pendamping" class="form-control" name="pendamping-nip" required>
                                                </div>

                                                <label for="pendamping-nama">Nama Lengkap</label>
                                                <div class="form-group">
                                                    <input id="pendamping-nama" type="text" placeholder="Nama Lengkap" class="form-control" name="pendamping-nama" required>
                                                </div>
                                                
                                                <label for="pendamping-jabatan">Jabatan</label>
                                                <div class="form-group">
                                                    <input id="pendamping-jabatan" type="text" placeholder="Jabatan" class="form-control" name="pendamping-jabatan" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Tutup</span>
                                                </button>
                                                
                                                <button type="submit" class="btn btn-primary ml-1" class="pendamping-btn-submit">
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
                                                <div class="pendamping-status-user">
                                                    <label for="pendamping-status-user">Status User</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="pendamping-status-user" name="pendamping-status-user">
                                                            <option value="-">--Pilih Status User--</option>
                                                            <option value="aktif">Aktif</option>
                                                            <option value="tidak aktif">Tidak aktif</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                
                                                <div class="pendamping-password">
                                                    <label for="pendamping-password">Password</label>
                                                    <div class="form-group">
                                                        <input id="pendamping-password" type="password" placeholder="Password" class="form-control" name="pendamping-password">
                                                    </div>
                                                    <label for="pendamping-confirm-password">Konfirmasi Password</label>
                                                    <div class="form-group">
                                                        <input id="pendamping-confirm-password" type="password" placeholder="Konfirmasi Password" class="form-control" name="pendamping-confirm-password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Tutup</span>
                                                </button>
                                                
                                                <button type="submit" class="btn btn-primary ml-1" class="pendamping-btn-submit">
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
