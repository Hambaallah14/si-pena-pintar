<!-- WARNING -->
<div class="flash-data" data-target="Jadwal Pelatihan" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
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
                                <a href="<?=base_url();?>jadwal/tambah_jadwal" class="btn btn-primary">Tambah Data</a>
                            </div>

                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <table class="table" id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tahun</th>
                                                <th>Pelatihan</th>
                                                <th>Metode Belajar</th>
                                                <th>Batch</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                foreach($header_jadwal_pelatihan as $p){
                                                    echo"<tr>";
                                                        echo"<td>".$no."</td>";
                                                        echo"<td>".$p["tahun"]."</td>";
                                                        echo"<td>".$p["pelatihan"]."</td>";
                                                        echo"<td>".$p["metode"]."</td>";
                                                        echo"<td>".$p["batch"]."</td>";
                                                        echo"<td>";
                                                            echo"<a class='penceramah-btn-edit' href='".base_url()."jadwal/edit' style='margin-right:10px;'>";
                                                                echo"<i class='bi bi-pencil-fill' title='edit'></i>";
                                                            echo"</a>";

                                                            echo"<a class='btn-delete' href='".base_url()."jadwal/hapus_jadwal/".$p["id_jadwal"]."' style='margin-right:10px;'>";
                                                                echo"<i class='bi bi-trash-fill' title='delete'></i>";
                                                            echo"</a>";

                                                            echo"<a class='' href='".base_url()."jadwal/jadwal_tanggal/".$p["id_jadwal"]."' style='margin-right:10px;'>";
                                                                echo"<i class='bi bi-calendar-plus-fill' title='Jadwal Tanggal'></i>";
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

                    <?php if($akses_login == "peserta"){ ?>
                        <?php if($jadwal_pengumuman[0]["tgl_jadwal"] <= date('Y-m-d')){ ?> <!--Jika Jadwal Pengumuman lebih kecil dari tanggal berjalan-->
                            <?php
                                $batch          = $pembagian_kelompok[0]["batch"];
                                $angkatan       = $pembagian_kelompok[0]["angkatan"];
                                $kelompok       = $pembagian_kelompok[0]["kelompok"];
                                $metode_belajar = $header_jadwal_pelatihan[0]["metode"];
                            ?>
                        <?php }else{ ?>
                            <?php
                                $batch          = "BELUM DIJADWALKAN (PENDING)";
                                $angkatan       = "BELUM DIJADWALKAN (PENDING)";
                                $kelompok       = "BELUM DIJADWALKAN (PENDING)";
                                $metode_belajar = "BELUM DIJADWALKAN (PENDING)";
                            ?>
                        <?php } ?>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <table class="table" id="table1">
                                                <thead>
                                                    <tr>
                                                        <th>Hari Ke-</th>
                                                        <th>Tanggal</th>
                                                        <th>Sesi</th>
                                                        <th>Waktu</th>
                                                        <th>Agenda</th>
                                                        <th>Materi</th>
                                                        <th>JP</th>
                                                        <th>Room</th>
                                                        <th>Pengajar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $no = 1;
                                                        
                                                    ?>
                                                </tbody>
                                            </table>
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
