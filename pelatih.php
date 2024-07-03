<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Piai Fitnes</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            min-height:100vh;
            background: url("https://images.pexels.com/photos/669576/pexels-photo-669576.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1") no-repeat center center/cover;
            font-family: sans-serif;
            background-size: cover;
            background-position: center;
            backdrop-filter: blur(5px)
        }
        .table-container {
        overflow: hidden;
        position: relative;
        border-radius: 2px;
        margin-top: 1px;
        border: 1px solid black;

    }

    .table-container::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 10px;
        box-sizing: border-box;
        pointer-events: none;
        
    }

    .table-content {
        border: 1px solid black;
        padding: 10px;
        border-radius: 8px; 

    }
    .custom-heading {
            font-family: georgia, sans-serif;
            font-size: 3rem;
            font-weight: bold; 
            color: solid black;
            margin-top: 40px;
             
    }
    .table-bordered,
    .table-bordered th,
    .table-bordered td {
        border-color: black !important;
    }
    .navbar-brand {
    display: inline-block;
    text-align: center;
    text-decoration: none;
    color: #333; 
    font-family: Georgia, serif; 
    font-size: 23px; 
    width: 1000px; 
  }
  .navbar-brand i {
    display: block;
    font-size: 10px; 
    margin-bottom: 5px; 
  }
