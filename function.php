<?php 
//membuat koneksi ke database
$conn= mysqli_connect ("localhost","root","","gym");




//menambah nama karyawan
if(isset($_POST['addnewkaryawan'])){
    $idkaryawan=$_POST['idkaryawan'];
    $namakaryawan=$_POST['namakaryawan'];

    $addtotable = mysqli_query($conn,"insert into karyawan (idkaryawan,namakaryawan)values('$idkaryawan','$namakaryawan')");
    if($addtotable){
        header('location:karyawan.php');

    }else{
        echo 'Gagal';
        header('location:karyawan.php');
    }
}


//Edit Karyawan
if (isset($_POST['updatekaryawan'])) {
    $idkaryawan = $_POST['idkaryawan'];
    $namakaryawan = $_POST['namakaryawan'];

    updatekaryawan($conn, $idkaryawan,$namakaryawan);
}

function updatekaryawan($conn, $idkaryawan,$namakaryawan) {
    $query = "UPDATE karyawan SET namakaryawan='$namakaryawan' WHERE idkaryawan='$idkaryawan'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('Location: karyawan.php');
        exit();
    } else {
        echo 'Gagal';
        header('location:karyawan.php'); 
    }
}


// Delete Karyawan
if (isset($_POST['hapuskaryawan'])) {

    $idkaryawan = $_POST['idkaryawan'];

    deleteKaryawan($conn, $idkaryawan);
}

function deleteKaryawan($conn, $idkaryawan) {
    $query = "DELETE FROM karyawan WHERE idkaryawan='$idkaryawan'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('Location:karyawan.php');
    } else {
        echo 'Gagal';
        header('Location:karyawan.php');
    }
}




//menambah pelatih
if(isset($_POST['addnewpelatih'])){
    $idpelatih=$_POST['idpelatih'];
    $namapelatih=$_POST['namapelatih'];
    $idpersonaltrainernya=$_POST ['idpersonaltrainernya'];
    $hargatrainer=$_POST ['hargatrainer'];

    $addtopelatih = mysqli_query($conn,"INSERT INTO pelatih (idpelatih,namapelatih,idpersonaltrainer,hargatrainer)values('$idpelatih','$namapelatih','$idpersonaltrainernya','$hargatrainer')");
    if($addtopelatih){
        header('location:pelatih.php');

    }else{
        echo 'Gagal';
        header('location:pelatih.php');
    }
}

//Edit Pelatih
if (isset($_POST['updatepelatih'])) {
    $idp = $_POST['idpelatih'];
    $namapelatih = $_POST['namapelatih'];
    $idpersonaltrainer = $_POST['idpersonaltrainer'];
    $hargatrainer=$_POST ['hargatrainer'];

    updatepelatih($conn, $idp, $namapelatih, $idpersonaltrainer,$hargatrainer);
}

function updatepelatih($conn, $idpelatih, $namapelatih, $idpersonaltrainer,$hargatrainer) {
    $query = "UPDATE pelatih SET namapelatih='$namapelatih', idpersonaltrainer='$idpersonaltrainer' , hargatrainer='$hargatrainer' WHERE idpelatih='$idpelatih'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('Location:pelatih.php');
    } else {
        echo 'Gagal';
        header('location:pelatih.php');
    }
}


// Delete Pelatih
if (isset($_POST['hapuspelatih'])) {

    $idpelatih = $_POST['idpelatih'];

    deletePelatih($conn, $idpelatih);
}

function deletePelatih($conn, $idpelatih) {
    $query = "DELETE FROM pelatih WHERE idpelatih='$idpelatih'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('Location:pelatih.php');
    } else {
        echo 'Gagal';
        header('Location:pelatih.php');
    }
}



