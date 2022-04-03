    <label for="jadwal-pengajar-pembimbing">Pembimbing</label>
    <div class="form-group">
        <select class="choices form-select" id="jadwal-pengajar-pembimbing" name="jadwal-pengajar-pembimbing">
            <option value="-">--Pilih Pembimbing--</option>
            <option value="0">TIDAK ADA</option>
            <?php
                if($pembimbing){
                    foreach($pembimbing as $p){
                        echo"<option value='".$p["nip_wi"]."'>".$p["nama_wi"]."</option>";
                    }
                }
            ?>
        </select>
    </div>
