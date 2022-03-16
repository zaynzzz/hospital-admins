    <?php if (session()->get('scs')) : ?>
        <div class="alert alert-primary" role="alert">
            <?= session()->get('scs'); ?>
        </div>
    <?php endif; ?>
    <?php

    $db = db_connect();
    $sql = $db->query('SELECT * FROM tb_pasien WHERE is_active=1');
    $row = $sql->getResult();
    $i = 1;

    ?>
    <div class="col-md-12">
        <div class="row quick-action-toolbar">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body ">
                        <h2>Data Pasien</h2>
                        <button id='btnpasien' class='fas fa-plus btn btn-primary col-4 my-3'>Tambah Pasien</button>
                        <div class="table w-200 border rounded p-1 ">
                            <table class="table ">
                                <thead class='card-header table'>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK Pasien</th>
                                        <th>Nama Pasien</th>
                                        <th>No Telp</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($row as $psn) : ?>
                                        <tr>
                                            <td scope="row"><?= $i++; ?></td>
                                            <td><?= $psn->nik_pasien; ?></td>
                                            <td><?= $psn->nama_pasien; ?></td>
                                            <td><?= $psn->no_telp; ?></td>
                                            <td><?= $psn->jenis_kelamin; ?></td>
                                            <td><?= $psn->alamat; ?></td>
                                            <td>
                                                <a class="text-success fas fa-eye" href='<?= base_url(); ?>/Pasien/detail/<?= $psn->id_pasien; ?>'></a>
                                            </td>
                                            <td><a class="fas fa-edit" href='<?= base_url(); ?>/Pasien/edit/<?= $psn->id_pasien; ?>'></a> </td>
                                            <td><a onclick="delId(this)" id='del' class="text-danger fas fa-trash" value='<?= $psn->id_pasien; ?>'></a></td>
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

    <!-- 
    <script>
        $(document).ready(function() {
            $('#datapasien').DataTable();
        });
    </script> -->
    <div class="modal" id='pasienform' tabindex="-1" role="dialog">
        <div class="modal-dialog  bg-dark" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form tambah pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body ">
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
                        url: "<?= base_url(); ?>/Pasien/del/" + id,
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