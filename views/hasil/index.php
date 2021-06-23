<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= APP_NAME ?> - <?= $judul ?></title>
    <link href="<?= base_url('sb-admin-2/') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url('sb-admin-2/') ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('sb-admin-2/') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php partial('navbar', $aktif) ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php partial('topbar') ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="clearfix">
                                <div class="float-left">
                                    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
                                </div>
                                <!-- <div class="float-right">
								<a href="" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
							</div> -->
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar Hasil Perhitungan</h6>
                                </div>
                                <div class="card-body">
                                    <?php if (checkSession('success')) : ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <?= getSession('success', true) ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php elseif (checkSession('error')) : ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?= getSession('error', true) ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php endif ?>

                                    <?php
                                    $tampil = $view_matrik;
                                    $data      = array();
                                    $kriterias = array();
                                    $bobot     = array();
                                    $nilai_kuadrat = array();
                                    if ($tampil) {
                                        while ($row = $tampil->fetch_object()) {
                                            if (!isset($data[$row->nama_alternatif])) {
                                                $data[$row->nama_alternatif] = array();
                                            }
                                            if (!isset($data[$row->nama_alternatif][$row->nama_kriteria])) {
                                                $data[$row->nama_alternatif][$row->nama_kriteria] = array();
                                            }
                                            if (!isset($nilai_kuadrat[$row->nama_kriteria])) {
                                                $nilai_kuadrat[$row->nama_kriteria] = 0;
                                            }
                                            $bobot[$row->nama_kriteria] = $row->bobot;
                                            $data[$row->nama_alternatif][$row->nama_kriteria] = $row->nilai;
                                            $nilai_kuadrat[$row->nama_kriteria] += pow($row->nilai, 2);
                                            $kriterias[] = $row->nama_kriteria;
                                        }
                                    }

                                    $kriteria     = array_unique($kriterias);
                                    $jml_kriteria = count($kriteria);
                                    ?>

                                    <div class="row">
                                        <div class="col-lg-8 col-lg-offset-2">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    Evaluation Matrix (x<sub>ij</sub>)
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan='3'>No</th>
                                                                <th rowspan='3'>Alternatif</th>
                                                                <th rowspan='3'>Nama</th>
                                                                <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                                                            </tr>
                                                            <tr>
                                                                <?php
                                                                foreach ($kriteria as $k)
                                                                    echo "<th>$k</th>\n";
                                                                ?>
                                                            </tr>
                                                            <tr>
                                                                <?php
                                                                for ($n = 1; $n <= $jml_kriteria; $n++)
                                                                    echo "<th>K$n</th>";
                                                                ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i = 0;
                                                            foreach ($data as $nama => $krit) {
                                                                echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A$i</th>
                      <td>$nama</td>";
                                                                foreach ($kriteria as $k) {
                                                                    echo "<td align='center'>$krit[$k]</td>";
                                                                }
                                                                echo "</tr>\n";
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-8 col-lg-offset-2">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    Rating Kinerja Ternormalisasi (r<sub>ij</sub>)
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan='3'>No</th>
                                                                <th rowspan='3'>Alternatif</th>
                                                                <th rowspan='3'>Nama</th>
                                                                <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                                                            </tr>
                                                            <tr>
                                                                <?php
                                                                foreach ($kriteria as $k)
                                                                    echo "<th>$k</th>\n";
                                                                ?>
                                                            </tr>
                                                            <tr>
                                                                <?php
                                                                for ($n = 1; $n <= $jml_kriteria; $n++)
                                                                    echo "<th>K$n</th>";
                                                                ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i = 0;
                                                            foreach ($data as $nama => $krit) {
                                                                echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                                                                foreach ($kriteria as $k) {
                                                                    echo "<td align='center'>" . round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 4) . "</td>";
                                                                }
                                                                echo
                                                                "</tr>\n";
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-8 col-lg-offset-2">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    Rating Bobot Ternormalisasi(y<sub>ij</sub>)
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan='3'>No</th>
                                                                <th rowspan='3'>Alternatif</th>
                                                                <th rowspan='3'>Nama</th>
                                                                <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                                                            </tr>
                                                            <tr>
                                                                <?php
                                                                foreach ($kriteria as $k)
                                                                    echo "<th>$k</th>\n";
                                                                ?>
                                                            </tr>
                                                            <tr>
                                                                <?php
                                                                for ($n = 1; $n <= $jml_kriteria; $n++)
                                                                    echo "<th>K$n</th>";
                                                                ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i = 0;
                                                            $y = array();
                                                            foreach ($data as $nama => $krit) {
                                                                echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                                                                foreach ($kriteria as $k) {
                                                                    $y[$k][$i - 1] = round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 4) * $bobot[$k];
                                                                    echo "<td align='center'>" . $y[$k][$i - 1] . "</td>";
                                                                }
                                                                echo
                                                                "</tr>\n";
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-8 col-lg-offset-2">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    Solusi Ideal positif (A<sup>+</sup>)
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                                                            </tr>
                                                            <tr>
                                                                <?php
                                                                foreach ($kriteria as $k)
                                                                    echo "<th>$k</th>\n";
                                                                ?>
                                                            </tr>
                                                            <tr>
                                                                <?php
                                                                for ($n = 1; $n <= $jml_kriteria; $n++)
                                                                    echo "<th>y<sub>{$n}</sub><sup>+</sup></th>";
                                                                ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <?php
                                                                $yplus = array();
                                                                foreach ($kriteria as $k) {
                                                                    $yplus[$k] = ([$k] ? max($y[$k]) : min($y[$k]));
                                                                    echo "<th>$yplus[$k]</th>";
                                                                }
                                                                ?>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-8 col-lg-offset-2">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    Solusi Ideal negatif (A<sup>-</sup>)
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                                                            </tr>
                                                            <tr>
                                                                <?php
                                                                foreach ($kriteria as $k)
                                                                    echo "<th>{$k}</th>\n";
                                                                ?>
                                                            </tr>
                                                            <tr>
                                                                <?php
                                                                for ($n = 1; $n <= $jml_kriteria; $n++)
                                                                    echo "<th>y<sub>{$n}</sub><sup>-</sup></th>";
                                                                ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <?php
                                                                $ymin = array();
                                                                foreach ($kriteria as $k) {
                                                                    $ymin[$k] = [$k] ? min($y[$k]) : max($y[$k]);
                                                                    echo "<th>{$ymin[$k]}</th>";
                                                                }

                                                                ?>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-8 col-lg-offset-2">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    Jarak positif (D<sub>i</sub><sup>+</sup>)
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Alternatif</th>
                                                                <th>Nama</th>
                                                                <th>D<suo>+</sup></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i = 0;
                                                            $dplus = array();
                                                            foreach ($data as $nama => $krit) {
                                                                echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                                                                foreach ($kriteria as $k) {
                                                                    if (!isset($dplus[$i - 1])) $dplus[$i - 1] = 0;
                                                                    $dplus[$i - 1] += pow($yplus[$k] - $y[$k][$i - 1], 2);
                                                                }
                                                                echo "<td>" . round(sqrt($dplus[$i - 1]), 6) . "</td>
                     </tr>\n";
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-8 col-lg-offset-2">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    Jarak negatif (D<sub>i</sub><sup>-</sup>)
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Alternatif</th>
                                                                <th>Nama</th>
                                                                <th>D<suo>-</sup></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i = 0;
                                                            $dmin = array();
                                                            foreach ($data as $nama => $krit) {
                                                                echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                                                                foreach ($kriteria as $k) {
                                                                    if (!isset($dmin[$i - 1])) $dmin[$i - 1] = 0;
                                                                    $dmin[$i - 1] += pow($ymin[$k] - $y[$k][$i - 1], 2);
                                                                }
                                                                echo "<td>" . round(sqrt($dmin[$i - 1]), 6) . "</td>
                     </tr>\n";
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-8 col-lg-offset-2">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    Nilai Preferensi(V<sub>i</sub>)
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Alternatif</th>
                                                                <th>Nama</th>
                                                                <th>V<sub>i</sub></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i = 0;
                                                            $V = array();
                                                            foreach ($data as $nama => $krit) {
                                                                echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                                                                foreach ($kriteria as $k) {
                                                                    $V[$i - 1] = $dmin[$i - 1] / ($dmin[$i - 1] + $dplus[$i - 1]);
                                                                }
                                                                echo "<td>{$V[$i - 1]}</td></tr>\n";
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php partial('footer') ?>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="<?= base_url('sb-admin-2/') ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('sb-admin-2/') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('sb-admin-2/') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('sb-admin-2/') ?>/js/sb-admin-2.min.js"></script>

    <script src="<?= base_url('sb-admin-2/') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('sb-admin-2/') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('sb-admin-2/') ?>/js/demo/datatables-demo.js"></script>
</body>

</html>