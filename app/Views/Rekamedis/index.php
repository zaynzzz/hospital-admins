<?php

$db = db_connect();

$sql = $db->query('SELECT id_rm,nama_pasien,keluhan,nama_dokter,diagnosa,id_poli,tgl_periksa FROM `tb_rekammedis` 
JOIN `tb_pasien` ON `tb_pasien`.id_pasien=`tb_rekammedis`.id_pasien JOIN `tb_dokter` ON `tb_dokter`.id_dokter=`tb_rekammedis`.id_dokter');
$row = $sql->getResult();
$psn = $db->query('SELECT * FROM tb_pasien,tb_dokter');
$pasien = $psn->getResult();
$i = 1;

?>
<?php if (session()->get('scs')) : ?>
    <div class="alert alert-primary" role="alert">
        <?= session()->get('scs'); ?>
    </div>
<?php endif; ?>

<div class="col-md-12">
    <div class="row quick-action-toolbar">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body ">
                    <h2>Data Rekam Medis</h2>
                    <button id='btndokter' class=' btn btn-primary col-3 my-3'>Rekam Medis +</button>
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
                                <?php foreach ($row as $psn) : ?>
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


<!-- 
    <script>
        $(document).ready(function() {
            $('#datapasien').DataTable();
        });
    </script> -->
<div class="modal" id='dokterform' tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form tambah Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url(); ?>/Dokter/tambah" method="POST" class="contact-form">
                    <div class="col-sm-12">
                        <label for="">Nama Pasien</label>
                        <select name='nama_pasien' class="col-12 form-input" aria-label="Default select example">
                            <?php foreach ($pasien as $m) : ?>
                                <option value="<?= $m->id_pasien; ?>"><?= $m->nama_pasien; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col">
                        <div class="input-block">
                            <label for="">Keluhan</label>
                            <input name='keluhan' type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label for="">Nama Dokter</label>
                        <select name='nama_pasien' class="col-12 form-input" aria-label="Default select example">
                            <?php foreach ($pasien as $m) : ?>
                                <option value="<?= $m->id_dokter; ?>"><?= $m->nama_pasien; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col">
                        <div class="input-block">
                            <label for="">Diagnosa</label>
                            <input name='diagnosa' type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label for="">Poliklinik</label>
                        <select name='nama_pasien' class="col-12 form-input" aria-label="Default select example">
                            <?php foreach ($pasien as $m) : ?>
                                <option value="<?= $m->id_poli; ?>"><?= $m->nama_poli; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-sm-12 my-3">
                        <button class="btn btn-primary square-button">Send</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<script>
    $('#btndokter').click(function(e) {
        e.preventDefault();
        $('#dokterform').toggle(1000)
    });
    $('.close').click(function(e) {
        e.preventDefault();
        $('#dokterform').toggle(1000)
    });
</script>


<script>
    function listpasien() {
        var table = $('#datapasien').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('Pasien/datapasien') ?>",
                "type": "POST",
            },
            "columnDefs": [{
                    "tergets": 0,
                    "orderable": false,
                },
                {
                    "tergets": 0,
                    "orderable": false,

                },
            ],
        })
    }
</script>
<script>
    function delId(id) {
        var id = $(id).attr("value");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: "<?= base_url(); ?>/Dokter/del/" + id,
                    // data: "data",
                    dataType: "dataType",
                    success: function(response) {

                    }
                });
                window.location.reload(300);
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                );
            }
        })
    }
</script>