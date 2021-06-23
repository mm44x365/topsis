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
                        <div class="col-sm-4">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="<?= base_url('matrik/tambah') ?>" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="id_alternatif">Nama Alternatif</label>
                                            <select name="id_alternatif" id="id_alternatif" class="form-control">
                                                <?php while ($alternatif = $data_alternatif->fetch_object()) : ?>
                                                    <option value="<?= $alternatif->id ?>"><?= $alternatif->alternatif ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_kriteria">Nama Kriteria</label>
                                            <select name="id_kriteria" id="id_kriteria" class="form-control">
                                                <?php while ($kriteria = $data_kriteria->fetch_object()) : ?>
                                                    <option value="<?= $kriteria->id ?>"><?= $kriteria->kriteria ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="nilai">Nama Nilai/Poin</label>
                                            <select name="nilai" id="nilai" class="form-control">
                                                <?php while ($poin = $data_poin->fetch_object()) : ?>
                                                    <option value="<?= $poin->poin ?>"><?= $poin->poin ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-success" name="tambah"><i class="fa fa-plus"></i> Tambah</button>
                                            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Informasi
                                        <div class="float-right"> <a href="<?= base_url('matrik/clear/') ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Clear / Reset Matrik</a>
                                        </div>
                                    </h6>
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
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 mb-4">
                                            <div class="card border-left-primary shadow h-100 py-2">
                                                <div class="card-body">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <p class="text-center">Tabel Kriteria</p>
                                                        <thead>
                                                            <tr>
                                                                <th>ID Kriteria</th>
                                                                <th>Nama Kriteria</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($data_kriteria as $row) {
                                                                echo ("<tr><td align=\"center\">" . $row['id'] . "</td>");
                                                                echo ("<td align=\"left\">" . $row['kriteria'] . "</td>");
                                                                echo "</tr>";
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 mb-4">
                                            <div class="card border-left-primary shadow h-100 py-2">
                                                <div class="card-body">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <p class="text-center">Tabel Alternatif</p>
                                                        <thead>
                                                            <tr>
                                                                <th>ID Alternatif</th>
                                                                <th>Nama Alternatif</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($data_alternatif as $row) {
                                                                echo ("<tr><td align=\"center\">" . $row['id'] . "</td>");
                                                                echo ("<td align=\"left\">" . $row['alternatif'] . "</td>");
                                                                echo "</tr>";
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 mb-4">
                                            <div class="card border-left-primary shadow h-100 py-2">
                                                <div class="card-body">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <p class="text-center">Tabel Poin</p>
                                                        <thead>
                                                            <tr>
                                                                <th>ID Poin</th>
                                                                <th>Nama Poin</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($data_poin as $row) {
                                                                echo ("<tr><td align=\"center\">" . $row['id'] . "</td>");
                                                                echo ("<td align=\"left\">" . $row['poin'] . "</td>");
                                                                echo "</tr>";
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xl-12 col-md-6 mb-4">
                                            <table class="table table-striped table-bordered table-hover">
                                                <p class="text-center">Tabel Pemberian Nilai</p>
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>ALTERNATIF</th>
                                                        <th>KRITERIA</th>
                                                        <th>NILAI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    //menampilkan data
                                                    while ($row = $view_matrik->fetch_array()) {
                                                        echo ("<tr><td align=\"center\">" . $no . "</td>");
                                                        echo ("<td align=\"left\">" . $row['nama_alternatif'] . "</td>");
                                                        echo ("<td align=\"left\">" . $row['nama_kriteria'] . "</td>");
                                                        echo ("<td align=\"left\">" . $row['nilai'] . "</td>");
                                                        echo "</tr>";
                                                        $no++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 mb-4">
                                            <div class="card border-left-primary shadow h-100 py-2">
                                                <div class="card-body">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <p class="text-center">Tabel Jarak</p>
                                                        <thead>
                                                            <tr>
                                                                <th align="center">Sub Kriteria</th>
                                                                <th>Nilai</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <= 0.5KM < </td>
                                                                <td>1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>6KM-10KM</td>
                                                                <td>2</td>
                                                            </tr>
                                                            <tr>
                                                                <td>> 10</td>
                                                                <td>1</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 mb-4">
                                            <div class="card border-left-primary shadow h-100 py-2">
                                                <div class="card-body">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <p class="text-center">Tabel Jarak</p>
                                                        <thead>
                                                            <tr>
                                                                <th align="center">Sub Kriteria</th>
                                                                <th>Nilai</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <= 5mbps </td>
                                                                <td>1</td>
                                                            </tr>
                                                            <tr>
                                                                <td>6Kmbps-20mbps</td>
                                                                <td>2</td>
                                                            </tr>
                                                            <tr>
                                                                <td> >= 20mbps</td>
                                                                <td>3</td>
                                                            </tr>
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