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
                            <button type="button" class="btn btn-primary wi-btn-tambah" data-bs-toggle="modal" data-bs-target="#inlineForm">Tambah Data</button>
                        </div>
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
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
                                                    echo"<td>".$wi["jabatan"]."</td>";
                                                    if($wi["status_user"]=="aktif"){
                                                        echo"<td><span class='badge bg-success'>Aktif</span></td>";
                                                    }
                                                    else{
                                                        echo"<td><span class='badge bg-danger'>Tidak Aktif</span></td>";
                                                    }
                                                    
                                                    echo"<td>";
                                                        echo"<a class='wi-btn-views' href='".base_url()."widyaiswara/views' style='margin-right:10px;'>";
                                                            echo"<i class='iconly-boldShow' title='views'></i>";
                                                        echo"</a>";

                                                        echo"<a class='wi-btn-edit' href='".base_url()."widyaiswara/edit' style='margin-right:10px;' data-bs-toggle='modal' data-bs-target='#inlineForm' data-nip_wi='".$wi["nip_wi"]."' data-nama_wi='".$wi["nama"]."' data-jabatan_wi='".$wi["jabatan"]."' data-no_telp_wi='".$wi["no_telp"]."' data-email_wi='".$wi["email"]."' data-status_user_wi='".$wi["status_user"]."'>";
                                                            echo"<i class='bi bi-pencil-fill' title='edit'></i>";
                                                        echo"</a>";

                                                        echo"<a class='wi-btn-delete' href='".base_url()."widyaiswara/delete/".$wi["nip_wi"]."' style='margin-right:10px;'>";
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
                        <h4 class="modal-title" id="myModalLabel33">Tambah Data Widyaiswara</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <?php echo form_open("", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                        <div class="modal-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#data-pribadi" type="button" role="tab" aria-controls="home" aria-selected="true">Data Pribadi</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#data-akun" type="button" role="tab" aria-controls="profile" aria-selected="false">Data Akun</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="data-pribadi" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row mt-2">
                                        <div class="col-md-12">
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
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="data-akun" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="wi-status-user">
                                        <label for="wi-status-user">Status User</label>
                                        <fieldset class="form-group">
                                            <select class="form-select" id="wi-status-user" name="wi-status-user">
                                                <option value="-">--Pilih Status User--</option>
                                                <option value="aktif">Aktif</option>
                                                <option value="tidak aktif">Tidak aktif</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    
                                    <div class="wi-password">
                                        <label for="wi-password">Password</label>
                                        <div class="form-group">
                                            <input id="wi-password" type="password" placeholder="Password" class="form-control" name="wi-password">
                                        </div>
                                        <label for="wi-confirm-password">Konfirmasi Password</label>
                                        <div class="form-group">
                                            <input id="wi-confirm-password" type="password" placeholder="Konfirmasi Password" class="form-control" name="wi-confirm-password">
                                        </div>
                                    </div>
                                </div>
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
