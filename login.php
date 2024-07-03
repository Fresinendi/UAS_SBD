<?php
require 'function.php';



if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];


    $cekdatabase = mysqli_query($conn, "SELECT * FROM login where email='$email' and password='$password'");

    $hitung=mysqli_num_rows($cekdatabase);

    if ($hitung>0){
        $_SESSION['log'] = 'True';
        header('location:index.php');
    } else{
        header('location:login.php');
    };
};
?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - Piai Fitness</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            min-height:100vh;
            background: url("https://images.pexels.com/photos/3112004/pexels-photo-3112004.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1") no-repeat center center/cover;
            font-family: sans-serif;
            background-size: cover;
            background-position: center;
        }
        .form-container {
            width: 420px;
            background: transparent;
            border: 2px solid grey;
            backdrop-filter: blur(20px);
            color: black;
            border-radius: 10px;
            margin-top: 150px;
            padding: 30px 40px;
        }

        .btn-secondary {
            width: 100%;
            border: none;
            background: gray;
        }
        .form-control {
            color: rgba(0, 0, 0, .87);
            border-bottom-color: rgba(0, 0, 0, .42);
            box-shadow: none !important;
            border: none;
            border-bottom: 1px solid;
            border-radius: 4px 4px 0 0;
        }
        h3, h4, .form-label {
            font-family: sans-serif;
            font-weight: 800 !important;
        }
        h4 {
            font-size: 2rem !important;
            font-weight: 700;
        }
    </style>
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="card-body">
                    <form class="mx-auto form-container" method="post" action="">
                        <h4 class="text-center">Piai Fitness</h4>
                            <div class="mb-3 mt-5">
                                <label for="inputEmailAddress" class="form-label">Email</label>
                                <input class="form-control py-4" name="email" id="inputEmailAddress" type="email" placeholder="Enter email address" required />
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword" class="form-label">Password</label>
                                <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter password" required />
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button class="btn btn-secondary" name="login" type="submit">Login</button>
                                </div>
                            </form>
                        </div>  
                    </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>


