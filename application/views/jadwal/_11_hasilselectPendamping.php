    <label for="jadwal-pengajar-pendamping">Pendamping</label>
    <div class="form-group">
        <select class="choices form-select" id="jadwal-pengajar-pendamping" name="jadwal-pengajar-pendamping">
            <option value="-">--Pilih Pendamping--</option>
            <option value="0">TIDAK ADA</option>
            <?php
                if($pendamping){
                    foreach($pendamping as $p){
                        echo"<option value='".$p["nip"]."'>".$p["nama"]."</option>";
                    }
                }
            ?>
        </select>
    </div>