// Tambah customer
if(isset($_POST['addnewcustomer'])){
    $pelanggan = $_POST['pelanggan'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $idperiode = $_POST['idperiode'];
    $jumlah = $_POST['jumlah'];
    $idpelatih = $_POST['idpelatih'];
    $total_harga = $_POST['total_harga']; 
    

    $hargatrainer_perbulan = 0; 
    $result_trainer = mysqli_query($conn, "SELECT hargatrainer FROM pelatih WHERE idpelatih = '$idpelatih'");
    if ($result_trainer && mysqli_num_rows($result_trainer) > 0) {
        $row_trainer = mysqli_fetch_assoc($result_trainer);
        $hargatrainer_perbulan = intval($row_trainer['hargatrainer']); 
    } else {
        echo "Error: Failed to fetch trainer price.";
    }

  
    $hargaperiode_perbulan = 0;
    if ($idperiode === 'Bulanan') {
        $result_periode = mysqli_query($conn, "SELECT hargaperiode FROM periode WHERE periode = 'Bulanan'");
        if ($result_periode && mysqli_num_rows($result_periode) > 0) {
            $row_periode = mysqli_fetch_assoc($result_periode);
            $hargaperiode_perbulan = intval($row_periode['hargaperiode']); 
        } else {
            echo "Error: Failed to fetch period price.";
        }
    }


    $total_biaya_trainer = $hargatrainer_perbulan * $jumlah;
    $total_biaya_periode = $hargaperiode_perbulan * $jumlah;
    $total_harga = $total_biaya_trainer + $total_biaya_periode;
    

    $addtocustomer = mysqli_query($conn, "INSERT INTO customer (pelanggan, nohp, alamat, idperiode, jumlah, idpelatih, total_harga) VALUES ('$pelanggan', '$nohp', '$alamat', '$idperiode', '$jumlah', '$idpelatih', '$total_harga')");
    
    if($addtocustomer){
        echo "Data customer berhasil ditambahkan.";
        header('Location: customer.php');
    } else {
        echo "Gagal menambahkan data customer: " . mysqli_error($conn);
        header('Location: customer.php');
    }
}


//edit customer
if (isset($_POST['updatecustomer'])) {
    $idcustomer = $_POST['idcustomer'];
    $pelanggan = $_POST['pelanggan'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $idperiode = $_POST['idperiode'];
    $jumlah = $_POST['jumlah'];
    $idpelatih = $_POST['idpelatih'];



    viewtransaksi($conn, $idcustomer, $pelanggan, $nohp, $alamat, $idperiode, $jumlah, $idpelatih);
}

function viewtransaksi($conn, $idcustomer, $pelanggan, $nohp, $alamat, $idperiode, $jumlah, $idpelatih) {
    $query = "UPDATE customer SET pelanggan='$pelanggan', nohp='$nohp', alamat='$alamat', idperiode='$idperiode', jumlah='$jumlah', idpelatih='$idpelatih' WHERE idcustomer='$idcustomer'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('Location: customer.php');
        exit();
    } else {
        echo 'Gagal';
        header('Location: customer.php');
        exit(); 
    }
}


// Delete Customer
if (isset($_POST['hapuscustomer'])) {

    $idcustomer = $_POST['idcustomer'];

    deleteCustomer($conn, $idcustomer);
}

function deleteCustomer($conn, $idcustomer) {
    $query = "DELETE FROM customer WHERE idcustomer='$idcustomer'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('Location:customer.php');
    } else {
        echo 'Gagal';
        header('Location:customer.php');
    }
}


//menambah transaksi
if(isset($_POST['addnewtransaksi'])){
    $customernya=$_POST['customernya'];
    $karyawannya=$_POST['karyawannya'];

    $addtotransaksi = mysqli_query($conn, "INSERT INTO transaksi (idcustomer, idkaryawan) VALUES ('$customernya', '$karyawannya')");
    if ($addtotransaksi) {
        header('location: index.php');
    } else {
        echo 'Gagal';
        header('location: index.php');
    }
}    

// Delete Transaksi
if (isset($_POST['hapustransaksi'])) {

    $idi = $_POST['id_invoice'];

    deleteTransaksi($conn, $idi);
}

function deleteTransaksi($conn, $idi) {
    $query = "DELETE FROM transaksi WHERE id_invoice='$idi'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('Location:index.php');
    } else {
        echo 'Gagal';
        header('Location:index.php');
    }
}


//Menambah Personal Trainer
if(isset($_POST['addnewpersonaltrainer'])){
    $idpersonaltrainer=$_POST['idpersonaltrainer'];
    $program=$_POST['program'];

    $addtopersonaltrainer = mysqli_query($conn, "insert into personaltrainer(idpersonaltrainer,program)values('$idpersonaltrainer','$program')");
    if($addtopersonaltrainer){
        header('location:personaltrainer.php');

    }else{
        echo 'Gagal';
        header('location:personaltrainer.php');
    }
}

// Delete Trainer
if (isset($_POST['hapuspersonaltrainer'])) {

    $idpersonaltrainer = $_POST['idpersonaltrainer'];

    deletepersonaltrainer($conn, $idpersonaltrainer);
}

function deletepersonaltrainer($conn, $idpersonaltrainer) {
    $query = "DELETE FROM personaltrainer WHERE idpersonaltrainer='$idpersonaltrainer'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('Location:personaltrainer.php');
    } else {
        echo 'Gagal';
        header('Location:personaltrainer.php');
    }
}
?>