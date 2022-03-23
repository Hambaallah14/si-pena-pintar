    <label for="jadwal-batch">Batch</label>
    <div class="form-group">
        <select class="choices form-select" id="jadwal-batch" name="jadwal-batch">
            <option value="-">--Pilih Batch--</option>
            <?php
                if($batch){
                    foreach($batch as $p){
                        echo"<option value='".$p["id"]."'>".$p["batch"]."</option>";
                    }
                }
            ?>
        </select>
    </div>