</style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <div class="navbar-brand"><i class="fa fa-dumbbell"></i>PIAI FITNESS</div>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                    <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-credit-card"></i></div>
                                Transaksi
                            </a>
                            <a class="nav-link" href="customer.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                                Customer
                            </a>
                            <a class="nav-link" href="pelatih.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Pelatih
                            </a>
                            <a class="nav-link" href="personaltrainer.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-dumbbell"></i></div>
                                Personal Trainer
                            </a>
                            <a class="nav-link" href="karyawan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-child"></i></div>
                                Karyawan 
                            </a>
                            <a class="nav-link" href="login.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-toggle-off"></i></div>
                                logout
                            </a>
                        </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                    <h1 class="mt-4 custom-heading">Pelatih</h1> 
                            <div class="card-header">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal" style="color: black; border-color: black;">
                                Tambah Pelatih
                            </div>
                            <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="table-container">
                                         <div class="table-content">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID PELATIH</th>
                                                <th>NAMA PELATIH</th>
                                                <th>PROGRAM</th>
                                                <th>HARGA TRAINER</th>
                                                <th>OPTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $ambilsemuadatapelatih = mysqli_query($conn, "select * from pelatih");
                                            while ($data = mysqli_fetch_array($ambilsemuadatapelatih)) {
                                            $idpelatih= $data['idpelatih'];
                                            $namapelatih = $data['namapelatih'];
                                            $idpersonaltrainer = $data['idpersonaltrainer'];
                                            $hargatrainer = $data ['hargatrainer'];          
                                            $idp =$data ['idpelatih'];
                                        ?>
                                        <tr>
                                            <td><?php echo $idpelatih; ?></td>
                                            <td><?php echo $namapelatih; ?></td>
                                            <td><?php echo $idpersonaltrainer; ?></td>
                                            <td>Rp.<?php echo number_format($hargatrainer, 0, ',', '.'); ?></td>
                                            <td>
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#edit<?php echo $idp; ?>" style="color: black; border-color: black;">
                                                        Edit
                                                    </button>
                                          
                                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete<?php echo $idp; ?>" style="color: black; border-color: black;">
                                                        Delete
                                                    </button>
                                            </td>
                                            <tr>
                                            <!-- Edit Modal -->
                                            <div class="modal" id="edit<?php echo $idp; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                            
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"style="font-family:Georgia, 'Times New Roman', Times, serif; color: #495057; font-weight:bold;">Edit Pelatih</h4>
                                                            <button type="button" class="close" data-dismiss="modal"></button>
                                                        </div>
                                            
                                                        <!-- Modal body -->
                                                        <form method="post">
                                                            <div class="modal-body">

                                                            <div class="form-group row">
                                                                <label for="namapelatih" class="col-sm-2 col-form-label"style="font-weight: bold;">Nama </label>
                                                                <div class="col-sm-10">
                                                                <input type="text" name="namapelatih" value="<?php echo $namapelatih; ?>" class="form-control" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="idpersonaltariner" class="col-sm-2 col-form-label"style="font-weight: bold;">Trainer</label>
                                                                <div class="col-sm-10">
                                                                <select name="idpersonaltrainer" class="form-control" required>
                                                                    <option value="A">Compulsory</option>
                                                                    <option value="B">Competent</option>
                                                                    <option value="C">Beginner</option>
                                                                    <option value="T">Tidak ikut</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                                
                                                            <div class="form-group row">
                                                                <label for="hargatrainer" class="col-sm-2 col-form-label"style="font-weight: bold;">Harga </label>
                                                                <div class="col-sm-10">
                                                                <input type="text" name="hargatrainer" value="<?php echo $hargatrainer; ?>" class="form-control" required>
                                                                </div>
                                                            </div>
                                                                <input type="hidden" name="idpelatih" value="<?php echo $idp; ?>">
                                                                <br>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12 text-right">
                                                                    <button type="submit" class="btn btn-outline-success" name="updatepelatih">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            ?>
                                        <!-- Delete Modal -->
                                            <div class="modal" id="delete<?php echo $idp; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"style="font-family:Georgia, 'Times New Roman', Times, serif; color: #495057; font-weight:bold;">Hapus Pelatih</h4>
                                                            <button type="button" class="close" data-dismiss="modal"></button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus Pelatih ini?
                                                                <input type="hidden" name="idpelatih" value="<?php echo $idp; ?>">
                                                                <br><br>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12 text-right">
                                                                        <button type="submit" class="btn btn-outline-danger" name="hapuspelatih">Hapus</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                
                                            <?php
                                              }
                                            ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>

            <!-- Tambah Modal -->
        <div class="modal" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">

             <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title"style="font-family:Georgia, 'Times New Roman', Times, serif; color: #495057; font-weight:bold;">Tambah Pelatih</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post">
            <div class="modal-body">
            <div class="form-group row">
                <label for="idpelatih" class="col-sm-2 col-form-label"style="font-weight: bold;">ID </label>
                <div class="col-sm-10">
            <input type="text" name="idpelatih" placeholder="Id pelatih"class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="namapelatih" class="col-sm-2 col-form-label"style="font-weight: bold;">Nama </label>
                <div class="col-sm-10">
            <input type="text" name="namapelatih" placeholder="Nama pelatih"class="form-control"required>
            </div>
            </div>
            <div class="form-group row">
                <label for="idpersonaltrainernya" class="col-sm-2 col-form-label"style="font-weight: bold;">Trainer </label>
                <div class="col-sm-10">
            <select name="idpersonaltrainernya" class="form-control">
                <?php
                    $tulispersonaltrainernya = mysqli_query($conn, "select * from personaltrainer");
                    while($fetcharray = mysqli_fetch_array($tulispersonaltrainernya)) {
                    $idpersonaltrainer = $fetcharray['idpersonaltrainer'];
                    $program = $fetcharray['program'];
                ?>
            <option value="<?= $idpersonaltrainer; ?>"><?= $program; ?></option>
            <?php
             }
            ?>
            </select>
            </div>
            </div>
            <div class="form-group row">
                <label for="hargatrainer" class="col-sm-2 col-form-label"style="font-weight: bold;">Harga </label>
                <div class="col-sm-10">
            <input type="text" name="hargatrainer" placeholder="Harga Trainer"class="form-control"required>
            <br>
            <div class="form-group row">
            <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-outline-success" name="addnewpelatih">Submit</button>
            </div>
        </div>
        </div>
    </div>

</html>
