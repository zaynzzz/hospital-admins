<?php

$db = db_connect();
$sql = $db->query('SELECT * FROM tb_obat WHERE is_active=1');
$row = $sql->getResult();
$i = 1;

?>
<?php if (session()->get('scs')) : ?>
    <div class="alert alert-primary mx-auto" role="alert">
        <?= session()->get('scs'); ?>
    </div>
<?php endif; ?>
<div class="col-md-12">
    <div class="row quick-action-toolbar">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body ">
                    <h2>Data Obat</h2>
                    <button id='btnobat' class='fas fa-plus btn btn-primary col-3 my-3'>Tambah Obat</button>
                    <div class="table w-200 border rounded p-1 ">
                        <table class="table">
                            <thead class="card-header thead-inverse|thead-default">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Obat</th>
                                    <th>Keterangan Obat</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($row as $psn) : ?>
                                    <tr>
                                        <td scope="row"><?= $i++; ?></td>
                                        <td><?= $psn->nama_obat; ?></td>
                                        <td><?= $psn->ket_obat; ?></td>
                                        <td>
                                            <a class="text-success fas fa-eye" href='<?= base_url(); ?>/obat/detail/<?= $psn->id_obat; ?>'></a>
                                        </td>
                                        <td><a class="fas fa-edit" href='<?= base_url(); ?>/obat/edit/<?= $psn->id_obat; ?>'></a> </td>
                                        <td><a onclick="delId(this)" id='del' class="text-danger fas fa-trash" value='<?= $psn->id_obat; ?>'></a></td>
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
<div class="modal" id='obatform' tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form tambah Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url(); ?>/Obat/tambah" method="POST" class="contact-form">
                    <div class="col-sm-12">
                        <div class="col">
                            <div class="input-block">
                                <label for="">Nama Obat</label>
                                <input name='nama_obat' type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-block">
                                <label for="">Keterangan Obat</label>
                                <input name='ket_obat' type="text" class="form-control">
                            </div>
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
    $('#btnobat').click(function(e) {
        e.preventDefault();
        $('#obatform').toggle(1000)
    });
    $('.close').click(function(e) {
        e.preventDefault();
        $('#obatform').toggle(1000)
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
                    url: "<?= base_url(); ?>/Obat/del/" + id,
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