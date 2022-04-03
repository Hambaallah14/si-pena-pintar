    <label for="jadwal-materi">Mata Pelajaran</label>
    <div class="form-group">
        <select class="choices form-select" id="jadwal-materi" name="jadwal-materi">
            <option value="-">--Pilih Mata Pelajaran--</option>
            <?php
                if($materi){
                    foreach($materi as $p){
                        echo"<option value='".$p["id_mapel"]."'>".$p["mapel"]."</option>";
                    }
                }
            ?>
        </select>
    </div>
