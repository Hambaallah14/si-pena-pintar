<!-- WARNING -->
<div class="flash-data" data-target="Data Diri Pegawai" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<!-- END WARNING -->

        <div id="main-content">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Dashboard</h3>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <?php if($akses_login == "admin"){ ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon blue">
                                                            <i class="iconly-boldProfile"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Widyaiswara</h6>
                                                        <h6 class="font-extrabold mb-0">183.000 Orang</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon green">
                                                            <i class="iconly-boldProfile"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Pendamping</h6>
                                                        <h6 class="font-extrabold mb-0">183.000 Orang</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon red">
                                                            <i class="iconly-boldProfile"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Peserta</h6>
                                                        <h6 class="font-extrabold mb-0">183.000 ORANG</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon purple">
                                                            <i class="iconly-boldProfile"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Followers</h6>
                                                        <h6 class="font-extrabold mb-0">183.000</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    <?php } ?>

                    <?php if($akses_login == "peserta"){ ?>
                        <?php if($jadwal_pengumuman[0]["tgl_jadwal"] <= date('Y-m-d')){ ?> <!--Jika Jadwal Pengumuman lebih kecil dari tanggal berjalan-->
                            <?php
                                $batch       = $pembagian_kelompok[0]["batch"];
                                $angkatan    = $pembagian_kelompok[0]["angkatan"];
                                $kelompok    = $pembagian_kelompok[0]["kelompok"];
                            ?>
                        <?php }else{ ?>
                            <?php
                                $batch       = "BELUM DIJADWALKAN (PENDING)";
                                $angkatan    = "BELUM DIJADWALKAN (PENDING)";
                                $kelompok    = "BELUM DIJADWALKAN (PENDING)";
                            ?>
                        <?php } ?>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                                                    aria-controls="home" aria-selected="true">DATA PRIBADI</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                                    aria-controls="profile" aria-selected="false">DATA PEGAWAI</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab"
                                                    aria-controls="contact" aria-selected="false">DATA PELATIHAN</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="row mt-4">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless mb-0">
                                                                <tr>
                                                                    <td>NIP</td>
                                                                    <td>:</td>
                                                                    <td><?=$user[0]["nip_peserta"];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>NAMA LENGKAP</td>
                                                                    <td>:</td>
                                                                    <td><?=$user[0]["nama"];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:30%;">TEMPAT/TANGGAL LAHIR</td>
                                                                    <td >:</td>
                                                                    <td><?=$user[0]["tempat_lahir"]." / ".date('d F Y', strtotime($user[0]['tgl_lahir']));?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>JENIS KELAMIN</td>
                                                                    <td>:</td>
                                                                    <td><?=$user[0]["jenis_kelamin"];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>AGAMA</td>
                                                                    <td>:</td>
                                                                    <td><?=$user[0]["agama"];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ALAMAT</td>
                                                                    <td>:</td>
                                                                    <td><?=$user[0]["alamat"];?></td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td>PANGKAT / GOLONGAN</td>
                                                                    <td>:</td>
                                                                    <td><?=$user[0]["gol"];?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                <div class="row mt-4">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless mb-0">
                                                                <tr>
                                                                    <td style="width:30%;">PELATIHAN YANG DIIKUTI</td>
                                                                    <td>:</td>
                                                                    <td><?=$user[0]["pelatihan"];?></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>JABATAN TERAKHIR</td>
                                                                        <td>:</td>
                                                                    <td><?=$user[0]["jab_terakhir"];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>INSTANSI</td>
                                                                        <td>:</td>
                                                                    <td><?=$user[0]["instansi"];?></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>UNIT KERJA</td>
                                                                        <td>:</td>
                                                                    <td><?=$user[0]["unor"];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ALAMAT UNIT KERJA</td>
                                                                        <td>:</td>
                                                                    <td><?=$user[0]["alamat_unor"];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>POLA PENYELENGGARAAN</td>
                                                                        <td>:</td>
                                                                    <td><?=$user[0]["pola"];?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                                <div class="row mt-4">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless mb-0">
                                                                <tr>
                                                                    <td style="width:30%;">BATCH</td>
                                                                    <td>:</td>
                                                                    <td><?=$batch;?></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>ANGKATAN</td>
                                                                        <td>:</td>
                                                                    <td><?=$angkatan;?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>KELOMPOK</td>
                                                                        <td>:</td>
                                                                    <td><?=$kelompok;?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
