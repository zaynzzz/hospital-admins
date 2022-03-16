<?php
foreach ($row as $r) :

?>
    <form action="<?= base_url(); ?>/Pasien/editprocess/<?= $r->id_pasien; ?>" method="POST" class="contact-form">
        <div class="col-sm-12">
            <div class="col">
                <div class="input-block">
                    <label for="">Nama Pasien</label>
                    <input name='nama_pasien' value="<?= $r->nama_pasien; ?>" type="text" class="form-control">
                </div>
            </div>
            <div class="col-12">
                <label for="">Jenis Kelamin</label>
                <select name='jenis_kelamin' value="<?= $r->jenis_kelamin; ?>" type="text" class="col-12 form-input" aria-label="Default select example">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="col-sm-12">
                <div class="input-block">
                    <label for="">Alamat</label>
                    <input name='alamat' value="<?= $r->alamat; ?>" type="text" class="form-control">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="input-block">
                    <label for="">No Telp</label>
                    <input name='notelp' value="<?= $r->no_telp; ?>" type="text" class="form-control">
                </div>
            </div>
            <div class="col-sm-12 my-3">
                <button class="btn btn-primary square-button">Send</button>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
    </form>