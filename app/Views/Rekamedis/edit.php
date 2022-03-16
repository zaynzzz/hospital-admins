<?php
foreach ($row as $r) :

?>
    <form action="<?= base_url(); ?>/Dokter/editprocess/<?= $r->id_dokter; ?>" method="POST" class="contact-form">
        <div class="col-sm-12">
            <div class="col">
                <div class="input-block">
                    <label for="">Nama Dokter</label>
                    <input value='<?= $r->nama_dokter; ?>' name='nama' type="text" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="input-block">
                    <label for="">Spesialis</label>
                    <input value='<?= $r->spesialis; ?>' name='spesialis' type="text" class="form-control">
                </div>
            </div>
            <!-- <div class="col-12">
                <label for="">Jenis Kelamin</label>
                <select value='<?= $r->id_dokter; ?>' name='gender' class="col-12 form-input" aria-label="Default select example">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div> -->
            <div class="col-sm-12">
                <div class="input-block">
                    <label for="">Alamat</label>
                    <input value='<?= $r->alamat; ?>' name='alamat' type="text" class="form-control">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="input-block">
                    <label for="">No Telp</label>
                    <input value='<?= $r->no_telp; ?>' name='notelp' type="text" class="form-control">
                </div>
            </div>
            <div class="col-sm-12 my-3">
                <button class="btn btn-primary square-button">Send</button>
            </div>
        </div>

    <?php endforeach; ?>
    </div>
    </form>