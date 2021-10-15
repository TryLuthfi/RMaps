<?php $status = $this->session->flashdata('status'); ?>
<!-- <?php $now = date('Y-m-d') . " 00:00:00"; ?> -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Neraca Stok Selepan</h1>
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

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="m-0 text-dark">Beras</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tabel_pemasukan" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No </th>
                                        <th>Keterangan Stok</th>
                                        <th>Total Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($kode_stok as $kode) : ?>
                                        <?php if (strpos($kode['keterangan_kode'], 'Beras') !== false) { ?>
                                            <?php $no++ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $kode['keterangan_kode'] ?></td>
                                                <td><?= $kode['total'] ?></td>
                                            </tr>
                                        <?php }  ?>
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
            <!-- COBA PANGGIL DATA MSQL -->
            <div class="row">
                <!-- ISI -->
            </div>

        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
    <?php foreach ($kode_stok as $kode) : ?>
        <?php if (strpos($kode['keterangan_kode'], 'beras') !== false) { ?>

        <?php } else { ?>
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="m-0 text-dark">Lain - Lain</h2>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tabel_pemasukan" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No </th>
                                                <th>Keterangan Stok</th>
                                                <th>Total Stok</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0; ?>
                                            <?php foreach ($kode_stok as $kode) : ?>
                                                <?php if (strpos($kode['keterangan_kode'], 'Beras') !== false || strpos($kode['keterangan_kode'], 'Zak') !== false) { ?>

                                                <?php } else {  ?>
                                                    <?php $no++ ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= $kode['keterangan_kode'] ?></td>
                                                        <td><?= $kode['total'] ?></td>
                                                    </tr>
                                                <?php }  ?>
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
                    <!-- COBA PANGGIL DATA MSQL -->
                    <div class="row">
                        <!-- ISI -->
                    </div>

                </div>
                <!--/. container-fluid -->
            </section>
        <?php break;
        } ?>
    <?php endforeach; ?>

    <?php foreach ($kode_stok as $kode) : ?>
        <?php if (strpos($kode['keterangan_kode'], 'Zak') !== false) { ?>
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="m-0 text-dark">Zak Beras</h2>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tabel_pemasukan" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No </th>
                                                <th>Keterangan Stok</th>
                                                <th>Total Stok</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0; ?>
                                            <?php foreach ($kode_stok as $kode) : ?>
                                                <?php if (strpos($kode['keterangan_kode'], 'Zak') !== false) { ?>
                                                    <?php $no++ ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= $kode['keterangan_kode'] ?></td>
                                                        <td><?= $kode['total'] ?></td>
                                                    </tr>
                                                <?php } ?>
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
                    <!-- COBA PANGGIL DATA MSQL -->
                    <div class="row">
                        <!-- ISI -->
                    </div>

                </div>
                <!--/. container-fluid -->
            </section>

        <?php break;
        } ?>
    <?php endforeach; ?>
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