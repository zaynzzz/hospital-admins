<?php
foreach ($row as $r) :

?>
    <form action="<?= base_url(); ?>/Obat/editprocess/<?= $r->id_obat; ?>" method="POST" class="contact-form">
        <div class="col-sm-12">
            <div class="col">
                <div class="input-block">
                    <label for="">Nama Obat</label>
                    <input name='nama_obat' type="text" value="<?= $r->nama_obat; ?>" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="input-block">
                    <label for="">Keterangan Obat</label>
                    <input name='ket_obat' type="text" value='<?= $r->ket_obat; ?>' class="form-control">
                </div>
            </div>
        <?php endforeach; ?>
        <div class="col-sm-12 my-3">
            <button class="btn btn-primary square-button">Send</button>
        </div>
        </div>
    </form>