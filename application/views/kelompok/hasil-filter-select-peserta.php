<table class="table" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>Pilih</th>
            <th>NIP</th>
            <th>Peserta</th>
            <th>Unit Kerja</th>    
        </tr>
    </thead>
    
    <tbody>
        <?php
            $no = 1;
            if($peserta){
                foreach($peserta as $p){
                    echo"<tr>";
                        echo"<td>".$no."</td>";
                        echo"<td>";
                            echo"<div>";
                                echo"<input type='checkbox' id='kelompok-peserta-check' class='form-check-input kelompok-peserta-check' name='kelompok-peserta-check[]' value='".$p['nip_peserta']."'>";
                            echo"</div>";
                        echo"</td>";
                        echo"<td>".$p["nip_peserta"]."</td>";
                        echo"<td>".$p["nama"]."</td>";
                        echo"<td>".$p["unor"]."</td>";

                    echo"</tr>";
                    $no++;
                }
            }
            else{
                echo"<tr>";
                    echo"<td colspan='5'>Data tidak ditemukan</td>";       
                echo"</tr>";
            }
        ?>
    </tbody>
</table>