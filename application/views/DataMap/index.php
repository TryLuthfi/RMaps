<?php $status = $this->session->flashdata('status'); ?>
<!-- <?php $now = date('Y-m-d') . " 00:00:00"; ?> -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Toko</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Barang</a></li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <a href="#" class="btn btn-success float-right text-bold" data-target="#modal-lg-tambah" data-toggle="modal">Tambah &nbsp;<i class="fas fa-plus"></i> </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tabel_pemasukan" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Toko</th>
                                        <th>Alamat Toko</th>
                                        <th>No HandPhone</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0; ?>
                                    <?php $no = 0; ?>
                                    <?php foreach ($datamaps as $data) : ?>
                                        <?php $no++ ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $data['nama_lokasi'] ?></td>
                                            <td><?= $data['alamat_lokasi'] ?></td>
                                            <td><?= $data['no_hp'] ?></td>
                                            <td><?= $data['lat_peta'] ?></td>
                                            <td><?= $data['long_peta'] ?></td>
                                            <td>
                                                <a href="<?php echo base_url('DataMap/delete/') . $data['id_peta'] ?>" class="btn btn-danger remove"><i class=" fas fa-trash"></i></a>
                                                <a href="#" class="btn btn-warning" data-target="#modal-lg-edit<?php echo $data['id_peta'] ?>" data-toggle="modal"><i class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->

            <!-- modal untuk tambah data -->
            <?php $tgl = date('Y-m-d'); ?>
            <form action=" <?php echo base_url('DataMap/add') ?>" method="post">
                <div class="modal fade" id="modal-lg-tambah">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Data Toko</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-form-label">Nama Toko</label>
                                    <input type="text" class="form-control" name="nama_lokasi" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Alamat Toko</label>
                                    <input type="text" class="form-control" name="alamat_lokasi" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">No Hp</label>
                                    <input type="number" class="form-control" name="no_hp" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Latitude</label>
                                    <input type="text" class="form-control" name="latitude" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Longitude</label>
                                    <input type="text" class="form-control" name="longitude" autocomplete="off">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>

                                    <button type="submit" name="btnSubmit" class="btn btn-primary"><i class="fa fa-spinner fa-spin loading" style="display:none"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </form>

            <!-- modal untuk edit data -->
            <?php $tgl = date('Y-m-d'); ?>
            <?php foreach ($datamaps as $data) :
            ?>

                <form action="<?php echo base_url('DataMap/edit'); ?>" method="post">
                    <div class="modal fade" id="modal-lg-edit<?= $data['id_peta'] ?>" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Rincian <?php echo $data['id_peta']; ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id_peta" value="<?= $data['id_peta'] ?>">
                                    <div class="form-group">
                                        <label class="col-form-label">Nama Toko</label>
                                        <input type="text" class="form-control" name="nama_lokasi" autocomplete="off" value="<?= $data['nama_lokasi'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Alamat Toko</label>
                                        <input type="text" class="form-control" name="alamat_lokasi" autocomplete="off" value="<?= $data['alamat_lokasi'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">No HandPhone</label>
                                        <input type="number" class="form-control" name="no_hp" autocomplete="off" value="<?= $data['no_hp'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Latitude</label>
                                        <input type="text" class="form-control" name="latitude" autocomplete="off" value="<?= $data['lat_peta'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Longitude</label>
                                        <input type="text" class="form-control" name="longitude" autocomplete="off" value="<?= $data['long_peta'] ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>

                                        <button type="submit" name="btnEdit" class="btn btn-primary"><i class="fa fa-spinner fa-spin loading" style="display:none"></i> Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>



            <!-- COBA PANGGIL DATA MSQL -->
            <div class="row">
                <!-- ISI -->
            </div>

        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<script>
    $('#1').datepicker({
        inputs: $('input[name=tanggal_berangkat]'),
        format: 'dd/mm/yyyy'
    })
    $('#2').datepicker({
        inputs: $('input[name=utanggal_berangkat]'),
        format: 'dd/mm/yyyy'
    })
</script>
<script type="text/javascript">
    $(function() {

        // format angka rupiah
        $('[data-mask]').inputmask("currency", {
            prefix: " Rp. ",
            digitsOptional: true
        })

        <?php if ($status == 'sukses') { ?>
            swal("Success!", "Berhasil menambah data rincian!", "success");
        <?php } else if ($status == 'gagal') { ?>
            swal("Gagal!", "Gagal menambah data rincian!", "warning");
        <?php } else { ?>
        <?php } ?>

    });
</script>