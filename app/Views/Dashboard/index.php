<?php

$db = db_connect();
$rmsql = $db->query('SELECT id_rm,nama_pasien,keluhan,nama_dokter,diagnosa,id_poli,tgl_periksa FROM `tb_rekammedis` 
JOIN `tb_pasien` ON `tb_pasien`.id_pasien=`tb_rekammedis`.id_pasien JOIN `tb_dokter` ON `tb_dokter`.id_dokter=`tb_rekammedis`.id_dokter');
$rm = $rmsql->getResult();
$sql = $db->query('SELECT * FROM tb_pasien');
$pasien = $sql->getResult();
$i = 1;

?>
<div class="col-md-12">
    <div class="row quick-action-toolbar">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0">Quick Actions</h5>
                </div>
                <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                    <div class="col col p-3 text-center btn-wrapper">
                        <button id='btnpasien' type="button" class="btn px-0"> <i class="icon-user mr-2"></i> Tambah Pasien</button>
                    </div>
                    <div class="col col p-3 text-center btn-wrapper">
                        <a type="button" class="btn px-0" href='<?= base_url(); ?>/Dokter/index'><i class="icon-docs mr-2"></i> Tambah Dokter</a>
                    </div>
                    <div class="col col p-3 text-center btn-wrapper">
                        <a type="button" class="btn px-0" href='<?= base_url(); ?>/Obat/index'><i class="icon-folder mr-2"></i> Tambah Obat</a>
                    </div>
                    <div class="col col p-3 text-center btn-wrapper">
                        <a type="button" class="btn px-0" href='<?= base_url(); ?>/Poliklinik/index'><i class="icon-book-open mr-2"></i>Tambah Poliklinik</a>
                    </div>
                    <div class="col col p-3 text-center btn-wrapper">
                        <a type="button" class="btn px-0" href='<?= base_url(); ?>/RMedis/index'><i class="icon-book-open mr-2"></i>Rekam Medis</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row quick-action-toolbar">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body ">
                        <h2>Data Rekam Medis</h2>
                        <!-- <button id='btndokter' class=' btn btn-primary col-2 my-3'>Tambah Dokter</button> -->
                        <div class="table w-200 border rounded p-1 ">
                            <table class="table ">
                                <thead class='card-header table'>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pasien</th>
                                        <th>Keluhan</th>
                                        <th>Nama Dokter</th>
                                        <th>Diagnosa</th>
                                        <th>Tgl Periksa</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rm as $psn) : ?>
                                        <tr>
                                            <td scope="row"><?= $i++; ?></td>
                                            <td><?= $psn->nama_pasien; ?></td>
                                            <td><?= $psn->keluhan; ?></td>
                                            <td><?= $psn->nama_dokter; ?></td>
                                            <td><?= $psn->diagnosa; ?></td>
                                            <td><?= $psn->tgl_periksa; ?></td>
                                            <td>
                                                <a class="text-success fas fa-eye" href='<?= base_url(); ?>/Dokter/detail/<?= $psn->id_rm; ?>'></a>
                                            </td>
                                            <td><a class="fas fa-edit" href='<?= base_url(); ?>/Dokter/edit/<?= $psn->id_rm; ?>'></a> </td>
                                            <td><a onclick="delId(this)" id='del' class="text-danger fas fa-trash" value='<?= $psn->id_rm; ?>'></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <button class="close popup-dismiss ml-2">
                            </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal" id='pasienform' tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form tambah pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url(); ?>/Pasien/tambah" method="POST" class="contact-form">
                    <div class="col-sm-12">
                        <div class="col">
                            <div class="input-block">
                                <label for="">NIK Pasien</label>
                                <input name='nik' type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-block">
                                <label for="">Nama Pasien</label>
                                <input name='nama' type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="">Jenis Kelamin</label>
                            <select name='gender' class="col-12 form-input" aria-label="Default select example">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-block">
                                <label for="">Alamat</label>
                                <input name='alamat' type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-block">
                                <label for="">No Telp</label>
                                <input name='notelp' type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 my-3">
                            <button class="btn btn-primary square-button">Send</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="close btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#btnpasien').click(function(e) {
        e.preventDefault();
        $('#pasienform').toggle(1000)
    });
    $('.close').click(function(e) {
        e.preventDefault();
        $('#pasienform').toggle(1000)
    });
</script>