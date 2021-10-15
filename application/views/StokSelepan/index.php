<?php $status = $this->session->flashdata('status'); ?>
<!-- <?php $now = date('Y-m-d') . " 00:00:00"; ?> -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Selepan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Stok</a></li>
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
                                        <div class="col-5">
                                            <form action="<?= base_url('StokSelepan/search') ?>" method="POST">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="far fa-calendar-alt"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control float-right" id="date-range" name="date" value="<?= date('m/01/Y') ?> - <?= date('m/t/Y') ?>">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-4">
                                            <select name="keterangan" id="keterangan" class="form-control">
                                                <option value="pilih">Pilih Keterangan</option>
                                                <option value="pemasukan">Pemasukan</option>
                                                <option value="pengeluaran">Pengeluaran</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <button type="submit" class="btn btn-info">Cari</button>
                                        </div>
                                        </form>
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
                                        <th>Tanggal</th>
                                        <th>Jenis Stok</th>
                                        <th>Keterangan</th>
                                        <th>Jenis Produksi</th>
                                        <th>Total Stok</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0; ?>
                                    <?php $no = 0; ?>
                                    <?php foreach ($stokselepan as $data) : ?>
                                        <?php $no++ ?>
                                        <tr>
                                            <td><?= $data['tanggal'] ?></td>
                                            <td><?= $data['keterangan_kode'] ?></td>
                                            <td><?= $data['jenis'] ?></td>
                                            <td><?= $data['keterangan'] ?></td>
                                            <td><?= $data['total'] ?></td>
                                            <td>
                                                <a href="#" class="btn btn-warning" data-target="#modal-lg-edit<?php echo $data['id_stok'] ?>" data-toggle="modal"><i class="fas fa-edit"></i></a>
                                                <a href="<?php echo base_url('StokSelepan/delete/') . $data['id_stok'] ?>" class="btn btn-danger remove"><i class=" fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php $total = $total + $data['total']; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Total</th>
                                        <th><?= number_format($total, 0, ',', '.') ?></th>
                                        <!-- <th>Aksi</th> -->
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->

            <?php $tgl = date('Y-m-d'); ?>
            <form action=" <?php echo base_url('StokSelepan/add') ?>" method="post">
                <div class="modal fade" id="modal-lg-tambah">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Stok</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-form-label">Tanggal :</label>
                                    <input type="date" value="<?php echo  $tgl ?>" class="form-control text-dark" name="tanggal" id="tgl1">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Jenis Stok</label>
                                    <select name="jenis_stok" id="jenis_stok" class="form-control">
                                        <option name="kode_kredit">Pilih Jenis Stok</option>
                                        <?php foreach ($kode_stok as $data) : ?>
                                            <option value="<?= $data['id_kode'] ?>"><?= $data['keterangan_kode'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Keterangan</label>
                                    <select name="keterangan" id="keterangan" class="form-control">
                                        <option name="kode_kredit">Pilih Keterangan</option>
                                        <option name="kode_kredit">Pemasukan</option>
                                        <option name="kode_kredit">Pengeluaran</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Jenis Produksi</label>
                                    <select name="jenis_produksi" id="keterangan" class="form-control">
                                        <option name="kode_kredit">Pilih Jenis Produksi</option>
                                        <option name="kode_kredit">Giling</option>
                                        <option name="kode_kredit">Jual</option>
                                        <option name="kode_kredit">Repack</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Jumlah</label>
                                    <input class="form-control" name="jumlah" autocomplete="off">
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

            <?php $tgl = date('Y-m-d'); ?>
            <?php foreach ($stokselepan as $data) :
            ?>

                <form action="<?php echo base_url('StokSelepan/edit'); ?>" method="post">
                    <div class="modal fade" id="modal-lg-edit<?= $data['id_stok'] ?>" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Rincian <?php echo $data['id_stok']; ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id_stok" value="<?= $data['id_stok'] ?>">
                                    <div class="form-group">
                                        <label class="col-form-label">Tanggal :</label>
                                        <input type="date" value="<?php echo  $data['tanggal'] ?>" class="form-control text-dark" name="tanggal" id="tgl1">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Jenis Stok</label>
                                        <select name="jenis_stok" id="jenis_stok" class="form-control">
                                            <option name="kode_kredit">Pilih Jenis Stok</option>
                                            <?php foreach ($kode_stok as $data2) : ?>
                                                <option <?php if ($data2['id_kode'] == $data['id_kode']) {
                                                            echo 'selected="selected"';
                                                        } ?> value="<?php echo $data2['id_kode'] ?>"><?php echo $data2['keterangan_kode'] ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Keterangan</label>
                                        <select name="keterangan" id="keterangan" class="form-control">
                                            <option name="kode_kredit">Pilih Keterangan</option>
                                            <option <?php if ($data['jenis'] == 'Pemasukan') {
                                                        echo 'selected="selected"';
                                                    } ?> value="Pemasukan">Pemasukan</option>
                                            <option <?php if ($data['jenis'] == 'Pengeluaran') {
                                                        echo 'selected="selected"';
                                                    } ?> value="Pengeluaran">Pengeluaran</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Jenis Produksi</label>
                                        <select name="jenis_produksi" id="jenis_produksi" class="form-control">
                                            <option name="kode_kredit">Pilih Jenis Stok</option>
                                            <option <?php if ($data['keterangan'] == 'Giling') {
                                                        echo 'selected="selected"';
                                                    } ?> value="Giling">Giling</option>
                                            <option <?php if ($data['keterangan'] == 'Jual') {
                                                        echo 'selected="selected"';
                                                    } ?> value="Jual">Jual</option>
                                            <option <?php if ($data['keterangan'] == 'Repack') {
                                                        echo 'selected="selected"';
                                                    } ?> value="Repack">Repack</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Keterangan</label>
                                        <input class="form-control" name="jumlah" autocomplete="off" value="<?= $data['total'] ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>

                                        <button type="submit" name="btnSubmit" class="btn btn-primary"><i class="fa fa-spinner fa-spin loading" style="display:none"></i> Simpan</button>
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