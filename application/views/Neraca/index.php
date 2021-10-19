<?php $status = $this->session->flashdata('status'); ?>
<!-- <?php $now = date('Y-m-d') . " 00:00:00"; ?> -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Neraca Aset</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Barang</a></li>
                        <li class="breadcrumb-item active">Index</li>
                        <!-- <?php echo $now ?> -->
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
                            <h3 class="card-title">Aset Lancar</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Saldo Tunai</th>
                                        <th>Piutang Gaji</th>
                                        <th>Piutang Penjualan</th>
                                        <th>Piutang Informent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Kas') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $kas = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Piutang Gaji') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $piutang_gaji = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Piutang Penjualan') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $piutang_penjualan = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Piutang Informent') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $piutang_informent = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>

                                    </tr>
                                </tbody>
                                <?php $total_asetlancar = $kas + $piutang_gaji + $piutang_penjualan + $piutang_informent ?>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Total</th>
                                        <th><?= number_format($total_asetlancar, 0, ',', '.') ?></th>
                                        <!-- <th>Aksi</th> -->
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Beban</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Pembelian Gabah</th>
                                        <th>Bahan Pembantu</th>
                                        <th>Beban Operasional</th>
                                        <th>Gaji</th>
                                        <th>Transportasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Pembelian Gabah') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $beli_gabah = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Pembelian Bahan Baku Pembantu') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $bahan_baku_pembantu = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Beban Operasional') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $beban_operasional = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Beban Gaji') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $beban_gaji = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Beban Transport Penjualan') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $transpor_penjualan = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </tr>
                                </tbody>
                                <?php $total_beban = $beli_gabah + $bahan_baku_pembantu + $beban_operasional + $beban_gaji + $transpor_penjualan ?>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <th><?= number_format($total_beban, 0, ',', '.') ?></th>
                                        <!-- <th>Aksi</th> -->
                                    </tr>
                                </tfoot>


                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Total Aset</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Laba / Rugi</th>
                                        <th>Prive</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Modal') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $modal = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Prive') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $modal = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="1">TOTAL ASET</th>
                                        <th><?= number_format($modal, 0, ',', '.') ?></th>
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

            <!-- COBA PANGGIL DATA MSQL -->
            <div class="row">
                <!-- ISI -->
            </div>

        </div>
        <!--/. container-fluid -->
    </section>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Neraca Modal & Kewajiban</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Barang</a></li>
                        <li class="breadcrumb-item active">Index</li>
                        <!-- <?php echo $now ?> -->
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
                            <h3 class="card-title">Kewajiban</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Hutang Operasional</th>
                                        <th>Hutang Pembayaran</th>
                                        <th>Hutang Opr Harian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Utang Usaha') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $utang_usaha = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Utang Pembayaran') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $utang_pembayaran = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Utang Operasional Harian') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $utang_opr = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </tr>
                                </tbody>
                                <?php $total = $utang_usaha + $utang_pembayaran + $utang_opr ?>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">Total</th>
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

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Neraca Aset Lancar</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Beras</th>
                                        <th>Dedak</th>
                                        <th>Sekam</th>
                                        <th>Menir</th>
                                        <th>Tepung Sekam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Penjualan Beras') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $beras = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Penjualan Katul') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $dedak = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Penjualan Sekam') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $sekam = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Penjualan Menir') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $menir = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Penjualan Tepung Sekam') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $tepung_sekam = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </tr>
                                </tbody>
                                <?php $penjualan = $beras + $dedak + $sekam + $menir + $tepung_sekam ?>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">TOTAL KEWAJIBAN</th>
                                        <th><?= number_format($penjualan, 0, ',', '.') ?></th>
                                        <!-- <th>Aksi</th> -->
                                    </tr>
                                </tfoot>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <th><?= number_format($penjualan, 0, ',', '.') ?></th>
                                        <!-- <th>Aksi</th> -->
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Neraca Aset Lancar</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Beras</th>
                                        <th>Dedak</th>
                                        <th>Sekam</th>
                                        <th>Menir</th>
                                        <th>Tepung Sekam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Penjualan Beras') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $beras = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Penjualan Katul') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $dedak = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Penjualan Sekam') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $sekam = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Penjualan Menir') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $menir = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Penjualan Tepung Sekam') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $tepung_sekam = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </tr>
                                </tbody>
                                <?php $penjualan = $beras + $dedak + $sekam + $menir + $tepung_sekam ?>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">TOTAL KEWAJIBAN</th>
                                        <th><?= number_format($penjualan, 0, ',', '.') ?></th>
                                        <!-- <th>Aksi</th> -->
                                    </tr>
                                </tfoot>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <th><?= number_format($penjualan, 0, ',', '.') ?></th>
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

            <!-- COBA PANGGIL DATA MSQL -->
            <div class="row">
                <!-- ISI -->
            </div>

        </div>
        <!--/. container-fluid -->
    </section>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Neraca Aset</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Barang</a></li>
                        <li class="breadcrumb-item active">Index</li>
                        <!-- <?php echo $now ?> -->
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
                            <h3 class="card-title">Aset Tetap</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Bahan Bangunan</th>
                                        <th>Peralatan Pabrik</th>
                                        <th>Sewa bayar dimuka</th>
                                        <th>Perlengkapan Pabrik</th>
                                        <th>Biaya Lain-Lain</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Bahan Bangunan') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $bahan_bangunan = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Peralatan Pabrik') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $peralatan_pabrik = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Sewa Bayar di Muka') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $sewa_dibayar_dimuka = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Perlengkapan Pabrik') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $perlengkapan_pabrik = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Biaya Lain - Lain') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $biaya_lainlain = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </tr>
                                </tbody>
                                <?php $total_beban = $bahan_bangunan + $peralatan_pabrik + $sewa_dibayar_dimuka + $perlengkapan_pabrik +  $biaya_lainlain ?>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">TOTAL ASET TETAP</th>
                                        <th><?= number_format($penjualan, 0, ',', '.') ?></th>
                                        <!-- <th>Aksi</th> -->
                                    </tr>
                                </tfoot>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <th><?= number_format($total_beban, 0, ',', '.') ?></th>
                                        <!-- <th>Aksi</th> -->
                                    </tr>
                                </tfoot>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Neraca Aset Lancar</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Modal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Penjualan Beras') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $beras = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>

                                    </tr>
                                </tbody>
                                <?php $penjualan = $beras + $dedak + $sekam + $menir + $tepung_sekam ?>
                                <tfoot>
                                    <tr>
                                        <th><?= number_format($penjualan, 0, ',', '.') ?></th>
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

            <!-- COBA PANGGIL DATA MSQL -->
            <div class="row">
                <!-- ISI -->
            </div>

        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">TOTAL ASET</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Barang</a></li>
                        <li class="breadcrumb-item active">Index</li>
                        <!-- <?php echo $now ?> -->
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
                            <h3 class="card-title">Neraca</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 50%;">Total Aset</th>
                                        <th style="width: 50%;">Total Modal & Kewajiban</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Penjualan Beras') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $beras = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($neraca as $data) : ?>
                                            <?php if ($data['nama_kode'] == 'Penjualan Beras') { ?>
                                                <td>Rp. <?= number_format($data['total'], 0, ',', ',') ?></td>
                                                <?php $beras = $data['total'] ?>
                                            <?php } ?>
                                        <?php endforeach; ?>

                                    </tr>
                                </tbody>
                                <?php $penjualan = $beras + $dedak + $sekam + $menir + $tepung_sekam ?>
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

        // notifikasi allert sukses atau tidak
        <?php if ($status == 'sukses') { ?>
            swal("Success!", "Berhasil menambah data rincian!", "success");
        <?php } else if ($status == 'gagal') { ?>
            swal("Gagal!", "Gagal menambah data rincian!", "warning");
        <?php } else { ?>
        <?php } ?>

    });
</script>