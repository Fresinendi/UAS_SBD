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
        <title>Piai Fitnes</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
         <!-- The Modal -->
         <div class="modal" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">

         <!-- Modal body -->
         <form method="post">
            <div class="modal-body">
            <input type="text" name="idperiode" placeholder="Id Periode"class="form-control"required>
            <br>
            <input type="text" name="periode" placeholder="Nama Periode"class="form-control"required>
            <input type="text" name="hargaperiode" placeholder="Harga Periode"class="form-control"required>
        </div>
        </div>
    </div>
    </body>